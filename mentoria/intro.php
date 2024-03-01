<?php
require_once("inc/conf.inc.php");
require_once("inc/functions.inc.php");

if (!isset($_GET['video'])) {
    // die();
}
$id = intval($_GET['video']);

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
                Mentoria PSG
            </h3>
            <iframe class="mb1 home-video" src="https://www.youtube.com/embed/QMR0dOCBHnk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


            <a href="https://formularios.planosecagordura.com.br/habitos.php" id="habitsButton">Clique aqui para assistir ao próximo video</a>


        <?php
        }
        ?>
    </div>
</body>
<script>
    document.getElementById("nextVideoForm").addEventListener("submit", e => {
        e.preventDefault()
        pass = new FormData(e.target).get("password")
        if (pass != "<?= $nextVideoPassword ?>") {
            alert("Senha inválida")
        } else {
            document.location.href = "?video=<?= $nextVideoId ?>"
        }
    })
</script>

</html>