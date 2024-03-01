<?php
require_once("../inc/conf.inc.php");
require_once("../inc/functions.inc.php");

if (!isset($_SESSION['logged_platform'])) {
    header("Location: /");
}

$id = intval($_SESSION['user']);

if (isset($_GET['video'])) {
    $v = intval($_GET['video']);
    $con->query("UPDATE users SET last_watched_video='$v' WHERE id='$id'");
}

$qUser = Q("SELECT * FROM users WHERE id='$id'");
$user = $qUser->fetch_assoc();

$tmpCon = new mysqli("localhost", "eudesa99_yuri", "t0m{@Z]wKjI%", "eudesa99_forms");
$qHabits = $tmpCon->query("SELECT * FROM habits WHERE mail='$user[email]'");
if ($qHabits->num_rows) {
    //  die(header("Location: /home.php"));
}




$id = $user['last_watched_video'];
$qVideos = Q("SELECT * FROM videos");
$videos = [];
while ($video = $qVideos->fetch_assoc()) {
    $videos[] = $video;
}

$i = -1;
$index = 0;
foreach ($videos as $v) {
    $i++;
    if ($v['id'] == $id) {
        $video = $v;
        $index = $i;
    }
}

$nextVideo = $videos[$index + 1];
$nextVideoPassword = $nextVideo['password'];
$nextVideoId = $nextVideo['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="assets/js/main.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Mentoria Fase 2</title>
</head>

<body>
    <div class="container video z-depth-3">
        <img src="http://planoalimentarpsg.com.br/assets/img/logo1000.webp" alt="">
        <?php
        if (isset($error)) {
            echo "<blockquote class=\"error\">$error</blockquote>";
        } else {

        ?>
            <h3>
                Video <?= $index + 1 ?> de <?= count($videos) ?>

            </h3>
            <iframe class="mb1 home-video" src="<?= $video['url'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            <?php
            if ($nextVideo) {

            ?>
                <form action="" method="POST" id="nextVideoForm">
                    <div class="row" style="width:98%;">
                        <p style="color:white;font-weight:bold;font-size:11pt;">Durante o video irá aparecer uma senha, então assista para que possa digitar abaixo a senha deste video</p>
                        <div class="col m12 s12 input-field">

                            <input type="text" id="password" name="password" id="">
                            <label for="password">Senha</label>
                        </div>
                        <div class="col m12 s12 input-field" style="display:flex;align-items:center;">
                            <button type="submit" class="btn" id="password" name="password" id="">Próximo video <i class="material-icons">send</i></button>

                        </div>
                    </div>

                </form>
            <?php
            } else {
            ?>
                <a href="https://formularios.planosecagordura.com.br/habitos.php" id="habitsButton">Clique aqui para preencher sua ficha de hábitos</a>
            <?php
            }
            ?>

        <?php
        }
        ?>
    </div>
</body>
<script>
    document.getElementById("nextVideoForm").addEventListener("submit", e => {
        e.preventDefault()
        pass = new FormData(e.target).get("password")
        pass = pass.replace(/\s/g, "")
        pass = pass.toLowerCase()
        console.log(pass)

        if (!"<?= $nextVideoPassword ?>".split("|").includes(pass)) {
            alert("Senha inválida")
        } else {
            document.location.href = "?video=<?= $nextVideoId ?>"
        }
    })
</script>

</html>