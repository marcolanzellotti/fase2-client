<?php
require_once "inc/functions.inc.php";

if (isset($_SESSION['logged_platform'])) {
    header("Location: /home.php");
}


if (issetPostFields(['email', 'password', 'phone', 'name', 'gender'])) {
    $email = E($_POST['email']);
    $password = E($_POST['password']);
    $phone = E($_POST['phone']);
    $origPhone = $phone;
    $phone = str_replace(['-', '(', ')', ' ', '+'], "", $phone);
    $name = E($_POST['name']);
    $time = time();

    $lastNumbers = substr($phone, -7);

    $gender = $_POST['gender'][0] == 'female' ? 0 : 1;

    $qVerify = Q("SELECT * FROM users WHERE email='$email' OR phone LIKE '%$phone%'");

    if ($qVerify->num_rows && 0) {
        $error = "Erro, já existe um cadastro com esse email ou telefone";
    } else {

        $qRegister = Q("INSERT INTO users (name, email, phone, password, gender, create_time, last_watched_video, verified) VALUES ('$name', '$email', '$phone', '$password', '$gender', '$time',1, 0)");
        $qERegister = $eCon->query("INSERT INTO users (name, phone, password) VALUES ('$name', '$phone', '$origPhone')");
        if ($qRegister) {
            $message = "Cadastro realizado com sucesso, aguarde a verificação pelo nosso sistema";
        } else {
            $error = "Erro, entre em contato com um administrador";
        }
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
    <script>

    </script>
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
            <h3 class="center">Cadastrar</h3>
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
                <div class="col s12 input-field">
                    <i class="material-icons prefix">person</i>
                    <input type="text" name="name" id="name" required>
                    <label for="name">Nome</label>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col s12 input-field">
                    <i class="material-icons prefix">phone</i>
                    <input type="text" name="phone" id="phone" required>
                    <label for="phone">Whatsapp</label>

                    
                </div>
            </div> -->

            <div class="row">
                <div class="input-field col s5 m2">
                    <select class="icons" onchange="handleSetFormat(this)">
                        <option data-format="br" data-icon="https://icons.iconarchive.com/icons/wikipedia/flags/512/BR-Brazil-Flag-icon.png">BR</option>
                        <option data-format="pt" data-icon="https://icons.iconarchive.com/icons/wikipedia/flags/1024/PT-Portugal-Flag-icon.png">PT</option>
                        <option data-format="au" data-icon="https://icons.iconarchive.com/icons/wikipedia/flags/1024/AU-Australia-Flag-icon.png">AU</option>
                        <option data-format="us" data-icon="https://icons.iconarchive.com/icons/wikipedia/flags/256/US-United-States-Flag-icon.png">USA</option>
                    </select>

                </div>
                <div class="input-field col s7 m10">

                    <input id="phone" required type="text" name="phone" class="validate">
                    <label for="phone">Whatsapp</label>
                </div>
            </div>

            <div class="row">
                <div class="col s12 input-field">
                    <i class="material-icons prefix">key</i>
                    <input name="password" id="password" type="password" required>
                    <label for="password">Senha</label>
                </div>
            </div>
            <div class="row">
                Sexo
                <p>
                    <label>
                        <input type="radio" name="gender[]" id="" value="male">
                        <span style="color:white;">Masculino</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input type="radio" name="gender[]" id="" value="female" checked>
                        <span style="color:white;">Feminino</span>
                    </label>
                </p>
            </div>
            <div class="row">
                <button class="btn" type="submit">Cadastrar <i class="material-icons right">send</i></button>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {


            $('select').formSelect();


        });
    </script>
</body>

</html>