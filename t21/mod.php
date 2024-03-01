<?php
require("../inc/functions.inc.php");
requiredModLogin();
$id = intval($_GET['id']);

if (issetPostFields(['name', 'username', 'password'])) {
    if (strlen($_POST['password']) < 8) {
        $error = "A senha deve conter mais de 8 caracteres";
    } else if (!($updateMod = updateMod($id, [
        "name" => $_POST['name'],
        "username" => $_POST['username'],
        "password" => $_POST['password']
    ]))) {

        $error = "Erro ao salvar moderador";
    } else {
        header("Location: /admin/mod?id=$id");
    }
} else if (isset($_GET['delete'])) {
    $delete = intval($_GET['delete']);
    if (getModById($delete)['master'] == "1") {
        $error = "Não é possivel excluir o moderador master";
        $mod = getModById($delete);
    } else {
        deleteMod($delete);
        die(header("Location: /admin/#manage-mods"));
    }
} else {

    $mod = getModById($id);
    if (!$mod) die(header("Location: /admin"));
}

?>
<html>

<head>
    <?php require("../inc/head.inc.php") ?>
    <title>Elimina+ - Editar moderador</title>
</head>

<body>
    <header>

        <?php require("inc/nav.inc.php") ?>
    </header>
    <main>
        <div class="container p1 white top-margin login z-depth-3">
            <h4><?= $mod['name'] ?></h4>
            <?php
            if ($error) echo "<blockquote>$error</blockquote>";
            ?>
            <form action="" method="POST">
                <div class="row">
                    <div class="col s12 input-field">
                        <input type="text" id="name" name="name" value="<?= $mod['name'] ?>" required>
                        <label for="name">Nome</label>
                    </div>
                    <div class="col s12 input-field">
                        <input type="text" id="username" name="username" value="<?= $mod['username'] ?>" required>
                        <label for="username">Usuário</label>
                    </div>
                    <div class="col s12 input-field">
                        <input type="password" id="password" name="password" value="<?= $mod['password'] ?>" required>
                        <label for="password">Senha</label>
                        <span toggle="#password" class="field-icon toggle-password"><span class="material-icons">visibility</span></span>
                    </div>
                    <div class="col s12">
                        <button type="submit" class="btn blue">Salvar <i class="material-icons">send</i></button>
                        <a href="?delete=<?= $mod['id'] ?>" class="btn red">Excluir</a>
                    </div>
                </div>
            </form>

        </div>

    </main>
    <script src="/assets/js/main.js"></script>
    <script>

    </script>
    <?php require("../inc/footer.inc.php") ?>
</body>

</html>