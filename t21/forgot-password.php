<?php
require("./inc/functions.inc.php");
requiredNotUserLogin();
session_start();

if (isset($_POST['phone']) && isset($_POST['password'])) {
    if ($user = authUser($_POST['phone'], $_POST['password'])) {
        $_SESSION['logged_user'] = $user['id'];
        die(header("Location: /"));
    } else {
        $error = "Usuário ou senha inválidos";
    }
}

?>

<html>

<head>
    <?php require("inc/head.inc.php") ?>
    <title>Elimina+ - Recuperar senha</title>
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
            <h4>Recuperar senha</h4>
            <?php
            if ($error) echo "<blockquote>$error</blockquote>";
            ?>
            <div class="row">
                <form class="col s12" id="login-form" method="POST">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="whatsapp" required type="text" name="phone" class="validate">
                            <label for="whatsapp">Seu Whatsapp</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" required type="text" name="name" class="validate">
                            <label for="name">Seu Nome</label>
                        </div>
                    </div>

                    <div class="row">
                        <a id="recoverPassword" style="cursor:pointer;">Recuperar senha</a>
                    </div>

                </form>
            </div>
        </div>
    </main>
    <script src="/assets/js/main.js"></script>
    <script>
        const handleRecoverPassword = () => {
            const phone = $("#whatsapp").val();
            const name = $("#name").val();
            const message = `Olá, meu nome é ${name}, minha conta do Elimina Mais está registrada com o telefone ${phone} e desejo recuperar minha senha`;
            if (!phone || !name) return M.toast({
                html: "Por favor, insira seu nome e seu whatsapp"
            })
            //+55 21 97739-4689
            const url = `https://wa.me/5521990023098?text=${message}`
            document.location.href = url;
        }

        $("#recoverPassword").click(handleRecoverPassword)
    </script>
    <?php require("inc/footer.inc.php") ?>
</body>

</html>