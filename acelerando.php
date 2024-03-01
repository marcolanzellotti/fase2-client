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
    <header style="background-image:url(http://fase2.planosecagordura.com.br/assets/img/acelerando.png);background-size:cover;">


    </header>
    <a href="/home.php" class="back">Voltar</a>

    <div class="container center main-container">
        <iframe class="mb1 home-video" src="https://www.youtube.com/embed/LyfwyAhNSTY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <br /> <br />
        <div class="container white diary black-text" style="width: 100%;max-width:unset;">
            <strong>SEGREDO REVELADO</strong><br><br>Com o uso do complemento nutricional conseguimos variar as estratégias nutricionais para acelerar o resultado de forma prática e gostosa, além de gerar uma economia financeira.<br><br>
            
            Após o cadastro as Alunas do PSG podem comprar DIRETO DA FÁBRICA com descontos especiais, frete grátis, parcelamento sem juros e acesso ao programa de prêmios exclusivos <strong>(Válido apenas para o Cadastro feito pela Equipe PSG).<br><br></strong>
            
            <strong>BENEFÍCIOS DO CADASTRO:</strong><br>
            - Planejamento VIP<br>
            - Grupo VIP das Alunas<br>
            - Receitas Exclusivas<br>
            - Plano Refeições Livres<br>
            - FitDay: Plano Nutricional VIP<br><br>
    <strong>INCLUSO:</strong> 6 estratégias individualizadas para acelerar sua transformação corporal<br>    
        </div><br /> <br />
        <a href="https://br.myherbalife.com" class="cta" style="font-size:15pt;text-decoration:none;">Clique aqui para comprar direto da fábrica</a>
</body>

</html>