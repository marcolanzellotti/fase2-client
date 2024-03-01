<?php
require("./inc/functions.inc.php");
requiredNotUserLogin();
session_start();

if (isset($_POST['phone']) && isset($_POST['password'])) {
    if ($user = authUser($_POST['phone'], $_POST['password'])) {
        $_SESSION['logged_e_user'] = $user['id'];
        die(header("Location: /eliminamais"));
    } else {
        $error = "Usuário ou senha inválidos";
    }
}

?>

<html>

<head>
    <?php require("inc/head.inc.php") ?>
    <title>Elimina+ - Login</title>
    <style>
        header {
            background-image: url("http://fase2.planosecagordura.com.br/assets/img/banner-desafio.jpg");
            height: 10em;
            background-size: cover;
        }
    </style>
</head>

<body>
    <header>

    </header>
    <main>
        <div class="container p1 top-margin white">
            <h4>Login</h4>
            <?php
            if ($error) echo "<blockquote>$error</blockquote>";
            ?>
            <div class="row">
                <form class="col s12" id="login-form" method="POST">
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

                            <input id="whatsapp" required type="text" name="phone" class="validate">
                            <label for="whatsapp">Whatsapp</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" required type="password" name="password" class="validate">
                            <label for="password">Senha</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="btn blue">Login <i class="material-icons right">send</i></button>
                        </div>
                    </div>
                    <div class="row">
                        <a href="/forgot-password">Esqueceu sua senha?</a>
                    </div>
                    <div class="row">
                        Ainda não possui uma conta?<a href="/eliminamais/register"> Criar conta</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="/eliminamais/assets/js/main.js"></script>

    <?php require("inc/footer.inc.php") ?>
</body>

</html>