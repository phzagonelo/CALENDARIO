<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body { background: linear-gradient(135deg, #1e618d, #4fa8d8); 
            min-height: 100vh; 
            font-family: Arial, sans-serif; 
            background-image: url("../images/FotoSenai.png");
            background-size: cover;
            background-position: center; 
            background-repeat: no-repeat;
        }
         .card-home { background: rgba(42, 44, 83, 0.84); border-radius: 15px; padding: 30px; margin: 20px 0; box-shadow: 0 5px 15px rgba(241, 236, 236, 0.63); text-align: center; }
        .card-home:hover { transform: translateY(-5px); }
        .card-home i { font-size: 1rem; color: #e6e9ebff !important; margin-bottom: 10px; }
        .card-home h4 { color: #e6e9ebff; margin-bottom: 15px; }
        .card-home p { color: #6bb2c6ff;
         }
        .btn-senai { background-color: #222661ff; border: none; padding: 10px 20px; border-radius: 25px; color: white; text-decoration: none; }
    </style>
</head>
<body>


<!-- Título -->
<div class="container mt-5 text-center text-white">
    <h1><i class="fas fa-school"></i> Sistema de Horários SENAI</h1>
    <p class="lead">Gerencie professores, matérias e horários de forma simples</p>
</div>

<!-- Cards principais -->
<div class="container">
    <div class="row">
        <?php 
        $cards = [
            ["fa-chalkboard-user", "Professores", "Cadastre e gerencie professores", "../forms/form_professor.php", "Cadastrar"],
            ["fa-book", "Matérias", "Organize as disciplinas", "../forms/form_materia.php", "Gerenciar"],
            ["fa-calendar", "Horários", "Agende aulas e horários", "horarios_professor.php", "Agendar"],
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


</body>
</html>
