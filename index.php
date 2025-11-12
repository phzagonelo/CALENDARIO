<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f5f3f0; /* Fundo bege claro */
            margin: 0;
            height: 100vh;
        }

        div {
            background-color: #ffffff; /* Caixa branca */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 50px;
            border-radius: 15px;
            color: #000; /* texto padrão preto */
            box-shadow: 0px 0px 25px rgba(42, 44, 83, 0.95); /* Brilho azul ao redor */
        }

        .login-box img {
            width: 120px; /* Tamanho da logo */
            display: block;
            margin-bottom: 25px; /* espaço maior entre logo e título */
            margin-left: 0; /* alinha à esquerda */
        }

        h1 {
            color: rgba(42, 44, 83, 0.95); /* Título "Login" com o mesmo azul */
            text-align: left; /* Alinhado à esquerda */
            margin-bottom: 25px;
            font-size: 28px;
        }

        input {
            padding: 15px;
            border: none;
            border-radius: 15px;
            outline: none;
            font-size: 15px;
            width: 100%;
            margin-bottom: 10px;
            background-color: #f7f7f7;
        }

        button {
            background-color: rgba(19, 85, 124, 0.84);
            padding: 15px;
            border: none;
            border-radius: 15px;
            width: 100%;
            color: white;
            font-size: 16px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        button:hover {
            background-color: rgba(9, 104, 159, 0.84);
            cursor: pointer;
            color: rgba(168, 204, 225, 0.84);
        }

        .admin-link {
            color: rgba(75, 174, 232, 0.84);
            text-decoration: none;
            display: block;
            margin-top: 10px;
            text-align: center;
            font-size: 14px;
        }

        .admin-link:hover {
            color: rgba(162, 238, 238, 0.84);
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <img src="./images/LogoSenai.png" alt="Logo">
        <h1>Login</h1>  
        <form action="./templates/autenticar.php" method="POST"> 
            <input type="text" name="email" placeholder="Email" required>
            <br> 
            <input type="password" name="senha" placeholder="Senha" required>
            <br> 
            <button type="submit">ENTRAR</button> 
            <br>
            <a href="./forms/form_admin" class="admin-link">Cadastrar novo administrador</a>
        </form>
    </div>
</body>
</html>