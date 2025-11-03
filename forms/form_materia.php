<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Matéria</title>
    <link rel="stylesheet" href="../css/forms_geral.css">
</head>
<body>
    <?php 
        include "../navbar.php";
        include "../conexao.php";
        $sql = "SELECT id, materia, carga_horaria, turno FROM materias ORDER BY materia";
        $materias_cadastradas = mysqli_query($conexao, $sql);
    ?>
    <section class="hero-section">
        <h1>Cadastro de Matéria</h1>
        <p>Adicione novas matérias ao sistema</p>
    </section>

    <?php
    // Verifica se houve sucesso ou erro no cadastro
    if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1) {
        echo '<div class="alert alert-success">Matéria cadastrada com sucesso!</div>';
    }
    if (isset($_GET['erro']) && $_GET['erro'] == 1) {
        echo '<div class="alert alert-danger">Erro ao cadastrar matéria!</div>';
    }
    ?>

    <div class="form-container">
        <form action="../bd/cadastro_materia.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome da matéria</label>
                <input type="text" class="form-control" name="materia">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Carga horária total</label>
                <input type="text" class="form-control"  name="carga_horaria">
            </div>
            <div class="mb-3">
                <label class="form-label">Turno</label>
                <select class="form-select" name="turno">
                    <option selected>Selecione o turno</option>
                    <option value="manha">Manhã</option>
                    <option value="tarde">Tarde</option>
                    <option value="noite">Noite</option>
                </select>
            </div>
            <button type="submit" class="button">Cadastrar</button>
        </form>
        <br><br>

        <!-- lista das materias ja adicionadas -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Carga Horária</th>
                    <th scope="col">Turno</th>
                </tr>
            </thead>
            <tbody>
                <?php while($materia = mysqli_fetch_assoc($materias_cadastradas)):?>
                    <tr>
                        <th scope="row"><?= $materia['id']?></th>
                        <td><?= $materia['materia']?></td>
                        <td><?= $materia['carga_horaria']?></td>
                        <td><?= $materia['turno']?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>