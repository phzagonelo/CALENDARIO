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
    carga_horaria INT(11) NOT NULL,
    turno ENUM ('manha', 'tarde', 'noite') NOT NULL
);

CREATE TABLE IF NOT EXISTS professores (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(191) NOT NULL UNIQUE,
    telefone VARCHAR(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS horarios (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    professor_id INT NOT NULL,
    materia_id INT NOT NULL,
    dia_semana VARCHAR(50) NOT NULL,
    turno VARCHAR(10) NOT NULL,
    turma VARCHAR(100) NOT NULL
);
CREATE TABLE IF NOT EXISTS materias_professor (
    professor_id INT NOT NULL,
    materia_id INT NOT NULL,
    PRIMARY KEY (professor_id, materia_id),
    FOREIGN KEY (professor_id) REFERENCES professores(id) ON DELETE CASCADE,
    FOREIGN KEY (materia_id) REFERENCES materias(id) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS disponibilidade_professores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    professor_id INT NOT NULL,
    dia_semana ENUM('segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado') NOT NULL,
    turno ENUM('manha', 'tarde', 'noite') NOT NULL,
    FOREIGN KEY (professor_id) REFERENCES professores(id) ON DELETE CASCADE,
    UNIQUE KEY (professor_id, dia_semana, turno)
);
CREATE TABLE IF NOT EXISTS aulas_mes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    professor_id INT NOT NULL,
    materia_id INT NOT NULL,
    data DATE NOT NULL,
    turno ENUM('manha', 'tarde', 'noite') NOT NULL,
    FOREIGN KEY (professor_id) REFERENCES professores(id) ON DELETE CASCADE,
    FOREIGN KEY (materia_id) REFERENCES materias(id) ON DELETE CASCADE,
    INDEX idx_data_turno (data, turno)
);
";

if (mysqli_multi_query($conexao, $sql)) {
    echo "Tabelas criadas com sucesso!";
} else {
    echo "Erro ao criar tabelas: " . mysqli_error($conexao);
}
?>