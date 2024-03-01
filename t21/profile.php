<?php
require("./inc/functions.inc.php");
//var_dump($_SESSION);
requiredLogin();
session_start();
$userId = intval($_SESSION['logged_e_user']);

if (issetPostFields(["phone", "name", "password"])) {
    updateUser($userId, [
        "name" => $_POST['name'],
        "phone" => $_POST['phone'],
        "password" => $_POST['password']
    ]);
}

$loggedUser = getUserById($userId);
//var_dump($loggedUser['id']);die;
$challenges = getChallenges();

//$challengesInitial = getChallengesInitial($loggedUser['id']);
?>
<html>

<head>
    <?php require("inc/head.inc.php") ?>
    <title>Elimina+</title>
</head>

<body onload="handleLoad()">
    <header>
        <?php require("inc/nav.inc.php") ?>
    </header>
    <main>
        <div class="container white top-margin p1" style="margin-top:7em;">
            <div class="row">
                <div class="col">
                    <h5> Bem vindo(a), <?= $loggedUser['name'] ?></h5>
                </div>
            </div>
            <div class="section" id="challenges">
                <h5>DESAFIO DO MÊS</h5>
                <div class="collection">
                    <?php

                    foreach ($challenges as $challenge) {
                        $term = ($challenge['phase'] == "1" ? "iniciais" : "finais");
                        echo "<a href=\"/t21/challenge.php?id=$challenge[id]\" class=\"collection-item\">$challenge[title] (Fotos $term)<span class=\"secondary-content\">$challenge[start_date]</span></a>";
                    }
                    ?> </div>
            </div> <!-- challenges -->


            <div class="section" id="info">
                <h5>Informações pessoais</h5>
                <br />
                <form method="POST" action="" id="user-form">
                    <div class="row">
                        <div class="col m6 s12 ">
                            <i class="material-icons">person</i> Nome
                        </div>
                        <div class="col m6 s12 ">
                            <input type="text" class="text" name="name" value="<?= $loggedUser['name'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m6 s12 ">
                            <i class="material-icons">phone</i>Whatsapp
                        </div>
                        <div class="col m6 s12 ">
                            <input type="text" class="text" name="phone" id="whatsapp" value="<?= $loggedUser['phone'] ?>" placeholder="+55(00)90000-0000">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m6 s12">
                            <i class="material-icons">key</i>Senha
                        </div>
                        <div class="col m6 s12 input-field">
                            <input type="password" id="password" name="password" value="<?= $loggedUser['password'] ?>" required>

                            <span toggle="#password" class="field-icon toggle-password"><span class="material-icons">visibility</span></span>
                        </div>
                        <div class="col s12">
                            <button type="submit" class="btn" name="save">Salvar <i class="material-icons">send</i></button>
                        </div>
                    </div>
                </form>
            </div> <!-- info -->
            


        </div>
        <div class="container section center white">

          
            <h4>MATERIAL EXTRA</h4>
            <ul class="collapsible" id="ebooks" style="margin:auto;width:400px;max-width:90%;">
                <li>
                    <div class="collapsible-header"><i class="material-icons">assignment</i>Planejamento</div>
                    <div class="collapsible-body"><a href="">Clique aqui para ver o planejamento</a></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">assignment</i>Planner 2023 VIP</div>
                    <div class="collapsible-body"><a href="https://planosecagordura.com.br/maratona_/assets/docs/planner2023.pdf">Clique aqui para ver o manual</a></div>
                </li>

                <li>
                    <div class="collapsible-header"><i class="material-icons">assignment</i>Mapa de Hábitos</div>
                    <div class="collapsible-body"><a href="">Clique aqui para ver o manual da orientação</a></div>
                </li>



            </ul>
        </div>

    </main>
    <script src="/t21/assets/js/main.js"></script>
    <?php require("inc/footer.inc.php") ?>
</body>

</html>