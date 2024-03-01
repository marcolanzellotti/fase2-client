<?php
require_once("../inc/functions.inc.php");
requiredModLogin();
$mod = getModById($_SESSION['logged_mod']);
$id = intval($_GET['id']);

if (isset($_POST['challenge-name']) && isset($_POST['challenge-description'])) {
    if (!updateChallenge($id, [
        'title' => $_POST['challenge-name'],
        'description' => $_POST['challenge-description']
    ])) $error = "Erro ao salvar desafio";
} else if (isset($_GET['delete'])) {
    $delete = intval($_GET['delete']);
    deleteChallenge($delete);
    die(header("Location: /admin/#manage-challenges"));
} else if (isset($_GET['phase2'])) {
    $phase2 = intval($_GET['phase2']);
    updateChallenge($phase2, [
        'phase' => 2
    ]);
    die(header("Location: /admin/challenge?id=$phase2"));
} else if (isset($_GET['finish'])) {
    $finish = intval($_GET['finish']);
    updateChallenge($finish, [
        'active' => 0
    ]);
    die(header("Location: /admin/challenge?id=$finish"));
}


$challenge = getChallengeById($id);
if (!$challenge) die(header("Location: /admin"));

$term = ($challenge['phase'] == "1" ? "iniciais" : "finais");

if (isset($_POST['search'])) {
    $participants = searchParticipants($id, $_POST['search']);
} else {
    $participants = getChallengeParticipants($id, isset($_GET['strict']));
}
?>
<html>

<head>
    <?php require("../inc/head.inc.php") ?>
    <style>
        /* .h200 {
            height: 200px !important;
        } */
    </style>
    <title>Elimina+ - Gerenciar desafio</title>
</head>

<body>
    <header>

        <?php require("inc/nav.inc.php") ?>
    </header>
    <main>

        <div class="container p1 white top-margin">
            <h4>Editar desafio - <?= $challenge['title'] ?> (Fotos <?= $term ?>)</h4>
            <?php
            if ($error) echo "<blockquote>$error</blockquote>";
            ?>
            <form action="" method="POST">
                <div class="row">
                    <div class="col s12 input-field">
                        <input type="text" name="challenge-name" value="<?= $challenge['title'] ?>" id="challenge-name" required>
                        <label for="challenge-name">Nome do desafio</label>
                    </div>
                    <div class="col s12 input-field">
                        <textarea id="challenge-description" name="challenge-description" required class="materialize-textarea" rows="5"><?= $challenge['description'] ?></textarea>
                        <label for="challenge-description">Descrição do desafio</label>
                    </div>
                    <div class="col s12">
                        <button type="submit" class="btn blue">Salvar <i class="material-icons">send</i></button>
                    </div>
                </div>
            </form>
            <div class="section">
                <h4>Ações</h4>
                <div class="collection">

                    <?php if ($challenge['active'] == 1) {
                        if ($challenge['phase'] == 1) { ?>
                            <a id="phase2-challenge" href="#" class="collection-item"><i class="material-icons blue-text">looks_two</i>Fotos finais</a>
                        <?php } else { ?>
                            <a id="finish-challenge" href="#" class="collection-item"><i class="material-icons red-text">close</i>Encerrar desafio</a>

                        <?php }
                        ?>
                    <?php } ?>

                    <a href="#" id="delete-challenge" data-id="<?= $challenge['id'] ?>" class="collection-item"><i class="material-icons red-text">delete</i>Excluir desafio</a>
                </div>
            </div>
            <div class="section">
                <h4>Participantes (<?= count($participants) ?>)</h4>
                <?php
                if (isset($_GET['strict'])) {
                    echo "<a href=\"challenge?id=$id\">Todos os participantes</a>";
                } else {
                    echo "<a href=\"challenge?id=$id&strict=1\">Apenas segunda etapa</a>";
                }
                ?>

                <form action="" method="POST">
                    <div class="input-field row">
                        <input type="text" class="col m6 s12" name="search">
                        <label>Buscar participante</label>
                    </div>
                </form>
                <?php
                $participantsByPage = 7;
                $page = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
                $page--;
                $start = $page * $participantsByPage;
                $end = $start + $participantsByPage;
                if ($participants) {
                    foreach (array_slice($participants, $start, $participantsByPage) as $participant) {
                        $name = getUserById($participant['user_id'])['name'];
                        $imagesPhase1 = getParticipantImages($participant['id'], $id, 1);
                        $imagesPhase2 = getParticipantImages($participant['id'], $id, 2);
                        if (!$imagesPhase2 && $challenge['phase'] == '2') null;
                        $alreadyVoted = modAlreadyVoted(intval($_SESSION['logged_mod']), $challenge['id']);

                        if (isset($_POST['vote']) && !$alreadyVoted) {
                            if (!createVote(intval($_SESSION['logged_mod']), $participant['id'])) $error = "Erro ao salvar voto";
                            else {
                                $alreadyVoted = 1;
                                $participant = getParticipantById($participant['id']);
                            }
                        }
                ?>
                        <div class="section">
                            <h5><?= $name ?> <span class="secondary-content"><?= $participant['votes'] ?> Votos</span></h5>

                            <div class="row">
                                <div class="slider section col s12 m6 h200">
                                    <ul class="slides h200">
                                        <?php
                                        foreach ($imagesPhase1 as $image) {
                                            $ext = end(explode(".", $image['path']));
                                            $imagePath = $image['path']; //. ".compressed.$ext";
                                        ?>
                                            <li>
                                                <img class="low-res" src="../<?= $imagePath ?>" />


                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <?php
                                if ($challenge['phase'] == "2" && $imagesPhase2) {

                                ?>
                                    <div class="slider section col s12 m6 h200">
                                        <ul class="slides h200">
                                            <?php

                                            foreach ($imagesPhase2 as $image) {
                                                $ext = end(explode(".", $image['path']));
                                                $imagePath = $image['path']; //. ".compressed.$ext";
                                            ?>
                                                <li>
                                                    <img class="low-res" src="../<?= $imagePath ?>" />


                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="col s12 section">
                                        <form action="" method="POST">
                                            <input type="hidden" name="participant" value="<?= $participant['id'] ?>" />
                                            <button type="submit" name="vote" class="btn <?= $alreadyVoted ? "disabled" : "" ?>">Votar <i class="material-icons">done_outline</i></button>
                                        </form>
                                    </div>

                                <?php
                                }
                                ?>



                            </div>
                        </div>



                <?php
                    }
                } else {
                    echo "<blockquote>Ainda não há participantes nesse desafio</blockquote>";
                }
                ?>

            </div>

            <ul class="pagination">
                <?php
                $pages = round(count($participants) / $participantsByPage, 0, PHP_ROUND_HALF_UP);
                for ($i = 1; $i <= $pages; $i++) {
                    $active = ($i == $page + 1) ? "active" : "";
                    echo  "<li class=\"$active\" ><a href=\"?id=$id&page=$i\">$i</a></li>";
                }
                ?>
            </ul>
        </div>

    </main>
    <script src="/assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('.materialboxed').materialbox();
        });
        const handleDeleteChallenge = (e) => {
            Swal.fire({
                title: "Deseja excluir este desafio?",
                icon: "warning",
                showDenyButton: true,
                showConfirmButton: true,
                confirmButtonText: "Excluir",
                denyButtonText: "Não excluir"
            }).then(res => {
                if (res.isConfirmed) {
                    document.location.href = `?delete=${e.target.dataset.id}`
                }
            })
        }

        const handlePhase2 = (e) => {
            Swal.fire({
                title: "Deseja iniciar a segunda etapa deste desafio?",
                icon: "warning",
                showDenyButton: true,
                showConfirmButton: true,
                confirmButtonText: "Iniciar",
                denyButtonText: "Não iniciar"
            }).then(res => {
                if (res.isConfirmed) {
                    document.location.href = `?phase2=${e.target.dataset.id}`
                }
            })
        }


        const handleFinishChallenge = (e) => {
            Swal.fire({
                title: "Deseja finalizar este desafio?",
                icon: "warning",
                showDenyButton: true,
                showConfirmButton: true,
                confirmButtonText: "Finalizar",
                denyButtonText: "Não finalizar"
            }).then(res => {
                if (res.isConfirmed) {
                    document.location.href = `?finish=${e.target.dataset.id}`
                }
            })
        }


        document.getElementById("delete-challenge").addEventListener("click", handleDeleteChallenge);
        document.getElementById("finish-challenge").addEventListener("click", handleFinishChallenge);
        document.getElementById("phase2-challenge").addEventListener("click", handlePhase2);
    </script>
    <?php require("../inc/footer.inc.php") ?>
</body>

</html>