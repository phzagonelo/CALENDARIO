<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Professores</title>
    <link rel="stylesheet" href="../css/forms_geral.css">

<body>
     <?php 
        include "../navbar.php";
        include "../conexao.php";
        $sql_materias = "SELECT id, materia FROM materias ORDER BY materia";
        $resultado = mysqli_query($conexao, $sql_materias);

        $dias = [
            'segunda' => 'Segunda',
            'terca' => 'Terça',
            'quarta' => 'Quarta',
            'quinta' => 'Quinta',
            'sexta' => 'Sexta',
            'sabado' => 'Sábado'
        ];
        $turnos = [
            'manha' => 'Manhã',
            'tarde' => 'Tarde',
            'noite' => 'Noite'
        ];
    ?>
</head>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1>Cadastro de Professores</h1>
        <p>Preencha as informações abaixo para cadastrar um novo professor</p>
    </section>

    <?php
    // Verifica se houve sucesso ou erro no cadastro
    if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1) {
        echo '<div class="alert alert-success">Professor cadastrado com sucesso!</div>';
    }
    if (isset($_GET['erro']) && $_GET['erro'] == 1) {
        echo '<div class="alert alert-danger">Erro ao cadastrar professor!</div>';
    }
    ?>

    <!-- Formulário -->
    <div class="form-container">
        <form action="../bd/cadastro_professor.php" method="POST">

            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="telefone">Telefone</label>
            <input type="tel" id="telefone" name="telefone" required>

            <label>Matéria</label>
            <div class="materias-list">
                <?php
                if (mysqli_num_rows($resultado) == 0){
                    echo ('<label>Nenhuma matéria cadastrada</label>');
                } else {
                    while($materia = mysqli_fetch_assoc($resultado)){
                        echo ('<label><input type="checkbox" name="materias[]" value="'.$materia["id"].'"> '.$materia["materia"].'</label>');
                    }
                }
                ?>
            </div>
            <label>Disponibilidade</label>
            <div class="disponibilidade-grid">
                <?php
                    foreach($dias as $dia_valor => $dia_nome):
                    foreach($turnos as $turno_valor => $turno_nome):
                ?>
                    <div class="disponibilidade-item">
                        <label>
                            <input type="checkbox" 
                                   name="disponibilidade[]" 
                                   value="<?= $dia_valor ?>-<?= $turno_valor ?>">
                            <?= $dia_nome ?> - <?= $turno_nome ?>
                        </label>
                    </div>
                <?php 
                    endforeach;
                endforeach; 
                ?>
            </div>

            <button type="submit">Cadastrar</button>
        </form>
    </div>

</body>
</html>