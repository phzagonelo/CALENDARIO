<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/navbar.css">
<style>
    html, body{
          margin:0;
          height:100%;
    background-color: #f5f3f0 !important;
    background-image: none !important;
    background-repeat: no-repeat;
    background-size: cover;
}

        /* Checkbox escondido para controlar o menu */
        #menu-toggle {
            display: none;
        }
        /* Botão do menu */
        .menu-btn {
    position: fixed;      /* Fica fixo na tela mesmo se rolar a página */
    top: 15px;           /* 15px do topo */
    left: 15px;          /* 15px da esquerda */
    z-index: 1001;       /* Fica na frente de tudo (número alto) */
    background-color: rgba(42, 44, 83, 0.84);  /* Azul escuro semi-transparente */
    color: white;
    padding: 10px 15px;  /* Espaçamento interno */
    cursor: pointer;     /* Mostra mãozinha quando passa o mouse */
    border-radius: 5px;  /* Cantos arredondados */
}
        /* Menu vertical */
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background-color: rgba(42, 44, 83, 0.95);
            transition: left 0.3s ease;
            z-index: 1000;
            padding-top: 60px;
        }
        /* Quando checkbox marcado, mostra menu */
        #menu-toggle:checked ~ .sidebar {
            left: 0;
        }
        
        .sidebar a {
            display: block;
            color: white;
            padding: 15px 20px;
            text-decoration: none;
            transition: background 0.3s;

        }
    </style>
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
    <a href="../templates/visualizar_horarios.php">Visualizar Horarios</a>
</div>
');
?>
</body>
</html>