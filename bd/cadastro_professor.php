<?php 
include "../conexao.php";
include "../navbar.php";

$nome_prof = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$materias_selecionadas = $_POST['materias'];

$sql = "INSERT INTO `professores` (`id`, `nome`, `email`, `telefone`) VALUES (NULL, '$nome_prof', '$email', '$telefone')";

if (mysqli_query($conexao, $sql)){
    $professor_id = mysqli_insert_id($conexao);
    
    // Insere as matérias do professor
    foreach ($materias_selecionadas as $materia_id){
        $sql_materias_professores = "INSERT INTO materias_professor (materia_id, professor_id) VALUES ($materia_id, $professor_id)";
        mysqli_query($conexao, $sql_materias_professores);
    }
    
    // Redireciona de volta para o formulário com mensagem de sucesso
    header("Location: ../forms/form_professor.php?sucesso=1");
    exit();
} else {
    // Redireciona com mensagem de erro
    header("Location: ../forms/form_professor.php?erro=1");
    exit();
}
$professor_id = mysqli_insert_id($conexao);
    foreach ($materias_selecionadas as $materia_id){
      $sql_materias_professores = "INSERT INTO materias_professor (materia_id, professor_id) VALUES ($materia_id, $professor_id)";
      mysqli_query($conexao, $sql_materias_professores);
    }
        foreach ($disponibilidades as $disp){
            // $disp vem no formato "segunda-manha"
            $partes = explode('-', $disp);
            $dia = $partes[0];
            $turno = $partes[1];
            
            $sql_disp = "INSERT INTO disponibilidade_professores (professor_id, dia_semana, turno) 
                        VALUES ($professor_id, '$dia', '$turno')";
            $resultado = mysqli_query($conexao, $sql_disp);
        };
        if($resultado){
          echo('<div class="alert alert-info" role="alert">
            Disponibilidades cadastradas!
          </div>');
        
        } else {
          echo '<div class="alert alert-danger" role="alert">
            Erro ao cadastrar professor: '.mysqli_error($conexao).'
          </div>';
    }
?>