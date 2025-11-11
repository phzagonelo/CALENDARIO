<?php
include "../conexao.php";

// Definir mês e ano para alocar
$mes_inicial = isset($_POST['mes']) ? $_POST['mes'] : date('m');
$ano_inicial = isset($_POST['ano']) ? $_POST['ano'] : date('Y');

// DATA MÍNIMA: hoje (não aloca no passado)
$data_minima = date('Y-m-d');

// Limpar alocações futuras (a partir de hoje)
$sql_limpar = "DELETE FROM aulas_mes WHERE data >= '$data_minima'";
mysqli_query($conexao, $sql_limpar);

// Buscar todas as matérias
$sql = "SELECT m.* FROM materias m ORDER BY m.carga_horaria DESC";
$materias = mysqli_query($conexao, $sql);

// Para cada matéria
while($materia = mysqli_fetch_assoc($materias)){
    
    $materia_id = $materia['id'];
    $carga_horaria_total = $materia['carga_horaria'];
    $aulas_necessarias = ceil($carga_horaria_total / 4);
    $turno_materia = $materia['turno'];
    
    // Buscar professores dessa matéria
    $sql_profs = "SELECT p.id, p.nome 
                  FROM professores p
                  JOIN materias_professor mp ON p.id = mp.professor_id
                  WHERE mp.materia_id = $materia_id";
    $profs_result = mysqli_query($conexao, $sql_profs);
    
    $professores = [];
    while($prof = mysqli_fetch_assoc($profs_result)){
        $professores[] = $prof;
    }
    
    if(empty($professores)){
        continue;
    }
    
    // Dividir aulas entre professores
    $total_profs = count($professores);
    $aulas_por_prof = floor($aulas_necessarias / $total_profs);
    $resto = $aulas_necessarias % $total_profs;
    
    $max_meses = 6;
    
    // MUDANÇA: Gerar TODAS as datas disponíveis de TODOS os professores de uma vez
    // Isso permite intercalar e concentrar ao máximo
    $todas_datas_disponiveis = [];
    
    foreach($professores as $index => $professor){
        $professor_id = $professor['id'];
        
        // Calcular quantas aulas esse professor vai dar
        $aulas_deste_prof = $aulas_por_prof;
        if($index < $resto){
            $aulas_deste_prof++;
        }
        
        // Buscar disponibilidade do professor no turno da matéria
        $sql_disp = "SELECT dia_semana FROM disponibilidade_professores 
                     WHERE professor_id = $professor_id AND turno = '$turno_materia'";
        $disp_result = mysqli_query($conexao, $sql_disp);
        
        $dias_disponiveis = [];
        while($d = mysqli_fetch_assoc($disp_result)){
            $dias_disponiveis[] = $d['dia_semana'];
        }
        
        if(empty($dias_disponiveis)){
            continue;
        }
        
        // Gerar datas para este professor (por 6 meses)
        $mes_atual = $mes_inicial;
        $ano_atual = $ano_inicial;
        
        for($m = 0; $m < $max_meses; $m++){
            $datas_mes = gerarDatasDoMes($mes_atual, $ano_atual, $dias_disponiveis, $data_minima);
            
            foreach($datas_mes as $data){
                $todas_datas_disponiveis[] = [
                    'data' => $data,
                    'professor_id' => $professor_id,
                    'aulas_restantes' => &$aulas_deste_prof // Referência para decrementar
                ];
            }
            
            // Próximo mês
            $mes_atual++;
            if($mes_atual > 12){
                $mes_atual = 1;
                $ano_atual++;
            }
        }
    }
    
    // Ordenar por data (cronológica) - CONCENTRAÇÃO MÁXIMA
    usort($todas_datas_disponiveis, function($a, $b){
        return strcmp($a['data'], $b['data']);
    });
    
    // Agora alocar na ordem, intercalando professores automaticamente
    $aulas_alocadas = 0;
    
    foreach($todas_datas_disponiveis as $slot){
        if($aulas_alocadas >= $aulas_necessarias){
            break; // Matéria completa
        }
        
        $data = $slot['data'];
        $professor_id = $slot['professor_id'];
        
        // Verificar se esse professor ainda tem aulas para dar
        $sql_count = "SELECT COUNT(*) as total FROM aulas_mes 
                      WHERE materia_id = $materia_id AND professor_id = $professor_id";
        $count_result = mysqli_query($conexao, $sql_count);
        $count = mysqli_fetch_assoc($count_result);
        
        // Buscar quantas aulas esse professor deveria dar
        $sql_prof_aulas = "SELECT COUNT(*) as esperado 
                           FROM (
                               SELECT professor_id FROM professores p
                               JOIN materias_professor mp ON p.id = mp.professor_id
                               WHERE mp.materia_id = $materia_id
                           ) as profs";
        // Simplificando: calcular no momento
        $index_prof = array_search($professor_id, array_column($professores, 'id'));
        $aulas_esperadas = $aulas_por_prof + ($index_prof < $resto ? 1 : 0);
        
        if($count['total'] >= $aulas_esperadas){
            continue; // Esse professor já deu todas as aulas dele
        }
        
// Verificar se o professor está livre neste dia/turno
$sql_check = "SELECT COUNT(*) as total FROM aulas_mes 
WHERE professor_id = $professor_id 
AND data = '$data' 
AND turno = '$turno_materia'";
$check_result = mysqli_query($conexao, $sql_check);
$check = mysqli_fetch_assoc($check_result);

if($check['total'] > 0){
continue; // Professor já tem aula neste dia/turno
}

// NOVA VERIFICAÇÃO: Matéria não pode repetir no mesmo dia
$sql_check_materia = "SELECT COUNT(*) as total FROM aulas_mes 
        WHERE materia_id = $materia_id 
        AND data = '$data'";
$check_materia_result = mysqli_query($conexao, $sql_check_materia);
$check_materia = mysqli_fetch_assoc($check_materia_result);

if($check_materia['total'] > 0){
continue; // Matéria já tem aula neste dia (qualquer turno)
}
        
        // Inserir aula
        $sql_insert = "INSERT INTO aulas_mes (materia_id, professor_id, data, turno) 
                       VALUES ($materia_id, $professor_id, '$data', '$turno_materia')";
        
        if(mysqli_query($conexao, $sql_insert)){
            $aulas_alocadas++;
        }
    }
}

// Função auxiliar - MODIFICADA para aceitar data mínima
function gerarDatasDoMes($mes, $ano, $dias_semana, $data_minima){
    $datas = [];
    
    $mapa_dias = [
        'segunda' => 1,
        'terca' => 2,
        'quarta' => 3,
        'quinta' => 4,
        'sexta' => 5,
        'sabado' => 6
    ];
    
    $dias_numeros = [];
    foreach($dias_semana as $dia){
        if(isset($mapa_dias[$dia])){
            $dias_numeros[] = $mapa_dias[$dia];
        }
    }
    
    $ultimo_dia = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
    
    for($dia = 1; $dia <= $ultimo_dia; $dia++){
        $data = sprintf('%04d-%02d-%02d', $ano, $mes, $dia);
        
        // NÃO adicionar datas no passado
        if($data < $data_minima){
            continue;
        }
        
        $dia_semana_numero = date('N', strtotime($data));
        
        if(in_array($dia_semana_numero, $dias_numeros)){
            $datas[] = $data;
        }
    }
    
    return $datas;
}

// Redirecionar de volta
header("Location: ../templates/visualizar_horarios.php?msg=alocacao_concluida");
exit;
?>