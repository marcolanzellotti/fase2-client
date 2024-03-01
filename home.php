<?php
require_once "inc/functions.inc.php";
// require("/home1/eudesa99/PHPMailer-master/src/PHPMailer.php");
// require("/home1/eudesa99/PHPMailer-master/src/SMTP.php");

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION);
}

if (!isset($_SESSION['logged_platform'])) {
    header("Location: /");
}


$id = intval($_SESSION['user']);

$qUser = Q("SELECT * FROM users WHERE id='$id'");
$user = $qUser->fetch_assoc();

$daysPassed = intval((time() - $user['create_time']) / 86400);


////////////////////////////////////////////
$tmpCon = new mysqli("localhost", "root", "Luc@s180", "eudesa99_forms");

$tmpPhone = substr(str_replace('-', '', $user['phone']), -8);

$qHabits = $tmpCon->query("SELECT * FROM habits WHERE mail='$user[email]' OR RIGHT(REPLACE(REPLACE(REPLACE(REPLACE(phone, '+55', ''), '(', ''), ')', ''), '-', ''), 8) LIKE '$tmpPhone'");
$tmpUser = $qHabits->fetch_assoc();
$tmpPhone = substr(str_replace('-', '', $tmpUser['phone']), -8);

$qEUser = $eCon->query("SELECT * FROM users WHERE RIGHT(REPLACE(REPLACE(REPLACE(REPLACE(phone, '+55', ''), '(', ''), ')', ''), '-', ''), 8) LIKE '$tmpPhone'");
$eUser = $qEUser->fetch_assoc();

$qOldMember = Q("SELECT id FROM users WHERE email='$user[email]' AND create_time<1685735794");
$oldMember = $qOldMember->num_rows;

if (!$qHabits->num_rows && !$oldMember) {
    die(header("Location: /mentoria/video.php"));
}
///////////////////////////////

if (isset($_GET['sendDiary'])) {
    //3    var_dump($_POST);
    $content = E($_POST['text']);
    $question = intval($_POST['question']);
    $date = date("d/m/Y");
    $query = "INSERT INTO diary (user_id, create_date, content, question) VALUES ($user[id], '$date', '$content', $question)";

    $qAddDiary =    Q($query);
    echo $query;
    $completion = $question == 0 ? "alimentar" : "emocional";
    $color =    $question == 0 ? "limegreen" : "red";
    $content = str_replace("\r\n", "<br />", $content);
    if ($qAddDiary) {
        // Fetch mail //////////////////////////////////////////////////////////////////
        $qMentor = $tmpCon->query("SELECT * FROM mentors WHERE username IN (SELECT mentor FROM habits WHERE mail='$user[email]')");
        $mentor = $qMentor->fetch_assoc();
        if ($mentor) {
            $email = $mentor['email'];
        } else {
            $qCoAuthor = $tmpCon->query("SELECT * FROM mentors WHERE id IN (SELECT co_author FROM habits WHERE mail='$user[email]')");
            $coAuthor = $qCoAuthor->fetch_assoc();
            $email = $coAuthor['email'];
        }
        ///////////////////////////////////////////////////////////////////

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP(); // enable SMTP
        //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "br174.hostgator.com.br";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "contato@planosecagordura.com.br";
        $mail->Password = "Lanz@822153";
        $mail->SetFrom("contato@planosecagordura.com.br");
        $mail->Subject = "Novo preenchimento do diario";
        $mail->Body = "
            Diário preenchido por $user[name] (Questão <span style=\"padding:3px;background:$color;border-radius:3px;color:white;\">$completion</span>)<br/>  <a target=\"_blank\" href=\"https://api.whatsapp.com/send?phone=$user[phone]\" style=\"text-decoration:none;font-weight:bold;padding:3px 10px;background-color:limegreen;color:white;border-radius:3px;\">Whatsapp</a>
            <h3>Conteúdo:</h3>
            <p>
            $content
            </p>
            ";
        $mail->AddAddress($email);
        $mail->AddAddress("mlanzellotti.rj@gmail.com");
        if ($mail->Send()) {
            // Mail success
        } else {
            // Mail error
            die($mail->ErrorInfo);
        }

        die("ok");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vina+Sans&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        const toast = (m) => {
            M.toast({
                html: m
            })
        }
    </script>
    <title>Plano Seca Gordura</title>
</head>

<body>
    <header>

        <img class="header" src="/assets/img/header.jpg" alt="">
        <a href="?logout" class="logout bold">Sair <i class="material-icons" style="vertical-align:middle;">logout</i></a>
    </header>


    <div class="container center main-container">
        <!-- <iframe class="mb1 home-video" src="https://www.youtube.com/embed/fyjgahQO5io" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

        <!--  = LIBERAR APÓS 7 DIAS -->
        <h5 class="white black-text" style="padding:.3em;">Bem-vind<?= $user['gender'] == "0" ? "a" : "o" ?>, <?= explode(" ", $user['name'])[0] ?></h5>
        <div class="container diary">
            <h5 style="font-family: 'Vina Sans', cursive;font-size:20pt;">Como foi o seu dia?</h5>
            <p>
                <!-- Fale um pouco da sua rotina, dificuldade e evolução -->
                Descreva suas dificuldades com a rotina alimentar ou emocionais para receber ajuda diária
            </p>



            <form action="" method="POST" id="sendDiaryForm">

                <textarea name="text" id="text" required placeholder="Escreva aqui"></textarea>
                <blockquote class="sent p1 red" id="sentMsg" style="display:none;">Registrado em seu diário</blockquote>
                <br />
                <p>
                    Qual o tipo de dificuldade?
                </p>
                <p id="question">
                    <label>
                        <input name="question" value="0" type="radio" checked />
                        <span>Alimentar </span>
                    </label>

                    <label>
                        <input name="question" value="1" type="radio" />
                        <span>Emocional </span>
                    </label>
                </p>

                <button type="submit" class="btn mt1" id="sendMsgBtn">Enviar <i class=" material-icons ">send</i></button>
            </form>
        </div>
        <hr style=" margin:1em;">
        <div class="section home-section">

            <a href="/eventos.php" class="block-link">
                <div class="block">
                    <img src="assets/img/calendario capa.png" alt="">
                    <h4 class="title">
                        CLIQUE AQUI PARA ENTRAR
                    </h4>
                </div>
            </a>

            <a href="evolution.php" class="block-link">
                <div class="block">
                    <img src="assets/img/evolucao.png" alt="">
                    <h4 class="title">
                        CLIQUE AQUI PARA ENTRAR
                    </h4>
                </div>
            </a>
            <a href="/treinos.php" class="block-link">
                <div class="block">
                    <img src="assets/img/treinos.png" alt="">
                    <h4 class="title">
                        CLIQUE AQUI PARA ENTRAR
                    </h4>
                </div>
            </a>


            <?php
            if ($daysPassed >= 7 || 1) {
            ?>
                <a href=<?= ($daysPassed < 7)  ? "\"javascript:toast('Liberação após 7 dias de cadastro')\"" : "https://fase2.planosecagordura.com.br/receitas/index.2.php" ?> class="block-link">
                    <div class="block">
                        <img src="assets/img/receitascalculadas.png" alt="">
                        <h4 class="title">
                            CLIQUE AQUI PARA ENTRAR
                        </h4>
                    </div>
                </a>
                <a href=<?= ($daysPassed < 7)  ? "\"javascript:toast('Liberação após 7 dias de cadastro')\"" : "/lives.php" ?> class="block-link">
                    <div class="block">
                        <img src="assets/img/gravacoeslives.png" alt="">
                        <h4 class="title">
                            CLIQUE AQUI PARA ENTRAR
                        </h4>
                    </div>
                </a>
                <a href=<?= ($daysPassed < 7)  ? "\"javascript:toast('Liberação após 7 dias de cadastro')\"" : "/fitflix" ?> class="block-link">
                    <div class="block">
                        <img src="assets/img/fitflixoficial.png" alt="">
                        <h4 class="title">
                            CLIQUE AQUI PARA ENTRAR
                        </h4>
                    </div>
                </a>


                <a href=<?= ($daysPassed < 7)  ? "\"javascript:toast('Liberação após 7 dias de cadastro')\"" : "maratona.php" ?> class="block-link">
                    <div class="block">
                        <img src="assets/img/maratona15.png" alt="">
                        <h4 class="title">
                            CLIQUE AQUI PARA ENTRAR
                        </h4>
                    </div>
                </a>

                <a href="t21.php" class="block-link">
                <div class="block">
                        <img src="assets/img/elimina15.png" alt="">
                        <h4 class="title">
                            CLIQUE AQUI PARA ENTRAR
                        </h4>
                    </div>
                </a>

                <a href=<?= ($daysPassed < 7)  ? "\"javascript:toast('Liberação após 7 dias de cadastro')\"" : "acelerando.php" ?> class="block-link">
                    <div class="block">
                        <img src="assets/img/acelerando.png" alt="">
                        <h4 class="title">
                            CLIQUE AQUI PARA ENTRAR
                        </h4>
                    </div>
                </a>



                <a href="https://www.fase2.planosecagordura.com.br/pv-renovacao.php" class="block-link">
                    <div class="block">
                        <img src="assets/img/renovacao15.png" alt="">
                        <h4 class="title">
                            CLIQUE AQUI PARA ENTRAR
                        </h4>
                    </div>
                </a>
            <?php
            }

            ?>

        </div>
    </div>
</body>
<script>
    document.getElementById("sendDiaryForm").addEventListener("submit", e => {
        e.preventDefault()
        formData = new FormData(e.target)
        axios.post("/home.php?sendDiary", formData).then(res => {
            if (1) {
                e.target.reset()
                document.getElementById("sentMsg").style.display = "block";

                document.getElementById("text").style.display = "none";
                document.getElementById("sendMsgBtn").style.display = "none";
                document.getElementById("question").style.display = "none";

            }
        })
    })
</script>

</html>