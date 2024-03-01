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
    <header style="background-image:url(http://fase2.planosecagordura.com.br/assets/img/elimina15.png);background-size:cover;">

        <!-- <h3>
            Gravações das lives
        </h3> -->
    </header>
    <a href="/home.php" class="back">Voltar</a>

    <div class="container center main-container">
        <iframe class="mb1 home-video" src="https://www.youtube.com/embed/bjUN7-uHLUs?si=vHgsZsEkbz9jI44J" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <br />
        <br />
        <div class="container white diary black-text" style="width: 100%;max-width:unset;">
            EXCLUSIVO PARA ALUNAS PSG<br /><br />

            DESAFIO de 10 dias com PREMIAÇÃO EM DINHEIRO para os 3 melhores resultados de transformação corporal !! <br><br>- 1⁰ LUGAR: R$ 600,00<BR>- 2⁰ LUGAR: R$ 300,00<BR>- 3⁰ LUGAR: R$ 100,00<br><br>
            
           <strong>LEMBRANDO:</strong> Resultado de transformação corporal NÃO É SÓ PERDER PESO NA BALANÇA, mas sim, eliminar gordura ao mesmo tempo, pois só assim conseguirá MODELAR O CORPO SEM EFEITO REBOTE !!<br /><br />

        <strong>INFORMAÇÕES:</strong> Procure seu Mentor(a) ou assista a Gravação do Lançamento<br /><BR><BR>
           
            <a class="cta" href="/t21/">FAZER INSCRIÇÃO<br />NO DESAFIO ELIMINA+</a><br /><br /><BR><BR>
           



        </div>
        <br />
</body>

</html>