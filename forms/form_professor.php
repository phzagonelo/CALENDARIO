<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Professor</title>
     <link rel="stylesheet" href="../css/form_professor.css">
</head>
<body>
    <?php
        include '../navbar.php';
        include '../conexao.php';
        $sql_materias = "SELECT id, materia FROM materias ORDER BY materia";
        $resultado = mysqli_query($conexao, $sql_materias);
    ?>
<div class="centralizada">
    <h1 style="color:white">CADASTRO PROFESSOR</h1>
    <form action="../bd/cadastro_professor.php" method="POST">
    <div class="mb-3">
        <label style="color:white" class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome">
    </div>
    <div class="mb-3">
        <label style="color:white" for="exampleInputPassword1" class="form-label">Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="mb-3">
        <label style="color:white" class="form-label">Telefone</label>
        <input type="text" class="form-control" name="telefone">
    </div>
    <div class="mb-3">
    <label style="color:white" class="form-label">Matéria</label>
<ul class="list-group">
    <?php
    if (mysqli_num_rows($resultado) == 0){
            echo ('<li class="list-group-item">
    <label class="form-check-label" for="firstCheckbox">Nenhuma matéria cadastrada</label>
    </li>');
    }else{
        while($materia = mysqli_fetch_assoc($resultado)){
            echo ('<li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="'.$materia["id"].'" name="materias[]">
            <label class="form-check-label" for="firstCheckbox">'.$materia["materia"].'</label>
            </li>');
        }
    }
    ?>
</ul>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
</body>
</html>