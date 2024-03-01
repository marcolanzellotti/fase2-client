<html>

<head>
    <?php require("inc/head.inc.php") ?>
    <title>Elimina+ - Cadastro</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper blue">
            <a href="/" class="brand-logo">Elimina+</a>
        </div>
    </nav>
    <div class="container p1 top-margin white">
        <h1>Cadastro</h1>

        <div class="row">
            <form class="col s12" id="register-form">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="whatsapp" required type="text" class="validate">
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
                        <input id="password" required type="password" class="validate">
                        <label for="password">Senha</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn blue">Cadastrar <i class="material-icons right">send</i></button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <script src="/assets/js/main.js"></script>
</body>

</html>