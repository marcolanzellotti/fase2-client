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
    <header style="background-image:url(http://fase2.planosecagordura.com.br/assets/img/gravacoeslives.png);background-size:cover;">

        <!-- <h3>
            Gravações das lives
        </h3> -->
    </header>
    <a href="/home.php" class="back">Voltar</a>

    <div class="container center main-container">

        <div class="container  diary">

            <div class="lives">
                <a class="image" href="videos-maratona.php">

                    <img src="https:///fase2.planosecagordura.com.br/assets/img/livemaratona.png" alt="">
                    <h4> CLIQUE AQUI PARA ENTRAR</h4>
                </a>
                <a class="image" href="videos-elimina.php">

                    <img src="assets/img/banner-desafio.jpg" alt="">
                    <h4> CLIQUE AQUI PARA ENTRAR</h4>
                </a>
                <a class="image" href="videos-conteudo.php">

                    <img src="https:///fase2.planosecagordura.com.br/assets/img/livevip.png" alt="">
                    <h4> CLIQUE AQUI PARA ENTRAR</h4>
                </a>
                <a class="image" href="videos-promocoes.php">

                    <img src="https:///fase2.planosecagordura.com.br/assets/img/livepromo.png" alt="">
                    <h4> CLIQUE AQUI PARA ENTRAR</h4>
                </a>
            </div>
        </div>

        <!-- <div class="d">
            <img src="https://planoalimentarpsg.com.br/assets/compressed-img/resultado140.webp" alt="">
            <p>
                aaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaa
            </p>
        </div>
        <div class="d">
            <img src="https://planoalimentarpsg.com.br/assets/compressed-img/resultado200.webp" alt="">
            <p>
                aaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaa
            </p>
        </div>
        <div class="d">
            <img src="https://planoalimentarpsg.com.br/assets/compressed-img/resultadokarina7dias.webp" alt="">
            <p>
                aaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaa
            </p>
        </div> -->
    </div>
</body>

</html>