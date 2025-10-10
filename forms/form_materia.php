<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Materia</title>
     <link rel="stylesheet" href="../css/form_materia.css">
</head>
<body>
    <?php 
        include "../navbar.php";
    ?>
<div class="centralizada">
    <h1 style="color:white">CADASTRO MATÉRIA</h1>
    <form action="../bd/cadastro_materia.php" method="POST">
    <div class="mb-3">
        <label style="color:white" for="exampleInputEmail1" class="form-label">Nome da matéria</label>
        <input type="text" class="form-control" name="materia">
    </div>
    <div class="mb-3">
        <label style="color:white" for="exampleInputPassword1" class="form-label">Carga horária total</label>
        <input type="text" class="form-control"  name="carga_horaria">
    </div>
    <div class="mb-3">
    <label style="color:white" class="form-label">Turno</label>
    <select class="form-select" name="turno">
        <option selected>Selecione o turno</option>
        <option value="manha">Manhã</option>
        <option value="tarde">Tarde</option>
        <option value="noite">Noite</option>
    </select>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
</body>
</html>