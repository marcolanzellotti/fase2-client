<?php
require("./inc/functions.inc.php");
requiredNotUserLogin();
session_start();

if (isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['name'])) {
    if (userExists($_POST['phone'])) {
        $error = "Já existe um usuário com esse número de telefone";
    } else {
        if ($user = createUser($_POST['name'], $_POST['phone'], $_POST['password'])) {
            $_SESSION['logged_user'] = $user;
            die(header("Location: /"));
        } else {
            $error = "Erro ao criar usuário, contate o administrador do sistema";
        }
    }
}
?>
<html>

<head>
    <?php require("inc/head.inc.php") ?>
    <title>Elimina+ - Cadastro</title>
</head>

<body>
    <header>
        <nav>
            <div class="nav-wrapper blue">
                <a href="/" class="brand-logo">Elimina+</a>
            </div>
        </nav>
    </header>
    <main>
        <div class="container p1 top-margin white">
            <h4>Criar conta</h4>
            <?php
            if ($error) echo "<blockquote>$error</blockquote>";
            ?>
            <div class="row">
                <form class="col s12" id="register-form" method="POST">
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
                            <input type="text" name="name" id="name" required>
                            <label for="name">Nome</label>
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
                            <button type="submit" class="btn blue">Cadastrar <i class="material-icons right">send</i></button>
                        </div>
                    </div>
                    <div class="row">
                        Já possui uma conta?<a href="/login"> Entrar</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="/assets/js/main.js"></script>
    <?php require("inc/footer.inc.php") ?>
</body>

</html>