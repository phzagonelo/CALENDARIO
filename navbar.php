<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<?php
echo('
<input type="checkbox" id="menu-toggle">
<label for="menu-toggle" class="menu-btn">☰ Menu</label>

<div class="sidebar">
    <a href="../templates/home.php">Home</a>
    <a href="../forms/form_professor.php">Cadastrar Professor</a>
    <a href="../forms/form_materia.php">Cadastrar Materia</a>
    <a href="../forms/form_horarios.php">Cadastrar Horarios</a>
    <a href="../templates/visualizar_horarios.php">Visualizar Horarios</a>
</div>
');
?>
</body>
</html>