<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    </style>
  </head>
<body>
<?php 

    include "../navbar.php";
    include "../conexao.php";

    $nome_prof = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $horarios = $_POST['horarios'];
    $materia = $_POST['materia'];
    
    $sql = "INSERT INTO `professores` (`id`, `nome`, `email`, `telefone`, `horarios`, `materia_id`) VALUES (NULL, '$nome_prof', '$email', '$telefone', '$horarios', '$materia')";

    if (mysqli_query($conexao, $sql)){
      echo('<div class="alert alert-success" role="alert">Professor cadastrado com sucesso!</div>');
    }else{
      echo '<div class="alert alert-danger" role="alert">Erro ao cadastrar professor!</div>'.mysqli_error($conexao);
    };
?>
    
</body>
</html>