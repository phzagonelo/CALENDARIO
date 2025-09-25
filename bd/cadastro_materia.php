<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Matéria</title>
</head>
<body>
<?php
include "../navbar.php";
include "../conexao.php";
$materia = $_POST['materia'];
$carga_horaria = $_POST['carga_horaria'];
$turno = $_POST['turno'];

$sql = "INSERT INTO `materias` (`id`, `materia`, `carga_horaria`, `turno`) VALUES (NULL, '$materia', '$carga_horaria', '$turno')";

if (mysqli_query($conexao, $sql) == True){
    echo('<div class="alert alert-success" role="alert">
  Matéria cadastrada com sucesso!
</div>');
}
else{
    echo'deu errado'.mysqli_error($conexao);
};
?>
</body>
</html>