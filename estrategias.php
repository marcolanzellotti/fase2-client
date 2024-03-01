<?php
require_once "inc/functions.inc.php";
if (!isset($_SESSION['user'])) {
    header("Location: /");
}
$id = intval($_SESSION['user']);

$qUser = Q("SELECT * FROM customers WHERE id='$id'");
$user = $qUser->fetch_assoc();

$daysPassed = intval((time() - $user['create_time']) / 86400);

$registered = Q("SELECT * FROM subscriptions WHERE mail='$user[email]'")->num_rows;

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
    <style>
        .e h3 {
            font-size: 15pt;
        }

        .container.disabled-iframes iframe {
            pointer-events: none;
        }
    </style>
</head>

<body>
    <header>

        <h3>
            Estratégias VIP
        </h3>
    </header>
    <a href="/home.php" class="back">Voltar</a>
    <?= $daysPassed < 7 ? "<blockquote class=\"p1 red bold\">Videos liberados após 7 dias da sua inscrição</blockquote>" : "" ?>
    <div class="container center main-container <?= $daysPassed < 7 ? "disabled-iframes" : "" ?>">
        <div class="section">
            <div class="e">
                <h3>COMO ELIMINAR ATÉ 60KG DE GORDURA SEM FLACIDEZ</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/er9CgD4DQJ0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>MENTALIDADE BLINDADA</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/EAQCyEDfN60" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>COMO TRINCAR O ABDÔMEN APÓS A OBESIDADE</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/thS3hkZh1uM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>SEGREDOS PARA NUNCA MAIS TER EFEITO SANFONA</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/HzP78FjKlWE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>COMO ELIMINAR ATÉ 50KG APOS OS 40 ANOS</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/QAizXnP9b8U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>3 SEGREDOS DA MENTALIDADE PARA SECAR</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/po03KFQ3vWg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="e">
                <h3>ALIMENTOS SABOTADORES</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/ZqrsnvkMoDI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="e">
                <h3>ARMADILHAS DOS RÓTULOS</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/xUjAGFJ_W9M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>VENCENDO A COMPULSÃO</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/EAQCyEDfN60" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>AUTO SABOTAGEM</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/EAQCyEDfN60" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>FESTAS SEM ENGORDAR</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/EAQCyEDfN60" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>DIETA PÓS FESTAS</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/EAQCyEDfN60" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>REGULARIZANDO O INTESTINO PARA SECAR A BARRIGA</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/EAQCyEDfN60" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>ATIVANDO OS HORMÔNIOS PARA A QUEIMA DE GORDURA</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/EAQCyEDfN60" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>DETOX DO SONO</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/EAQCyEDfN60" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>6 PASSOS PARA SECAR A BARRIGA</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/EAQCyEDfN60" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>MANTENDO O FOCO NO INVERNO</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/EAQCyEDfN60" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>USANDO A CIÊNCIA PARA ACELERAR SEU RESULTADO</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/EAQCyEDfN60" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>ORNIGANIZANDO TODAS AS REFEIÇÕES EM DUAS HORAS</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/EAQCyEDfN60" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>FUNDAMENTOS DO GANHO DE MASSA</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/EAQCyEDfN60" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>ROTINA MATINAL PARA ATIVAR O METABOLISMO</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/EAQCyEDfN60" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="e">
                <h3>COMO ATIVAR O METABOLISMO</h3>
                <iframe class="mb1 home-video" src="https://www.youtube.com/embed/EAQCyEDfN60" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>


        </div>


    </div>
</body>

</html>