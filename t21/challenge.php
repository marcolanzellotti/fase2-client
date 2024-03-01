<?php
require("./inc/functions.inc.php");
requiredLogin();

session_start();
$userId = intval($_SESSION['logged_e_user']);
$loggedUser = getUserById($userId);

$id = intval($_GET['id']);
$challenge = getChallengeById($id);
if (!$challenge) die(header("Location: /"));


if (isset($_FILES['photos']) && !getUserImages($userId, $id, 1)) {
    //    echo "<h1>Enviar para primeira etapa</h1>";
    $photos = $_FILES['photos'];

    if (validImages($photos)) {
        if ($participant = createParticipant($userId, $id)) {

            if (!uploadImages($photos, $participant, $id, 1)) {

                $error = "Erro ao enviar imagens";
            }
        } else {
            $error = "Erro ao entrar no desafio";
        }
    } else {

        $error = "O arquivo selecionado é inválido";
    }
}
$participants = getChallengeParticipants($challenge['id'], false);
$winners = getChallengeWinners($challenge['id']);

$selfParticipant = isParticipating($userId, $id);

if (isset($_FILES['photos']) && isset($_POST['phase2']) && $selfParticipant) {
    echo "<h1>Enviar para segunda etapa</h1>";
    $photos = $_FILES['photos'];

    if (validImages($photos)) {
        if (!uploadImages($photos, $selfParticipant['id'], $id, 2)) {
            // $error = "Erro ao enviar imagens";
        }
    } else {

        $error = "O arquivo selecionado é inválido";
    }

    // Marca como Autoriza ou não autoriza as fotos serem mostradas na live
    updateAuthorizesShowingPhotos($_POST['authorizes_showing_photos'], $selfParticipant['id'], $id);

    $selfParticipant = isParticipating($userId, $id);
}
$term = ($challenge['phase'] == "1" ? "iniciais" : "finais");

//var_dump($selfParticipant);die;
if (!empty($selfParticipant['authorizes_showing_photos'])) {
    if ($selfParticipant['authorizes_showing_photos'] == 1) {
        $mostrarFotos = 'Sim, autorizo.';
    } else {
        $mostrarFotos = 'Não, não autorizo.';
    }
}
?>
<html>

<head>
    <?php require("inc/head.inc.php"); ?>
    <title>Elimina+ - <?= $challenge['name'] ?></title>
</head>

<body onload="handleLoad()">
    <header>
        <?php require("inc/nav.inc.php"); ?>
    </header>
    <main>
        <div class="container white top-margin p1" style="margin-top:7em;">
            <div class="section">
                <h5><?= $challenge['title'] ?> (Fotos <?= $term ?>) <?= $challenge['active'] == "1" ? "<span class=\"badge new\" data-badge-caption=\"Ativo\"></span>" : "<span class=\"badge new red\" data-badge-caption=\"Encerrado\"></span>" ?></h5>

                <div class="row">
                    <div class="col">
                        <h6><b><?= count($participants) ?></b> Participantes <?= $challenge['active'] ?  "até o momento" : "" ?></h6>
                        Autorizo mostra minha fotos: <b><?= $mostrarFotos ?></b>
                    </div>
                </div>
                <?php
                if ($error) echo "<blockquote>$error</blockquote>";
                ?>
            </div>
            <?php

            if ($challenge['active'] != "1") {
                //var_dump($challenge);
                require_once("./inc/views/challenge-not-active.inc.php");
            } else {

                // if (($challenge['active'] == "1" && $challenge['phase'] == "2" && !$selfParticipant)) echo "<blockquote>Você não participou da primeira etapa do desafio, por tanto não é possível participar da segunda</blockquote>";

                if (1) { //!$selfParticipant || ($challenge['phase'] == 2 && !getParticipantImages($selfParticipant['id'], $id, 2)) || ($challenge['phase'] == "2" && $selfParticipant && !getParticipantImages($selfParticipant['id'], $id, 2))) {

                    //var_dump($challenge);

                    if (empty(getUserImages($userId, $challenge['id'], 1)) && $challenge['phase'] == "1") {
                        if (!getUserImages($userId, $challenge['id'], 1)) { //!$selfParticipant) { //!($challenge['phase'] == "2" && !$selfParticipant)) {
                            echo "<h3>Anexe as fotos da primeira etapa</h3>";
                            require("./inc/views/challenge-not-participating.inc.php");
                            // Não está participando da primeira etapa
                        }
                    }

                    // var_dump(getUserImages($userId, $challenge['id'], 2));
                    if (!getUserImages($userId, $challenge['id'], 2) && $challenge['phase'] == "2") {
                        echo "<h3>Anexe as fotos da segunda etapa</h3>";
                        $phase2 = 1;
                        require("./inc/views/challenge-not-participating.inc.php");
                        // Não está participando da segunda etapa

                    }
                }
                if ($selfParticipant) {

                    require("./inc/views/challenge-already-participating.inc.php");
                    // Usuário não está participando OU
                    // Desafio na fase 2 e usuário não está participando da mesma
                    // Ou desafio na fase 2 e usuário já participa da fase 1
                }
            }
            ?>


            <!--section -->
        </div>
    </main>
    <script src="/t21/assets/js/main.js"></script>
    <?php require("inc/footer.inc.php") ?>
</body>

</html>