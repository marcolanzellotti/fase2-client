<?php
require_once "inc/functions.inc.php";
if (!isset($_SESSION['logged_platform'])) {
    header("Location: /");
}
$id = intval($_SESSION['user']);

$qUser = Q("SELECT * FROM users WHERE id='$id'");
$user = $qUser->fetch_assoc();

$daysPassed = intval((time() - $user['create_time']) / 86400);

// $registered = Q("SELECT * FROM subscriptions WHERE mail='$user[email]'")->num_rows;

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <!-- Compiled and minified JavaScript -->

    <title>Fit Flix - Plano Seca Gordura</title>
</head>

<body>
    <header style="background-image:url(http://fase2.planosecagordura.com.br/assets/img/fitflixoficial.png);background-size:cover;" onclick="document.location.href='/fitflix'">

        <h3>
            <!-- Treinos Fase 1
            <br />
            Do PSG -->
        </h3>
    </header>
    <a href="/home.php" class="back">Voltar</a>

    <div class="container center main-container">
        <form action="" method="GET">
            <div class="row search-row">
                <div class="input-field  col s12">
                    <i class="material-icons prefix">search</i>
                    <input type="text" name="query" id="query" class="validate">
                    <label for="query">Buscar</label>
                </div>
                CATEGORIAS
                <div class="col s12 cat-row">
                    <?php
                    $qCats = Q("SELECT * FROM cats");
                    while ($cat = $qCats->fetch_assoc()) {
                        echo "<a href=\"?cat=$cat[id]\">$cat[name]</a>";
                    }
                    ?>


                </div>
            </div>
        </form>
        <div class="videos">
            <?php
            $searchCompletion = "";
            $completion = "";
            if (isset($_GET['cat'])) {
                $cat = intval($_GET['cat']);
                $completion = "AND v.cat='$cat'";
            }

            if (isset($_GET['query'])) {
                $q = E($_GET['query']);
                $completion = "AND v.title LIKE '%$q%'";
            }

            $query = "SELECT v.id, c.name FROM fitflix_videos v  LEFT JOIN cats c ON v.cat=c.id WHERE 1 $completion $searchCompletion LIMIT 15";

            $qVideos = Q($query);

            while ($video = $qVideos->fetch_assoc()) {

            ?>
                <a class="video" href="video.php?id=<?= $video['id'] ?>">
                    <span class="cat"><?= $video['name'] ?></span>
                    <div class="cover" style="background-image: url(assets/img/covers/<?= $video['id'] ?>.png);background-size:cover;"></div>
                    <h3 class="title">Clique aqui para assistir</h3>

                </a>

            <?php
            }
            ?>
        </div>

    </div>
</body>

</html>