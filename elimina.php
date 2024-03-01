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
    <style>
        .cta {
            font-size: 14pt;
        }
    </style>
    <title>Plano Seca Gordura</title>
</head>

<body>
    <header style="background-image:url(http://fase2.planosecagordura.com.br/assets/img/t21-block.png);background-size:cover;">

        <!-- <h3>
            Gravações das lives
        </h3> -->
    </header>
    <a href="/home.php" class="back">Voltar</a>

    <div class="container center main-container">
        <iframe class="mb1 home-video" src="https://www.youtube.com/embed/ciLdqtm3QKM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <br />
        <br />
        <div class="container white diary black-text" style="width: 100%;max-width:unset;">
            NOVO DESAFIO para Alunas do PSG<br /><br />

            Agora aumentamos a premiação para R$ 10.000,00, teremos novos treinos, planejamento especial e o melhor… teremos Grupo de Acompanhamento !!<br /><br />

            LEMBRANDO: resultado de transformação corporal NÃO SÓ PERDER PESO NA BALANÇA, mas sim, eliminar gordura e ganhar massa corporal, pois só assim conseguirá MODELAR O CORPO (reduzir medidas/volume corporal).<br /><br />

            TAXA DE INSCRIÇÃO:<br />
            - Aluna PSG: R$ 00,00<br />
            - Não Aluna PSG: consulte seu mentor<br /><br />
           
            <a class="cta" href="/t21/">INSCRIÇÃO GRATUITA<br />DESAFIO ELIMINA</a><br /><br />
            



        </div>
        <br />
</body>

</html>