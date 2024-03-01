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
    <style>
        .cta {}
    </style>
</head>

<body>
    <header style="background-image:url(http://fase2.planosecagordura.com.br/assets/img/maratona15.png);background-size:cover;">

    </header>
    <a href="/home.php" class="back">Voltar</a>

    <div class="container center main-container">
        <iframe class="mb1 home-video" src="https://www.youtube.com/embed/yZeGGlg4gio" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <br /> <br />

        <div class="container white diary black-text" style="width: 100%;max-width:unset;">
            <strong>GRUPO ESTRATÉGIAS VIP</strong><br><br>Acelerar resultado, aumentar energia/disposição, fazer a regulagem hormonal e ainda reduzir o custo com alimentação, nós conseguimos na MARATONA.<br><br>
            Refeição de R$ 6,00 a R$ 8,00 com 23 nutrientes, APENAS 210 calorias, baixíssimo indíce glicêmico, 20g de proteína isolada, carboidrato de alta qualidade, nos permite emagrecer mais rapidamente e com saúde.<br><br>
            <strong>O QUE ESTÁ INCLUSO NA MARATONA:</strong><br>
            - Planejamento Maratona<br>
            - Grupo VIP das Alunas<br>
            - Receitas Exclusivas<br>
            - LIVE de Estratégias<br>
            - Orientações Exclusivas<br><br>
            <strong>OBS: VOCÊ TERÁ RESULTADO</strong> sem fazer parte da Maratona, porém o tempo e a construção são diferentes.<br><br>
            Após entrar na Plataforma Exclusiva da Maratona, irá pedir uma senha que é liberada no Grupo VIP das alunas que estão participando.


        </div> <br /> <br />
        <a href="https://planosecagordura.com.br/maratona_" class="cta" style="font-size:15pt;text-decoration:none;">Clique aqui para acessar a Plataforma da Maratona</a>
</body>

</html>