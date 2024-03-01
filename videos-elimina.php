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
    <header style="background-image:url(assets/img/banner-desafio.jpg);background-size:cover;">

        <!-- <h3>
            Grava�0�4�0�1es das lives
        </h3> -->
    </header>
    <a href="/lives.php" class="back">Voltar</a>
    <!-- <p class="p1 black white-text" style="text-align: center;">
        Os treinos da fase 2 do Plano Seca Gordura serão liberados após 30 dias
    </p> -->
    <div class="container center main-container" style="width:100%">
        <div class="section home-section" style="width: 100%;">
            <?php
            $qLives = Q("SELECT * FROM lives WHERE cat=2 ORDER BY id DESC");
            while ($live = $qLives->fetch_assoc()) {
                $url = str_replace("youtu.be/", "youtube.com/watch?v=", $live['url']);
            ?>
                <div class="block t">
                    <h4 class="title">
                        <?= $live['title'] ?>
                    </h4>
                    <iframe class="mb1 home-video" src="<?= str_replace("watch?v=", "embed/", $url) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                </div>
            <?php

            }
            ?>

        </div>

    </div>
</body>

</html>