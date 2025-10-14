<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Matéria</title>
    <link rel="stylesheet" href="../css/forms_geral.css">
</head>
<body>
    <?php 
        include "../navbar.php";
    ?>

    <!-- Hero Section (opcional, combina com os outros formulários) -->
    <section class="hero-section">
        <h1>Cadastro de Matéria</h1>
        <p>Adicione novas matérias ao sistema</p>
    </section>

    <!-- Formulário com a mesma aparência do outro -->
    <div class="form-container">
        <form action="../bd/cadastro_materia.php" method="POST">
            <div class="mb-3">
                <label class="form-label" for="materia">Nome da matéria</label>
                <input id="materia" type="text" class="form-control" name="materia" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="carga_horaria">Carga horária total</label>
                <input id="carga_horaria" type="text" class="form-control" name="carga_horaria" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="turno">Turno</label>
                <select id="turno" class="form-select" name="turno" required>
                    <option value="" disabled selected>Selecione o turno</option>
                    <option value="manha">Manhã</option>
                    <option value="tarde">Tarde</option>
                    <option value="noite">Noite</option>
                </select>
            </div>

            <button type="submit" class="button">Cadastrar</button>
        </form>
    </div>

</body>
</html>
