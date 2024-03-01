<?php
require_once "inc/functions.inc.php";
require("/home1/eudesa99/PHPMailer-master/src/PHPMailer.php");
require("/home1/eudesa99/PHPMailer-master/src/SMTP.php");
if (isset($_SESSION['logged_platform'])) {
    header("Location: /home.php");
}


if (issetPostFields(['email'])) {
    $email = E($_POST['email']);
    $qUser = Q("SELECT * FROM users WHERE email='$email'");
    $user = $qUser->fetch_assoc();
    if ($user) {
        $password = $user['password'];

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
        $mail->Subject = "Plataforma PSG Fase 2";
        $mail->Body = "
        Sua senha de acesso da plataforma PSG Fase 2 é:<br />
        <b style=\"padding:3px 10px;background-color:#ccc;border-radius:3px;\">$password</b><br /><br />
        <a href=\"https://fase2.planosecagordura.com.br/\">Clique aqui para voltar para a plataforma</a>

        ";
        $mail->AddAddress($email);
        $mail->AddAddress("mlanzellotti.rj@gmail.com");
        if ($mail->Send()) {
            $message = "Pronto! Aguarde alguns instantes e verifique sua caixa de entrada";
        }
    } else {
        $error = "Usuário não encontrado, verifique se digitou seu email corretamente";
    }
}
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
    <script src="https://unpkg.com/imask"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <!-- Compiled and minified JavaScript -->
    <style></style>
    <title>Plano Seca Gordura</title>
</head>


<body>

    <div class="full-height parallax-container main-container hide">
        <div style="background-color: rgba(0,0,0,.5);color:white;padding:1em;text-align:center;text-transform:uppercase;margin:1em;">
            <h3 style="font-size: 23pt;">Plano Seca Gordura Fase 2</h3>
            <p style="font-weight: bold;">
                Elimine drasticamente a gordura
            </p>
        </div>
        <br />
        <a href="#login" class="cta" style="padding:.5em;text-decoration:none;line-height:18pt;"><span style="text-decoration: underline;text-transform:uppercase;font-size:15pt;">Acessar plataforma</span><br /><span style="font-size:10pt;font-weight: bolder;text-align:center;margin:auto;text-decoration:none !important;">Clique aqui para entrar</span></a>

        <div class="parallax">
            <img src="/assets/img/carolina-guzzo.jpeg" alt="">
        </div>
    </div>
    <div class="container login full-height  " id="login">

        <form action="" method="POST">
            <input type="hidden" name="login">
            <h3 class="center">Recuperar senha</h3>
            <p>
                Informe o email usado no cadastro para receber a sua senha
            </p>
            <?php
            if (isset($error)) {
                echo "<blockquote class=\"red p1\">$error</blockquote>";
            }
            if (isset($message)) {
                echo "<blockquote class=\"green p1\">$message</blockquote>";
            }
            ?>
            <div class="row">
                <div class="col s12 input-field">
                    <i class="material-icons prefix">mail</i>
                    <input type="email" name="email" id="email" required>
                    <label for="email">Email</label>
                </div>
            </div>

            <div class="row">
                <button class="btn" type="submit">Enviar <i class="material-icons right">send</i></button>
            </div>
            <div class="row">
                <a href="/">Voltar para o login</a>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.parallax');
            var instances = M.Parallax.init(elems, {});
            const formats = {
                br: '+55(00)00000-0000',
                au: '+61(00) 0000 0000',
                pt: '+351 000 000 000',
                us: '+1 (000) 000-000'
            }

            let currentFormat = "br"
            var element = document.getElementById("phone");
            let mask;
            let maskOptions = {
                mask: formats[currentFormat]
            };
            if (element) {
                mask = IMask(element, maskOptions);

            }

        });
    </script>
</body>

</html>