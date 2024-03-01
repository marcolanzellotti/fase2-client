<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
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
} else if (isset($_GET['reset_selection'])) {
    $reset = intval($_GET['reset_selection']);
    $qResetSelection = $con->query("DELETE FROM mod_participant_excludes WHERE mod_id=$mod[id] AND challenge_id=$reset");
    $qResetWinner = $con->query("DELETE FROM mod_participant_winners WHERE mod_id=$mod[id] AND challenge_id=$reset");
    die(header("Location: /admin/challenge?id=$reset"));
}

$challenge = getChallengeById($id);
if (!$challenge) die(header("Location: /admin"));


$term = ($challenge['phase'] == "1" ? "iniciais" : "finais");

if (isset($_POST['search'])) {
    $participants = searchParticipants($id, $_POST['search']);
} else {
    $participants = getChallengeParticipants($id, isset($_GET['strict']));
}

$perPage = 4;
$offset = isset($_GET['page']) ? (intval($_GET['page']) - 1) * $perPage : 0;
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

                    <?php if ($challenge['active'] == 1 || 1) {
                        if ($challenge['phase'] == 1) { ?>
                            <a id="phase2-challenge" data-id="<?= $challenge['id'] ?>" href="#" class="collection-item"><i class="material-icons blue-text">looks_two</i>Fotos finais</a>
                        <?php } else { ?>
                            <a href="winners.php?id=<?= $challenge['id'] ?>" class="collection-item">Ver vencedoras</a>

                            <a href="?reset_selection=<?= $challenge['id'] ?>" class="collection-item">Reiniciar seleção</a>
                            <a id="finish-challenge" data-id="<?= $challenge['id'] ?>" href="#" class="collection-item"><i class="material-icons red-text">close</i>Encerrar desafio</a>

                        <?php }
                        ?>
                    <?php } ?>

                    <a href="#" id="delete-challenge" data-id="<?= $challenge['id'] ?>" class="collection-item"><i class="material-icons red-text">delete</i>Excluir desafio</a>
                </div>
            </div>
            <div class="section">
                <form action="" method="POST">
                    <div class="input-field row">
                        <input type="text" class="col m6 s12" name="search">
                        <label>Buscar nome de usuário / telefone</label>
                    </div>
                </form>
                <?php
                if (isset($_POST['exclude'])) {
                    $exclude = intval($_POST['exclude']);
                    if (!excludeChallengeParticipant($exclude, $mod['id'], $challenge['id'])) var_dump(mysqli_error($con));
                } else if (isset($_POST['winner'])) {
                    $winner = intval($_POST['winner']);

                    if (!setChallengeModWinner($challenge['id'], $mod['id'], $winner))  var_dump(mysqli_error($con));
                }
                $challengeModWinner = getChallengeModWinner($challenge['id'], $mod['id']);

                $qParticipants = $con->query("
                SELECT DISTINCT p.id, u.name, u.phone, p.user_id FROM participants p

                LEFT JOIN users u
                ON u.id = p.user_id

                
                WHERE p.id IN (SELECT participant_id FROM images WHERE challenge_phase=$challenge[phase])
                AND p.id NOT IN (SELECT participant_id FROM mod_participant_excludes WHERE mod_id=$mod[id])
                AND p.challenge_id=$challenge[id]
                "
                    .
                    (isset($_POST['search']) ? "AND u.name LIKE '%$_POST[search]%' OR u.phone LIKE '%$_POST[search]%'" : "")
                    .
                    "
                GROUP BY p.id
                ORDER BY p.id
                ASC
                ");

                $participants = [];
                while ($participant = $qParticipants->fetch_assoc()) array_push($participants, $participant);

                $participantsLeft = count($participants);

                $pageCount = ceil(count($participants) / $perPage) + 1;
                $participants = array_slice($participants, $offset, $perPage);

                //                $participantCount = count(getChallengeParticipants($challenge['id'], true));
                $participantCount = $qParticipants->num_rows;
                if ($challenge['phase'] == "2")
                    $participants = array_slice($participants, 0, 2);



                $qModExcludes = $con->query("SELECT * FROM mod_participant_excludes WHERE mod_id=$mod[id] AND challenge_id=$challenge[id]");
                $modExcludesCount = $qModExcludes->num_rows;

                echo "<h5>$participantsLeft / $participantCount participantes</h6>";

                if (0) {
                ?>

                    <?php
                } else {
                    $participant_index = 0;
                    foreach ($participants as $participant) {
                        $exclude_index = !$participant_index;
                        $imagesPhase1 = getParticipantImages($participant['id'], $id, 1);
                        $imagesPhase2 = getParticipantImages($participant['id'], $id, 2);


                    ?>

                        <div class="row participant">
                            <h4><?= "<b>$participant[name]</b>  <span class=\"secondary-content\" style=\"font-size:15pt;\">$participant[phone]</span>" . ($challengeModWinner ? " (Vencedora)" : "") ?>
                            </h4><br /><br /><br />
                            <h5>Antes</h5>
                            <div class="participant-images">
                                <?php
                                foreach ($imagesPhase1 as $image) {
                                    $ext = end(explode(".", $image['path']));
                                    $imagePath = $image['path']; //. ".compressed.$ext";
                                ?>

                                    <img class="materialboxed" src="../<?= $imagePath ?>" />



                                <?php
                                }
                                ?>
                            </div>

                            <h5>Depois</h5>
                            <div class="participant-images">
                                <?php
                                if ($challenge['phase'] == "2" && $imagesPhase2) {

                                ?>


                                    <?php

                                    foreach ($imagesPhase2 as $image) {
                                        $ext = end(explode(".", $image['path']));
                                        $imagePath = $image['path']; //. ".compressed.$ext";
                                    ?>

                                        <img class="materialboxed" src="../<?= $imagePath ?>" />



                                    <?php
                                    }
                                    ?>
                            </div>
                            <?php
                                    if (!$challengeModWinner) {
                                        if (count($participants) > 1) {

                            ?>
                                    <div class="col s12 section">
                                        <form action="" method="POST">
                                            <input type="hidden" name="exclude" value="<?= $participants[$exclude_index]['id'] ?>" />
                                            <br />
                                            <button type="submit" name="vote" class="btn <?= $alreadyVoted ? "disabled" : "" ?>">Escolher <i class="material-icons">done_outline</i></button>
                                        </form>
                                    </div>


                                <?php
                                        } else if (!$challengeModWinner) {
                                ?>
                                    <div class="col s12 section">
                                        <form action="" method="POST">
                                            <input type="hidden" name="winner" value="<?= $participant['id'] ?>" />
                                            <button type="submit" class="btn">Definir vencedor <i class="material-icons">done_outline</i></button>
                                        </form>
                                    </div>
                        <?php
                                        }
                                    }
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
                for ($counter = 1; $counter < $pageCount; $counter++) {
                ?>
                    <li <?= $_GET['page'] == $counter ? " class=\"active\"" : "" ?>><a href="?id=<?= $_GET['id'] ?>&page=<?= $page ?><?= $counter ?>"><?= $counter ?></a></li>
                <?php
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
        if (document.getElementById("finish-challenge"))
            document.getElementById("finish-challenge").addEventListener("click", handleFinishChallenge);
        document.getElementById("phase2-challenge").addEventListener("click", handlePhase2);
    </script>
    <?php require("../inc/footer.inc.php") ?>
</body>

</html>