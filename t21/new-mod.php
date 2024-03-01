<?php
require("../inc/functions.inc.php");
requiredModLogin();
if (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password'])) {

    if (strlen($_POST['password']) < 8) {
        $error = "A senha deve conter mais de 8 caracteres";
    } else if (!createMod($_POST['name'], $_POST['username'], $_POST['password'])) {

        $error = "Erro ao criar moderador";
    } else {
        header("Location: /admin/mod?id=" . $con->insert_id);
    }
}
?>
<html>

<head>
    <?php require("../inc/head.inc.php") ?>
    <title>Elimina+ - Novo moderador</title>
</head>

<body>
    <header>

        <?php require("inc/nav.inc.php") ?>
    </header>
    <main>
        <div class="container p1 white top-margin z-depth-3 login">
            <h4>Novo moderador</h4>
            <?php
            if ($error) echo "<blockquote>$error</blockquote>";
            ?>
            <form action="" method="POST">
                <div class="row">
                    <div class="col s12 input-field">
                        <input type="text" id="name" name="name" required>
                        <label for="name">Nome</label>
                    </div>
                    <div class="col s12 input-field">
                        <input type="text" id="username" name="username" required>
                        <label for="username">Usuário</label>
                    </div>
                    <div class="col s12 input-field">
                        <input type="password" id="password" name="password" required>
                        <label for="password">Senha</label>
                        <span toggle="#password" class="field-icon toggle-password"><span class="material-icons">visibility</span></span>

                    </div>
                    <div class="col s12">
                        <button type="submit" class="btn blue">Criar <i class="material-icons">send</i></button>
                    </div>
                </div>
            </form>
        </div>

    </main>
    <script src="/assets/js/main.js"></script>
    <?php require("../inc/footer.inc.php") ?>
</body>

</html>