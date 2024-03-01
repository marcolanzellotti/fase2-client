<?php
require_once("inc/conf.inc.php");
require_once("inc/functions.inc.php");

if (!isset($_SESSION['logged_platform'])) {
    header("Location: /");
}



$id = intval($_SESSION['user']);
$qUser = Q("SELECT * FROM users WHERE id='$id'");
$user = $qUser->fetch_assoc();


$tmpCon = new mysqli("localhost", "eudesa99_yuri", "t0m{@Z]wKjI%", "eudesa99_forms");
$qHabits = $tmpCon->query("SELECT * FROM habits WHERE mail='$user[email]'");

if (!$qHabits->num_rows && $user['last_watched_video'] == "5") {
    die(header("Location: https://formularios.planosecagordura.com.br/habitos.php"));
}

if ($user['last_watched_video'] != "1") {
    die(header("Location: video.php"));
}



$tmpCon = new mysqli("localhost", "eudesa99_yuri", "t0m{@Z]wKjI%", "eudesa99_forms");
$qHabits = $tmpCon->query("SELECT * FROM habits WHERE mail='$user[email]'");
if ($qHabits->num_rows) {
    die(header("Location: /home.php"));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Mentoria Fase 2</title>
</head>

<body>
    <div class="container video z-depth-3">
        <img src="http://planoalimentarpsg.com.br/assets/img/logo1000.webp" alt="">

        <h3>
            Mentoria Fase 2
        </h3>
        <p style="color:white;font-weight:bolder;font-size:13pt;">
            Assista ao vídeo abaixo, para ter todas as informações e assim receber o seu planejamento e começar o seu acompanhamento.
        </p>
        <iframe class="mb1 home-video" src="https://www.youtube.com/embed/QMR0dOCBHnk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


        <a href="video.php" id="habitsButton">Clique aqui para assistir ao próximo video</a>


    </div>
</body>
<script>

</script>

</html>