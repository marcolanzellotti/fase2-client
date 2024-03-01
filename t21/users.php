<?php
require("../inc/functions.inc.php");
requiredModLogin();
if (isset($_GET['delete'])) {
    $userId = intval($_GET['delete']);
    deleteUser($userId);
}
$users = getUsers();
$mod = getModById($_SESSION['logged_mod']);

if (isset($_GET['export'])) {
    ini_set("include_path", '/home1/eudesa99/php:' . ini_get("include_path"));
    require_once 'Spreadsheet/Excel/Writer.php';

    $workbook = new Spreadsheet_Excel_Writer();
    $workbook->setVersion(8);
    $workbook->send("Usuários.xls");
    $boldFormat = &$workbook->addFormat();
    $boldFormat->setBold();
    $worksheet = &$workbook->addWorksheet('Dados');
    $title_index = 0;
    $headers = [
        'Id',
        'Nome',
        'Whatsapp',
        'Fotos enviadas'
    ];
    foreach ($headers as $title) {
        $worksheet->setInputEncoding("utf-8");
        $worksheet->write(0, $title_index, $title, $boldFormat);
        $title_index++;
    }
    $row_index = 1;
    $qUsers = $con->query("SELECT id, name, phone FROM users");
    while ($row = $qUsers->fetch_assoc()) {
        $col_index = 0;
        foreach ($row as $field => $cell) {
            $worksheet->write($row_index, $col_index, str_replace("+55", "", $cell));
            $col_index++;
        }
        $worksheet->write($row_index, $col_index, isParticipant($row['id']) ? "Sim" : "Não");
        $row_index++;
    }

    $workbook->close();
} else if (isset($_POST['search'])) {
    $users = searchUsers($_POST['search']);
}
?>
<html>

<head>
    <?php require("../inc/head.inc.php") ?>
    <title>Elimina+ - Usuários</title>
</head>

<body>
    <header>

        <?php require("inc/nav.inc.php") ?>
    </header>
    <main>
        <div class="container p1 white top-margin z-depth-3">
            <h4>Usuários cadastrados</h4>
            <a href="?export">Exportar planilha</a>
            <form action="" method="POST">
                <div class="input-field row">
                    <input id="search" type="text" class="col m6 s12" name="search">
                    <label for="search">Buscar nome de usuário / telefone</label>
                </div>
            </form>
            <table class="stripped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Whatsapp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user) {
                    ?>

                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['phone'] ?></td>

                            <td><a href="user?id=<?= $user['id'] ?>"><i class="blue-text material-icons">edit</i></a></td>
                            <td><a href="?delete=<?= $user['id'] ?>"><i class="red-text material-icons">delete</i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </main>
    <script src="/assets/js/main.js"></script>
    <?php require("../inc/footer.inc.php") ?>
</body>

</html>