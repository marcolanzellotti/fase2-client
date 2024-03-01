<?php
require_once("../../inc/conf.inc.php");
require_once("../../inc/functions.inc.php");

if (issetPostFields(['title', 'content', 'cat'])) {
    $title = E($_POST['title']);
    $content = E($_POST['content']);


    $cat = E(implode(",", $_POST['cat']));
    $file = $_FILES['cover'];
    $name = md5($file['tmp_name']);
    $cover = $name; // TODO: ADD COVER UPLOAD FIELD

    if (move_uploaded_file($file['tmp_name'], "../assets/img/covers/$name.jpg")) {
        $date = date("d/m/Y");
        $qAddRecipe = $con->query("INSERT INTO recipes (title, content, cover, cat, create_date) VALUES ('$title', '$content', '$cover', '$cat', '$date')");
        if ($qAddRecipe) {
        }
    }
    header("Location: recipes.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://www.jqueryscript.net/demo/Rich-Text-Editor-jQuery-RichText/jquery.richtext.js"></script>
    <link rel="stylesheet" href="https://www.jqueryscript.net/demo/Rich-Text-Editor-jQuery-RichText/richtext.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/imask"></script>
    <!-- Compiled and minified JavaScript -->
    <title>Nova receita</title>
</head>

<body>
    <div class="container">
        <h4>Adicionar receita</h4>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s12">
                    <span class="material-icons prefix">text_fields</span>
                    <input id="title" name="title" type="text" class="validate">
                    <label for="title">Título</label>
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field col s12">
                    <div class="btn">
                        <span>Selecione a capa</span>
                        <input type="file" name="cover" required>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="content" id="content" cols="30" rows="10" placeholder="Conteúdo"></textarea>
                </div>
            </div>
            <div class="row">
                Categorias
                <div>
                    <?php
                    $cats = ['Café da manhã com', 'Café da manhã sem', 'Lanche com', 'Lanche sem', 'Almoço e jantar', 'Ceia', 'Sobremesas', 'Molho', 'Caldos e sopas', 'Bebidas funcionais', 'FOOD FIT', 'Saladas'];

                    foreach ($cats as $cat) {


                    ?>
                        <p>
                            <label>
                                <input name="cat[]" type="checkbox" value="<?= $cat ?>" <?= $selected ?> />
                                <span><?= $cat ?></span>
                            </label>
                        </p>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <button type="submit" class="btn">Salvar <i class="material-icons">send</i></button>
                </div>
            </div>
        </form>
    </div>

</body>
<script>
    $('#content').richText();
    $('select').formSelect()
</script>

</html>