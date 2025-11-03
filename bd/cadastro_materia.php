<?php
include "../conexao.php";
include "../navbar.php";

$materia = $_POST['materia'];
$carga_horaria = $_POST['carga_horaria'];
$turno = $_POST['turno'];

$sql = "INSERT INTO `materias` (`id`, `materia`, `carga_horaria`, `turno`) VALUES (NULL, '$materia', '$carga_horaria', '$turno')";

if (mysqli_query($conexao, $sql) == True){
    // Redireciona de volta para o formulário com mensagem de sucesso
    header("Location: ../forms/form_materia.php?sucesso=1");
    exit();
}
else{
    // Redireciona com mensagem de erro
    header("Location: ../forms/form_materia.php?erro=1");
    exit();
}
?>

