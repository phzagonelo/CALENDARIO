<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Professor</title>
    <style>
        .centralizada{
            width: 500px;
            background-color:rgba(42, 44, 83, 0.84);
            padding:20px;
            margin:60px auto;
            border-radius:10px;
        }
    </style>
</head>
<body>
    <?php
        include '../navbar.php';
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
        <label style="color:white" class="form-label">Horários</label>
        <input type="text" class="form-control" name="horarios">
    </div>
    <div class="mb-3">
    <label style="color:white" class="form-label">Matéria</label>
    <select class="form-select" name="materia">
        <option selected>Selecione a matéria</option>
        <option value="1">Desenvolvimento de Sistemas</option>
        <option value="2">Automação</option>
        <option value="3">Mecatrônica</option>
    </select>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
</body>
</html>