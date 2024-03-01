<?php
require_once "inc/functions.inc.php";
if (!isset($_SESSION['logged_platform'])) {
    header("Location: /");
}
$id = intval($_SESSION['user']);

$qUser = Q("SELECT * FROM users WHERE id='$id'");
$user = $qUser->fetch_assoc();

$daysPassed = intval((time() - $user['create_time']) / 86400);

// $registered = Q("SELECT * FROM subscriptions WHERE mail='$user[email]'")->num_rows;
$qTrainings = Q("SELECT * FROM trainings ORDER BY id");
//$trainings = [];
while ($training = $qTrainings->fetch_assoc()){
    $trainings[] = $training;
}

// $trainings[explode(" ", $training['title'])[1]] = $training;
// ksort($trainings);
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

    <title>Plano Seca Gordura</title>
</head>

<body>
    <header style="background-image:url(http://fase2.planosecagordura.com.br/assets/img/treinos.png);background-size:cover;">

        <h3>
            <!-- Treinos Fase 1
            <br />
            Do PSG -->
        </h3>
    </header>
    <a href="/home.php" class="back">Voltar</a>
    <!-- <p class="p1 black white-text" style="text-align: center;">
        Os treinos da fase 2 do Plano Seca Gordura serão liberados após 30 dias
    </p> -->
    <div class="container center main-container" style="width:100%">
        <div class="section home-section" style="width: 100%;">
            <?php

            foreach ($trainings as $training) {
            ?>
                <div class="block t">
                    <h4 class="title">
                        <?= $training['title'] ?>
                    </h4>
                    <iframe class="mb1 home-video" src="<?= $training['url'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                </div>
            <?php } ?>

            <!--
            <div class="block t">
                <h4 class="title">
                    Treino 2
                </h4>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/r0HqMogQvo8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
            <div class="block t">
                <h4 class="title">
                    Treino 3
                </h4>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/aT9ll1CA2RA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
            <div class="block t">
                <h4 class="title">
                    Treino 4
                </h4>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/C7dkfCgajXQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
            <div class="block t">
                <h4 class="title">
                    Treino 5
                </h4>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/L1G4iFNcIC4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
            <div class="block t">
                <h4 class="title">
                    Treino 6
                </h4>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/itLaRNcbTbw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
            <div class="block t">
                <h4 class="title">
                    Treino 7
                </h4>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/j-OXgYUk4Yo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
          
            <div class="block t">
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/j-OXgYUk4Yo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h4 class="title">
                    Treino 7
                </h4>
            </div>  <div class="block t">
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/j-OXgYUk4Yo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h4 class="title">
                    Treino 7
                </h4>
            </div>  <div class="block t">
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/j-OXgYUk4Yo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h4 class="title">
                    Treino 7
                </h4>
            </div>  <div class="block t">
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/j-OXgYUk4Yo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h4 class="title">
                    Treino 7
                </h4>
            </div>  <div class="block t">
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/j-OXgYUk4Yo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h4 class="title">
                    Treino 7
                </h4>
            </div>  <div class="block t">
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/j-OXgYUk4Yo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h4 class="title">
                    Treino 7
                </h4>
            </div>  <div class="block t">
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/j-OXgYUk4Yo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h4 class="title">
                    Treino 7
                </h4>
            </div>
                -->
        </div>

    </div>
</body>

</html>