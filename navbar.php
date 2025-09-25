<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
      .navbar {
  height: 40px; /* ajusta o tamanho da barra */
  padding: 0 !important;
  margin: 0 !important;
}


        html, body{
          margin:0;
          height:100%;
        }
        body {
            background-image: url('../images/FotoSenai.png'); /* Caminho da imagem */
            background-size: cover; /* Faz com que a imagem cubra toda a área */
            background-position: center; /* Centraliza a imagem na página */
            background-repeat: no-repeat; /* Impede a repetição da imagem */
        }
    </style>
  </head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<?php
echo('
<nav class="navbar"> 
  <div style="background-color:rgba(42, 44, 83, 0.84)" class="container-fluid">
    <a style="color: white"class="navbar-brand" href="../templates/home.php">Home</a>
    <a style="color: white"class="navbar-brand" href="../forms/form_professor.php">Cadastrar Professor</a>
    <a style="color: white"class="navbar-brand" href="../forms/form_materia.php">Cadastrar Materia</a>
  </div>
</nav>
</div>');
?>
</body>
</html>