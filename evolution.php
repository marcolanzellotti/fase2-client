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
if (isset($_FILES['photos'])) {
    $photos = $_FILES['photos'];
    $month = date("m");
    $qCreateEvolution = Q("INSERT INTO evolution (user_id, month) VALUES ($user[id], '$month')");
    $evolutionId = $con->insert_id;
    for ($index = 0; $index < count($photos["name"]); $index++) {
        $ext = end(explode(".", $photos["name"][$index]));
        $name = $photos["name"][$index];
        $tmp_name = $photos["tmp_name"][$index];

        $newName = md5($tmp_name) . ".$ext";
        $path = "./assets/img/evolution/$user[id]";
        $dest = "$path/$newName";
        if (!is_dir($path))
            mkdir($path);
        if (!move_uploaded_file($tmp_name, $dest)) {
            // error
            echo "Erro ao fazer upload";
        } else {
            Q("INSERT INTO evolution_photos (user_id, evolution_id, file) VALUES ($user[id], $evolutionId, '$newName')");
        }
    }
} elseif (isset($_GET['delete'])) {
    $evolutionId = intval($_GET['delete']);
    $qDeleteEvolution = Q("DELETE FROM evolution WHERE id=$evolutionId AND user_id=$user[id]");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://unpkg.com/imask"></script>
    <!-- Compiled and minified JavaScript -->
    <style>
        @media only screen and (min-width:1000px) {
            header {
                background-position-y: -800px !important;

            }



        }
    </style>
    <title>Plano Seca Gordura</title>
</head>

<body>
    <header style="background-image:url(http://fase2.planosecagordura.com.br/assets/img/evolucao.png);background-size:cover;">


    </header>
    <a href="/home.php" class="back">Voltar</a>

    <div class="container center main-container">
        <div class="container white diary ev" style="width:100%;">
            <p style="font-weight: bold;">
                Acompanhar as mudanças corporais te ajuda na motivação e na autoestima.<br /><br />

                Coloque uma foto todo mês para que perceba seu corpo mudando e possa comemorar suas conquistas.
            </p>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Foto de frente</span>
                        <input type="file" accept="image/*" name="photos[]" required>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Selecione a foto">
                    </div>
                </div>
                <div class="file-field input-field">
                    <div class="btn">
                        <span> &nbsp;Foto de lado&nbsp;&nbsp;&nbsp; </span>
                        <input type="file" accept="image/*" name="photos[]" required>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Selecione a foto">
                    </div>
                </div>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Foto de costas</span>
                        <input type="file" accept="image/*" name="photos[]" required>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Selecione a foto">
                    </div>
                </div>
                <blockquote class="sent p1 red" id="sentMsg" style="display:none;">Registrado em seu diário</blockquote>
                <button type="submit" class="btn mt1">Enviar <i class="material-icons ">send</i></button>
            </form>
        </div>
        <br />
        <div class="container white diary ev" style="width:100%;">
            <h5>Sua evolução</h5>
            <?php
            $qEvolutions = Q("SELECT * FROM evolution WHERE user_id=$user[id]");
            $months = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
            while ($evolution = $qEvolutions->fetch_assoc()) {
                $qPhotos = Q("SELECT * FROM evolution_photos WHERE evolution_id=$evolution[id]");
                $month = $months[$evolution['month'] - 1];
            ?>
                <h3><?= $month ?></h3><span class="right"><a class="red-text" href="?delete=<?= $evolution['id'] ?>">Excluir fotos</a></span><br />
                <div class="participant-images">
                    <?php
                    while ($photo = $qPhotos->fetch_assoc()) {
                        echo "<img class=\"materialboxed\" src=\"assets/img/evolution/$user[id]/$photo[file]\" />";
                    }
                    ?>
                </div>
            <?php
            }
            ?>



        </div>

        <!-- <div class="d">
            <img src="https://planoalimentarpsg.com.br/assets/compressed-img/resultado140.webp" alt="">
            <p>
                aaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaa
            </p>
        </div>
        <div class="d">
            <img src="https://planoalimentarpsg.com.br/assets/compressed-img/resultado200.webp" alt="">
            <p>
                aaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaa
            </p>
        </div>
        <div class="d">
            <img src="https://planoalimentarpsg.com.br/assets/compressed-img/resultadokarina7dias.webp" alt="">
            <p>
                aaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaa
            </p>
        </div> -->
    </div>
</body>
<script>
    $(document).ready(function() {
        $('.materialboxed').materialbox();
    });
</script>

</html>