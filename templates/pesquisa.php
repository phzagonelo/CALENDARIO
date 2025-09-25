<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="pesquisa.php" method = "POST">
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Pesquisar</label>
  <input type="text" class="form-control" id="formGroupExampleInput2" name="pesquisa" placeholder="Another input placeholder">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
    <?php
    include "conexao.php";
    $pesquisa = $_POST['pesquisa'];
    $sql = "SELECT nome, telefone FROM `professores` WHERE nome LIKE '%$pesquisa%'";
    $dados = mysqli_query($conexao, $sql);
    while ($linha = mysqli_fetch_assoc($dados)){
        $nome = $linha['nome'];
        echo($nome);
    }
    ?>
</body>
</html>