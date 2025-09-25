<?php
include "../conexao.php";
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar_senha = $_POST["confirmar_senha"];
if($senha == $confirmar_senha){
    $senha = password_hash($senha, PASSWORD_DEFAULT);
    $sql="INSERT INTO `administradores` (`id`, `email`, `senha`) VALUES (NULL, '$email', '$senha')";
    mysqli_query($conexao, $sql);
    echo('<div class="alert alert-success" role="alert">Novo administrador cadastrado com sucesso!</div>');
}else{
    echo("<div class='alert alert-danger' role='alert'>
  Senhas diferentes!
</div>
<a href='../forms/form_admin.php'>Tentar novamente</a>");
}
?>