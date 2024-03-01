<?php
require("../inc/functions.inc.php");
requiredModLogin();

$mod = getModById($_SESSION['logged_mod']);
$id = intval($_GET['id']);
$user = getUserById($id);
if (!$user) die(header("Location: /admin"));
if (issetPostFields(['name', 'phone', 'password'])) {
    if (strlen($_POST['password']) < 8) {
        $error = "A senha deve conter mais de 8 caracteres";
    } else if (!($updateUser = updateUser($id, [
        "name" => $_POST['name'],
        "phone" => $_POST['phone'],
        "password" => $_POST['password']
    ]))) {

        $error = "Erro ao salvar usuário";
    } else {
        header("Location: /admin/user?id=$id");
    }
}

?>
<html>

<head>
    <?php require("../inc/head.inc.php") ?>
    <title>Elimina+ - Novo usuários</title>
</head>

<body>
    <header>

        <?php require("inc/nav.inc.php") ?>
    </header>
    <main>
        <div class="container p1 white top-margin z-depth-3 login">
            <h4><?= $user['name'] ?></h4>
            <?php
            if ($error) echo "<blockquote>$error</blockquote>";
            ?>
            <form action="" method="POST" id="user-form">
                <div class="row">
                    <div class="col s12 input-field">
                        <input type="text" id="name" name="name" value="<?= $user['name'] ?>" required>
                        <label for="name">Nome</label>
                    </div>
                    <div class="col s12 input-field">
                        <input type="text" id="whatsapp" name="phone" value="<?= $user['phone'] ?>" required>
                        <label for="whatsapp">Whatsapp</label>
                    </div>
                    <div class="col s12 input-field">
                        <input type="password" id="password" name="password" value="<?= $user['password'] ?>" required>
                        <label for="password">Senha</label>
                        <span toggle="#password" class="field-icon toggle-password"><span class="material-icons">visibility</span></span>
                    </div>
                    <div class="col s12">
                        <button type="submit" class="btn blue">Salvar <i class="material-icons">send</i></button>
                    </div>
                </div>
            </form>

        </div>

    </main>
    <script src="/assets/js/main.js"></script>
    <?php require("../inc/footer.inc.php") ?>
</body>

</html>