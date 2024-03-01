<?php
$redirects = [
    '',
    'https://planosecagordurapromo.carrinho.app/st?a=11829&utm_source=Ricardo&r=bfeb3f85',
    'https://planosecagordurapromo.carrinho.app/st?a=11829&utm_source=THALYTA&r=bfeb3f85',
    'https://planosecagordurapromo.carrinho.app/st?a=11829&utm_source=FERNANDA+&r=bfeb3f85',
    'https://planosecagordurapromo.carrinho.app/st?a=11829&utm_source=NATHALIA&r=bfeb3f85',
    'https://planosecagordurapromo.carrinho.app/st?a=11829&utm_source=KARLA&r=bfeb3f85'
];
if (isset($_GET['promo'])) {
    $promo = $_GET['promo'];

    echo ("<script>document.location.href='$redirects[$promo]'</script>");
}
require_once "inc/functions.inc.php";

if (isset($_SESSION['logged_platform'])) {
    header("Location: /home.php");
}


if (issetPostFields(['email', 'password'])) {
    $email = E($_POST['email']);
    $password = E($_POST['password']);
    $qAuth = Q("SELECT * FROM users WHERE email='$email' AND password='$password' AND is_active = 1");
    if ($qAuth->num_rows) {
        $user = $qAuth->fetch_assoc();
        if (!$user['verified']) {
            $error = "Verificação do seu acesso pendente. Por favor, tente novamente mais tarde";
        } else {

            // $tmpCon = new mysqli("localhost", "eudesa99_yuri", "t0m{@Z]wKjI%", "eudesa99_forms");
            // $qHabits = $tmpCon->query("SELECT * FROM habits WHERE mail='$user[email]'");
            // $tmpUser = $qHabits->fetch_assoc();

            $tmpPhone = substr(str_replace('-', '', $user['phone']), -8);
            $qEUser = $eCon->query("SELECT * FROM users WHERE RIGHT(REPLACE(REPLACE(REPLACE(REPLACE(phone, '+55', ''), '(', ''), ')', ''), '-', ''), 8) LIKE '$tmpPhone'");
            $eUser = $qEUser->fetch_assoc();
            if (!$eUser) {
                $qERegister = $eCon->query("INSERT INTO users (name, phone, password) VALUES ('$user[name]', '$user[phone]', '$user[phone]')");
                //                var_dump($eCon);
            }
            $qEUser = $eCon->query("SELECT * FROM users WHERE RIGHT(REPLACE(REPLACE(REPLACE(REPLACE(phone, '+55', ''), '(', ''), ')', ''), '-', ''), 8) LIKE '$tmpPhone'");
            $eUser = $qEUser->fetch_assoc();
            //          die(var_dump($eUser));
            $_SESSION['logged_platform'] = 1;
            $_SESSION['user'] = $user['id'];
            $_SESSION['logged_e_user'] =  $eUser['id'];

            header("Location: /home.php");
            // }
        }
    } else {
        $error = "Acesso a plataforma não permitido.";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <!-- Compiled and minified JavaScript -->
    <style>
        span.field-icon {
            float: right;
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
            z-index: 2;
        }
    </style>
    <title>Plano Seca Gordura</title>
</head>


<body>
    <div class="full-height parallax-container main-container">
        <div style="background-color: rgba(0,0,0,.5);color:white;padding:1em;text-align:center;text-transform:uppercase;margin:1em;">
            <h3 style="font-size: 23pt;">Plano Seca Gordura Turbo</h3>
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
            <h3 class="center">Login</h3>
            <?php
            if (isset($error)) {
                echo "<blockquote>$error</blockquote>";
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
                <div class="col s12 input-field">
                    <i class="material-icons prefix">key</i>
                    <input name="password" id="password" type="password" required>
                    <span toggle="#password" class="field-icon toggle-password">
                        <span class="material-icons">visibility</span></span>
                    <label for="password">Senha</label>
                </div>
            </div>
            <div class="row">
                <button class="btn" type="submit">Entrar <i class="material-icons right">send</i></button>
            </div>
            <!-- <div class="row">
                Ainda não tem uma conta?<a href="register.php"><br />CLIQUE AQUI PARA SE CADASTRAR</a>
            </div> -->
            <div class="row">
                <a href="recuperar-senha.php">Esqueceu sua senha? Recuperar</a>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.parallax');
            var instances = M.Parallax.init(elems, {});
        });

        let clicked = 0
        $(".toggle-password").click(function(e) {

            e.preventDefault();
            console.log("clicked")
            $(this).toggleClass("toggle-password");
            if (clicked == 0) {
                $(this).html('<span class="material-icons">visibility_off</span >');
                console.log("off")
                clicked = 1;
            } else {
                console.log("on")
                $(this).html('<span class="material-icons">visibility</span >');
                clicked = 0;
            }

            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
            console.log(clicked)
        });
    </script>
</body>

</html>