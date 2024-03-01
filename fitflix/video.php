<?php
require_once "inc/functions.inc.php";
if (!isset($_SESSION['logged_platform'])) {
    header("Location: /");
}
$id = intval($_SESSION['user']);

$qUser = Q("SELECT * FROM users WHERE id='$id'");
$user = $qUser->fetch_assoc();

$daysPassed = intval((time() - $user['create_time']) / 86400);

if (!$video = intval($_GET['id'])) {
    header("Location: /fitflix");
}

$qVideo = Q("SELECT * FROM fitflix_videos WHERE id=$video");
$video = $qVideo->fetch_assoc();

$date = date("d/m/Y - H:i:s");
if (isset($_POST['comment'])) {
    $content = E($_POST['comment']);
    $qAddComment = Q("INSERT INTO fitflix_comments (user_id, video_id, create_date, content) VALUES ($user[id], $video[id], '$date', '$content')");
}

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
    <a href="/fitflix" class="back">Voltar</a>

    <div class="container center main-container">
        <!-- <form action="" method="GET">
            <div class="row search-row">
                <div class="input-field  col s12">
                    <i class="material-icons prefix">search</i>
                    <input type="text" name="query" id="query" class="validate">
                    <label for="query">Buscar</label>
                </div>
                <div class="col s12 cat-row">
                    <?php
                    $qCats = Q("SELECT * FROM cats");
                    while ($cat = $qCats->fetch_assoc()) {
                        echo "<a href=\"?cat=$cat[id]\">$cat[name]</a>";
                    }
                    ?>


                </div>
            </div>
        </form> -->
        <div class="container video-container">

            <iframe class="mb1 home-video" src="<?= $video['url'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        </div>
        <h5>Comentários</h5>
        <div class="container comments">
            <?php
            $qComments = Q("SELECT * FROM fitflix_comments WHERE video_id=$video[id]");
            while ($comment = $qComments->fetch_assoc()) {
                $qAuthor = Q("SELECT * FROM users WHERE id=$comment[user_id]");
                $author = $qAuthor->fetch_assoc();
            ?>
                <div class="comment">
                    <div class="top">
                        <span class="author"><?= $author['name'] ?></span>
                        <span class="create_date"><?= $comment['create_date'] ?> </span>
                    </div>

                    <p class="content">
                        <?= $comment['content'] ?>
                    </p>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="new-comment-container">
            <form action="" method="POST">
                <div class="input-field  col s12">
                    <textarea name="comment" id="" cols="30" rows="10" class="new-comment" placeholder="Escreva aqui o que você aprendeu ou o que mais chamou atenção"></textarea>
                </div>
                <div class="col s6">
                    <button type="submit" class="btn">Comentar <i class="material-icons">comment</i></button>
                </div>
            </form>
        </div>

    </div>
</body>

</html>