<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Horários</title>
    <link rel="stylesheet" href="../css/visualizar_horarios.css">
</head>
<body>
    <?php 
        include "../navbar.php";
        include "../conexao.php";
        
        // Pegar mês e ano (da URL ou atual)
        $mes = isset($_GET['mes']) ? intval($_GET['mes']) : date('n');
        $ano = isset($_GET['ano']) ? intval($_GET['ano']) : date('Y');
        
        // Validar mês
        if ($mes < 1) { $mes = 12; $ano--; }
        if ($mes > 12) { $mes = 1; $ano++; }
        
        // Buscar todas as aulas do mês
        $primeiro_dia = "$ano-$mes-01";
        $ultimo_dia = date("Y-m-t", strtotime($primeiro_dia));
        
        $sql = "SELECT a.*, p.nome as nome_professor, m.materia as nome_materia 
                FROM aulas_mes a 
                INNER JOIN professores p ON a.professor_id = p.id 
                INNER JOIN materias m ON a.materia_id = m.id 
                WHERE a.data BETWEEN '$primeiro_dia' AND '$ultimo_dia'
                ORDER BY a.data, a.turno";
        
        $resultado = mysqli_query($conexao, $sql);
        
        // Organizar aulas por data
        $aulas_por_dia = array();
        while($aula = mysqli_fetch_assoc($resultado)){
            $dia = date('j', strtotime($aula['data']));
            if(!isset($aulas_por_dia[$dia])){
                $aulas_por_dia[$dia] = array();
            }
            $aulas_por_dia[$dia][] = $aula;
        }
        
        // Informações do calendário
        $dias_no_mes = date('t', strtotime($primeiro_dia));
        $primeiro_dia_semana = date('N', strtotime($primeiro_dia)); // 1=segunda, 7=domingo
        
        // Nomes dos dias da semana
        $dias_semana = ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'];
        
        // Nomes dos meses
        $meses = ['', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 
                  'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        
        $total_aulas = mysqli_num_rows($resultado);
        
        // Calcular mês anterior e próximo
        $mes_anterior = $mes - 1;
        $ano_anterior = $ano;
        if($mes_anterior < 1) { $mes_anterior = 12; $ano_anterior--; }
        
        $mes_proximo = $mes + 1;
        $ano_proximo = $ano;
        if($mes_proximo > 12) { $mes_proximo = 1; $ano_proximo++; }
    ?>
<div class="centralizada">
    <h1 style="color:rgba(42, 44, 83, 0.95);;">VISUALIZAR HORÁRIOS</h1>
    
<!-- Adicione isso no topo da página, antes do calendário -->
<div style="text-align:center; margin:20px;">
    <form action="../alocacao/alocar_aulas.php" method="POST" style="display:inline;">
        <input type="hidden" name="mes" value="<?= date('m') ?>">
        <input type="hidden" name="ano" value="<?= date('Y') ?>">
        <button type="submit" style="padding:15px 30px; background:#28a745; color:white; border:none; border-radius:8px; font-size:16px; cursor:pointer;">
            🔄 Realocar Aulas do Mês Atual
        </button>
    </form>
</div>

<?php
// Mostrar mensagem de sucesso se vier do alocar_aulas.php
if(isset($_GET['msg']) && $_GET['msg'] == 'alocacao_concluida'){
    echo '<div style="background:#d4edda; color:#155724; padding:15px; margin:20px auto; max-width:600px; border-radius:8px; text-align:center;">
        ✅ Alocação de aulas concluída com sucesso!
    </div>';
}
?>
    <div class="mes-navegacao">
        <a href="?mes=<?php echo $mes_anterior; ?>&ano=<?php echo $ano_anterior; ?>">
            <button>← Mês Anterior</button>
        </a>
        <h2><?php echo $meses[$mes] . ' ' . $ano; ?></h2>
        <a href="?mes=<?php echo $mes_proximo; ?>&ano=<?php echo $ano_proximo; ?>">
            <button>Próximo Mês →</button>
        </a>
    </div>
    
    <div class="calendario-grid">
        <!-- Cabeçalho dos dias da semana -->
        <?php foreach($dias_semana as $dia): ?>
            <div class="dia-semana-header"><?php echo $dia; ?></div>
        <?php endforeach; ?>
        
        <!-- Dias vazios antes do primeiro dia -->
        <?php for($i = 1; $i < $primeiro_dia_semana; $i++): ?>
            <div class="dia-vazio-calendario"></div>
        <?php endfor; ?>
        
        <!-- Dias do mês -->
        <?php for($dia = 1; $dia <= $dias_no_mes; $dia++): ?>
            <div class="dia-calendario">
                <div class="dia-numero"><?php echo $dia; ?></div>
                
                <?php if(isset($aulas_por_dia[$dia]) && count($aulas_por_dia[$dia]) > 0): ?>
                    <?php foreach($aulas_por_dia[$dia] as $aula): ?>
                        <div class="aula-item" onclick="this.classList.toggle('expandido')">
                            <div class="aula-resumo">
                                👨‍🏫 <?php echo $aula['nome_professor']; ?>
                            </div>
                            <div class="aula-completa">
                                <div class="horario-turno">
                                    🕐 <?php echo ucfirst($aula['turno']); ?>
                                </div>
                                <div class="horario-materia">
                                    📚 <?php echo $aula['nome_materia']; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="sem-aulas">Sem aulas</div>
                <?php endif; ?>
            </div>
        <?php endfor; ?>
    </div>
    
    <br><br>
    <a href="../forms/form_horarios.php" class="btn btn-primary">Cadastrar Horário</a>
    <a href="../templates/home.php" class="btn btn-secondary">Voltar para Home</a>
</div>

<script>
// Prevenir que o clique se propague para elementos pais
document.querySelectorAll('.aula-item').forEach(item => {
    item.addEventListener('click', function(e) {
        e.stopPropagation();
    });
});
</script>
</body>
</html>