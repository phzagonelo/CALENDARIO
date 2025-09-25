<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro Administrador</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: rgba(16, 19, 69, 0.84) ;
            background-image: url("../images/FundoAzul.jpg");
            
        }
        div{
            background-color: rgba(16, 19, 69, 0.84);
            position: absolute;
            top: 50%;
            left:50%;
            transform: translate(-50%,-50%);
            padding: 50px;
            border: 15px;
            border-radius: 15px ;
            color: white;
            box-shadow: 0px 4px 15px rgba(245, 241, 241, 0.72);

        }
        input{
            padding: 15px;
            border: none;
            border-radius: 15px;
            outline: none;
            font-size: 15px;

        }
        button{
            background-color: rgba(19, 85, 124, 0.84);
            padding: 15px;
            border: 15px;
            border-radius: 15px;
            width: 100%;
            color: white;

        }
        button:hover{
            background-color: deepskyblue;
            cursor: pointer;
            color: orange;
        }
        
        .login-box img {
    width: 120px;   /* controla o tamanho da logo */
    margin-bottom: 15px; /* espaço abaixo da logo */
 } 
    </style>
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