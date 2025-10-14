<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Horários</title>
    <link rel="stylesheet" href="../css/forms_geral.css">
</head>
<body>
    <?php 
        include "../navbar.php";
        include "../conexao.php";
        
        // Buscar matérias cadastradas
        $sql_materias = "SELECT id, materia FROM materias ORDER BY materia";
        $resultado_materias = mysqli_query($conexao, $sql_materias);

        $materia_id = $_POST['materia_id'] ?? '';
        $professores_qualificados = [];

        if($materia_id){
            $sql = "SELECT p.id, p.nome FROM professores p 
                    INNER JOIN materias_professor mp ON p.id = mp.professor_id
                    WHERE mp.materia_id = $materia_id";
            $professores_qualificados = mysqli_query($conexao, $sql);
            
            $sql_turno = "SELECT turno FROM materias WHERE materias.id = $materia_id";
            $resultado_turno = mysqli_query($conexao, $sql_turno);
            $materia_turno_row = mysqli_fetch_assoc($resultado_turno);
            $materia_turno = $materia_turno_row['turno'];
        };
    ?>
    
    <!-- Hero igual às outras páginas -->
    <section class="hero-section">
        <h1>Cadastro de Horários</h1>
        <p>Adicione horários vinculando matéria, professor, dia e turma</p>
    </section>

    <!-- Container do formulário usando a mesma classe do CSS -->
    <div class="form-container">
        <?php if(!$materia_id): ?>
            <form action="./form_horarios.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Matéria</label>
                    <select class="form-select" name="materia_id" onchange="this.form.submit()" required>
                        <option value="">Selecione a matéria</option>
                        <?php
                            while($materia = mysqli_fetch_assoc($resultado_materias)){
                                echo "<option value='".$materia['id']."'>".$materia['materia']."</option>";
                            }
                        ?>
                    </select>
                </div>
            </form>
        <?php else: ?>
            <form action="../bd/cadastro_horarios.php" method="POST">
                <input type="hidden" name="materia_id" value="<?= htmlspecialchars($materia_id) ?>">
                <input type="hidden" name="turno" value="<?= htmlspecialchars($materia_turno ?? '') ?>">

                <div class="mb-3">
                    <label class="form-label">Professor</label>
                    <select class="form-select" name="professor_id" required>
                        <option value="">Selecione o professor</option>
                        <?php
                            while($professor = mysqli_fetch_assoc($professores_qualificados)){
                                echo ("<option value='".$professor['id']."'>".$professor['nome']."</option>");
                            }    
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Dia da Semana</label>
                    <select class="form-select" name="dia_semana" required>
                        <option value="">Selecione o dia</option>
                        <option value="Segunda-feira">Segunda-feira</option>
                        <option value="Terça-feira">Terça-feira</option>
                        <option value="Quarta-feira">Quarta-feira</option>
                        <option value="Quinta-feira">Quinta-feira</option>
                        <option value="Sexta-feira">Sexta-feira</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Turma</label>
                    <input type="text" class="form-control" name="turma" placeholder="Ex: 3º ANO DS" required>
                </div>

                <button type="submit" class="button">Cadastrar</button>
            </form>
        <?php endif; ?>
    </div>

</body>
</html>