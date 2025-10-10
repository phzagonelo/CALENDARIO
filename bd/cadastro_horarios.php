<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Horário</title>
    <link rel="stylesheet" href="../css/cadastro_horarios.css">
</head>
<body>
<?php
include "../navbar.php";
include "../conexao.php";

$professor_id = $_POST['professor_id'];
$materia_id = $_POST['materia_id'];
$dia_semana = $_POST['dia_semana'];
$turma = $_POST['turma'];
$turno = $_POST['turno'];

$sql = "INSERT INTO `horarios` (`id`, `professor_id`, `materia_id`, `dia_semana`, `turno`, `turma`) VALUES (NULL, '$professor_id', '$materia_id', '$dia_semana', '$turno', '$turma')";

if (mysqli_query($conexao, $sql) == True){
    echo('<div class="alert alert-success" role="alert">
  Horário cadastrado com sucesso!
</div>
<br>
<a href="../forms/form_horarios.php" class="btn-custom btn-cadastrar">Cadastrar outro horário</a>
<a href="../templates/home.php" class="btn-custom btn-voltar">Home</a>');
}
else{
    echo'<div class="alert alert-danger" role="alert">Erro ao cadastrar horário: '.mysqli_error($conexao).'</div>';
};
?>
</body>
</html>