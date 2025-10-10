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
    $materias_selecionadas = $_POST['materias'];
    
    
    $sql = "INSERT INTO `professores` (`id`, `nome`, `email`, `telefone`) VALUES (NULL, '$nome_prof', '$email', '$telefone')";

    if (mysqli_query($conexao, $sql)){
      echo('<div class="alert alert-success" role="alert">Professor cadastrado com sucesso!</div>');
    }else{
      echo '<div class="alert alert-danger" role="alert">Erro ao cadastrar professor!</div>'.mysqli_error($conexao);
    };

    $professor_id = mysqli_insert_id($conexao);
    foreach ($materias_selecionadas as $materia_id){
      $sql_materias_professores = "INSERT INTO materias_professor (materia_id, professor_id) VALUES ($materia_id, $professor_id)";
      mysqli_query($conexao, $sql_materias_professores);
    }
?>
    
</body>
</html>