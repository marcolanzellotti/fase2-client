<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once("../inc/functions.inc.php");

requiredModLogin();
$mod = getModById($_SESSION['logged_mod']);
$id = intval($_GET['id']);

$challenge = getChallengeById($id);
if (!$challenge) die(header("Location: /admin"));


$term = ($challenge['phase'] == "1" ? "iniciais" : "finais");


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
            <h4>Vencedoras - <?= $challenge['title'] ?></h4>
            <?php
            if ($error) echo "<blockquote>$error</blockquote>";
            ?>
            <!--
            <div class="section">
                <h4>Ações</h4>
                <div class="collection">
                    <a href="?reset_selection=<?= $challenge['id'] ?>" class="collection-item">Reiniciar seleção</a>
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
            -->
            <div class="section">

                <?php
                $winners = getChallengeWinners($challenge['id']);





                if (0) {
                ?>

                    <?php
                } else {
                    $participant_index = 0;
                    foreach ($winners as $winner) {

                        $qMod = $con->query("SELECT * FROM mod_participant_winners w
                       LEFT JOIN  mods m
                       ON m.id = w.mod_id
                       WHERE w.id=$winner[id]
                       ");

                        $winnerMod = $qMod->fetch_assoc();

                        $imagesPhase1 = getParticipantImages($winner['participant_id'], $id, 1);
                        $imagesPhase2 = getParticipantImages($winner['participant_id'], $id, 2);



                    ?>

                        <div class="row">
                            <h3 class="green-text"><?= $winnerMod['name'] ?></h3>
                            <h4><?= $winner['name'] ?></h4>
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
                            <?php


                            }
                            ?>



                        </div>
                <?php
                        $participant_index++;
                    }
                }
                ?>
            </div>

            <ul class="pagination">
                <?php
                // $pages = round(count($participants) / $participantsByPage, 0, PHP_ROUND_HALF_UP);
                // for ($i = 1; $i <= $pages; $i++) {
                //     $active = ($i == $page + 1) ? "active" : "";
                //     echo  "<li class=\"$active\" ><a href=\"?id=$id&page=$i\">$i</a></li>";
                // }
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