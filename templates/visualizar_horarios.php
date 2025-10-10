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
        
        // Buscar todos os horários
        $sql = "SELECT h.*, p.nome as nome_professor, m.materia as nome_materia 
                FROM horarios h 
                INNER JOIN professores p ON h.professor_id = p.id 
                INNER JOIN materias m ON h.materia_id = m.id ";
        
        $resultado = mysqli_query($conexao, $sql);
        
        // Organizar horários por dia da semana
        $dias_semana = ['Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira'];
        $horarios_por_dia = array();
        
        foreach($dias_semana as $dia){
            $horarios_por_dia[$dia] = array();
        }
        
        while($horario = mysqli_fetch_assoc($resultado)){
            $horarios_por_dia[$horario['dia_semana']][] = $horario;
        }
        
        $total_horarios = mysqli_num_rows($resultado);
    ?>
<div class="centralizada">
    <h1 style="color:white">VISUALIZAR HORÁRIOS</h1>
  <?php if($total_horarios == 0): ?>
        <div class="sem-dados">
            Nenhum horário cadastrado ainda.
            <br><br>
            <a href="../forms/form_horarios.php" class="btn btn-primary">Cadastrar Horário</a>
        </div>
    <?php else: ?>
        <div class="calendario-container">
            <?php foreach($dias_semana as $dia): ?>
                <div class="dia-coluna">
                    <div class="dia-header"><?php echo $dia; ?></div>
                    <?php if(count($horarios_por_dia[$dia]) > 0): ?>
                        <?php foreach($horarios_por_dia[$dia] as $horario): ?>
                            <div class="horario-item">
                                <div class="horario-turno">
                                    <?php echo($horario['turno']); ?> - 
                                </div>
                                <div class="horario-professor">
                                    👨‍🏫 <?php echo $horario['nome_professor']; ?>
                                </div>
                                <div class="horario-materia">
                                    📚 <?php echo $horario['nome_materia']; ?>
                                </div>
                                <div class="horario-turma">
                                    🎓 <?php echo $horario['turma']; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="dia-vazio">Sem aulas</div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <br><br>
        <a href="../templates/home.php" class="btn btn-secondary">Voltar para Home</a>
    <?php endif; ?>
</div>
</body>
</html>