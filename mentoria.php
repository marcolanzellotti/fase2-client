<?php
require_once "inc/functions.inc.php";
if (!isset($_SESSION['user'])) {
    header("Location: /");
}
$id = intval($_SESSION['user']);

$qUser = Q("SELECT * FROM customers WHERE id='$id'");
$user = $qUser->fetch_assoc();

$daysPassed = intval((time() - $user['create_time']) / 86400);
$left = 11 - $daysPassed;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <!-- Compiled and minified JavaScript -->
    <style>
        .e h3 {
            font-size: 15pt;
        }

        .container.disabled-iframes iframe {
            pointer-events: none;
        }
    </style>
    <title>Plano Seca Gordura</title>
</head>

<body>
    <header>

        <h3>
            Mentoria da Gordura
        </h3>
    </header>
    <a href="/home.php" class="back">Voltar</a>
    <?= $daysPassed < 11 ? "<blockquote class=\"p1 red bold\">Video liberado após 11 dias da sua inscrição (faltam $left)</blockquote>" : "" ?>
    <div class="container center main-container white z-depth-1 <?= $daysPassed < 11 ? "disabled-iframes" : "" ?>">
        <h3 class="black-text" style="font-size: 20pt;">Mentoria da gordura e vagas da Fase 2 do PSG</h3>
        <iframe class="mb1 home-video" src="https://www.youtube.com/embed/9G2vvGS_S4M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br />
        <a href="<?= $daysPassed < 11 ? "" : "pv-fase2.php" ?>" class="b z-depth-3 ">
            Conhecer Fase 2
        </a>
    </div>
</body>

</html>