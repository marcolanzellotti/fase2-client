<?php
require_once("../inc/conf.inc.php");
require_once("../inc/functions.inc.php");

$recipe = intval($_GET['id']);
$qRecipe = Q("SELECT * FROM recipes WHERE id=$recipe");
$recipe = $qRecipe->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://unpkg.com/imask"></script>

    <title>Receitas Calculadas - Plano Seca Gordura</title>
</head>

<body>
    <header style="background-image:url(http://fase2.planosecagordura.com.br/assets/img/receitascalculadas.png);background-size:cover;" onclick="document.location.href='/fitflix'"></header>
    <a href="/receitas" class="back">Voltar</a>

    <div class="container center main-container">
        <div class="post">
            <h1><?= $recipe['title'] ?></h1>

            <img class="cover" src="assets/img/covers/<?= $recipe['cover'] ?>.jpg" alt="">

            <div style="word-wrap: break-word; opacity: 0.8; background-color: #fff; margin: 15px; padding: 10px; text-align: justify; color: #000; text-align: justify;">
                <p style="margin: 10px; color: #000;"><?= $recipe['content'] ?></p>
            </div>
        </div>


    </div>
</body>

</html>