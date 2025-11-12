<?php
// Inicia a sessão para manter o login ativo
session_start();

// Conexão com o banco de dados
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "projetosenai"; // coloque o nome correto do seu banco

$conn = new mysqli($host, $user, $pass, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Recebe os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Consulta no banco (ajuste o nome da tabela e colunas conforme seu banco)
$sql = "SELECT * FROM administradores WHERE email = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se o usuário existe
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verifica a senha — se estiver criptografada use password_verify()
    if (password_verify($senha, $user['senha'])) {
        // Cria sessão e redireciona
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['usuario_nome'] = $user['nome'];
        header("Location: home.php");
        exit;
    } else {
        echo "<script>alert('Senha incorreta!'); window.location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('Usuário não encontrado!'); window.location.href='index.php';</script>";
}

$conn->close();
?>