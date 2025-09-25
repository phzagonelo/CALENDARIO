<?php
include "conexao.php";

$sql = "
CREATE TABLE IF NOT EXISTS administradores (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(191) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS materias (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    materia VARCHAR(255) NOT NULL,
    carga_horaria VARCHAR(255) NOT NULL,
    turno VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS professores (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(191) NOT NULL UNIQUE,
    telefone VARCHAR(255) NOT NULL,
    horarios VARCHAR(255) NOT NULL,
    materia_id INT(11) NOT NULL,
    FOREIGN KEY (materia_id) REFERENCES materias(id)
);
";

if (mysqli_multi_query($conexao, $sql)) {
    echo "Tabelas criadas com sucesso!";
} else {
    echo "Erro ao criar tabelas: " . mysqli_error($conexao);
}
?>