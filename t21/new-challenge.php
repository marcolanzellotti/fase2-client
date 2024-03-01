<?php
require("../inc/functions.inc.php");
requiredModLogin();
$mod = getModById($_SESSION['logged_mod']);
if (isset($_POST['challenge-name']) && isset($_POST['challenge-description'])) {
    if (!createChallenge($_POST['challenge-name'], $_POST['challenge-description'])) {
        $error = "Erro ao criar desafio";
    } else {
        header("Location: /admin/challenge?id=" . $con->insert_id);
    }
}
?>
<html>

<head>
    <?php require("../inc/head.inc.php") ?>
    <title>Elimina+ - Novo desafio</title>
</head>

<body>
    <header>

        <?php require("inc/nav.inc.php") ?>
    </header>
    <main>
        <div class="container p1 white top-margin z-depth-3 login">
            <h4>Novo desafio</h4>
            <?php
            if ($error) echo "<blockquote>$error</blockquote>";
            ?>
            <form action="" method="POST">
                <div class="row">
                    <div class="col s12 input-field">
                        <input type="text" id="challenge-name" name="challenge-name" required>
                        <label for="challenge-name">Nome do desafio</label>
                    </div>
                    <div class="col s12 input-field">
                        <textarea id="challenge-description" name="challenge-description" required class="materialize-textarea" rows="5"></textarea>
                        <label for="challenge-description">Descrição do desafio</label>
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