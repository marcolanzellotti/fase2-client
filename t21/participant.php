<?php
require_once("../inc/functions.inc.php");
// requiredLogin();
$id = intval($_GET['id']);
$mod = getModById(intval($_SESSION['logged_mod']));
$participant = getParticipantById($id);
if (!$participant) die(header("Location: /admin"));

$alreadyVoted = getVote(intval($_SESSION['logged_mod']), $id);
if (isset($_POST['vote']) && !$alreadyVoted) {
    if (!createVote(intval($_SESSION['logged_mod']), $id)) $error = "Erro ao salvar voto";
    else {
        $participant = getParticipantById($id);
        $alreadyVoted = 1;
    }
}

$challenge = getChallengeById($participant['challenge_id']);
$imagesPhase1 = getParticipantImages($participant['id'], $participant['challenge_id'], 1);
if ($challenge['phase'] == "2") {
    $imagesPhase2 = getParticipantImages($participant['id'], $participant['challenge_id'], 2);
}


$user = getUserById($participant['user_id']);
?>

<html>

<head>
    <?php require("../inc/head.inc.php") ?>
    <title>Elimina+</title>
</head>

<body>
    <header>

        <?php require("inc/nav.inc.php") ?>
    </header>
    <main>
        <div class="container p1 white top-margin">
            <h4><a href="<?= "/admin/challenge?id=$challenge[id]" ?>"><?= "$challenge[title] (Fase $challenge[phase]) - $user[name]" ?></a> <span class="secondary-content"><?= $participant['votes'] ?> Votos</span></h4>
            <?php
            if ($error) echo "<blockquote>$error</blockquote>";
            ?>
            <ul class="collapsible">
                <li class="active">
                    <div class="collapsible-header">
                        <i class="material-icons">collections</i>Fotos (fase 1)
                    </div>
                    <div class="collapsible-body">
                        <div class="slider">
                            <ul class="slides">
                                <?php foreach ($imagesPhase1 as $image) {

                                ?>
                                    <li>
                                        <img src="/<?= $image['path'] ?>"> <!-- random image -->
                                        <div class="caption center-align">
                                            <h3>Antes</h3>
                                        </div>
                                    </li>

                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </li>
                <?php if ($challenge['phase'] == "2") { ?>
                    <li>

                        <div class="collapsible-header">
                            <i class="material-icons">collections</i>Fotos (fase 2)
                        </div>
                        <div class="collapsible-body">
                            <div class="slider">
                                <ul class="slides">
                                    <?php foreach ($imagesPhase2 as $image) {
                                    ?>
                                        <li>
                                            <img src="/<?= $image['path'] ?>"> <!-- random image -->
                                            <div class="caption center-align">
                                                <h3>Depois</h3>
                                            </div>
                                        </li>

                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <form action="" method="POST">
                <button type="submit" name="vote" data-participant="<?= $participant['id'] ?>" class="btn <?= $alreadyVoted ? "disabled" : "" ?>">Votar <i class="material-icons">done_outline</i></a>
            </form>

        </div>

    </main>
    <script src="/assets/js/main.js"></script>
    <?php require("../inc/footer.inc.php") ?>
</body>

</html>