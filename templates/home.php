<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <h1><i class="fas fa-school"></i> Sistema de Horários SENAI</h1>
        <p class="lead">Gerencie professores, matérias e horários de forma simples</p>
    </div>
</div>

<!-- Cards principais -->
<div class="cards-section">
    <div class="container">
        <div class="row">
            <?php 
            $cards = [
                ["fa-chalkboard-user", "Professores", "Cadastre e gerencie professores", "../forms/form_professor.php", "Cadastrar"],
                ["fa-book", "Matérias", "Organize as disciplinas", "../forms/form_materia.php", "Gerenciar"],
                ["fa-calendar", "Horários", "Agende aulas e horários", "../forms/form_horarios.php", "Agendar"],
                ["fa-eye", "Visualizar", "Veja todos os horários", "visualizar_horarios.php", "Visualizar"]
            ];
            foreach ($cards as $c): ?>
                <div class="col-md-3">
                    <div class="card-home">
                        <i class="fa-solid <?= $c[0] ?>"></i>
                        <h4><?= $c[1] ?></h4>
                        <p><?= $c[2] ?></p>
                        <a href="<?= $c[3] ?>" class="btn btn-senai"><?= $c[4] ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</body>