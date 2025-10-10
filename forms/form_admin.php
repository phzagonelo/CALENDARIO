<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro Administrador</title>
     <link rel="stylesheet" href="../css/form_admin.css">
</head>
<body>
<div>
    <div class="login-box">
    <img src="../images/LogoSenai.png" alt="Logo">
    <h1>Cadastro</h1>  
    <form action="../bd/cadastro_admin.php" method="POST">
    <input type="text" placeholder="Nome" name="nome" required>
    <br></br>
    <input type="email" placeholder="Email" name="email" required>
    <br></br>
    <input type="password" placeholder="Senha" name="senha" required>
    <br></br>
    <input type="password" placeholder="Confirmar Senha" name="confirmar_senha" required>
    <br></br>
    <button>Cadastrar</button>
    </form>
</div>
</body>
</html>