<?php
require_once("../../inc/conf.inc.php");
require_once("../../inc/functions.inc.php");

$cats = ['Café da manhã com', 'Café da manhã sem', 'Lanche com', 'Lanche sem', 'Almoço e jantar', 'Ceia', 'Sobremesas', 'Molho', 'Caldos e sopas', 'Bebidas funcionais', 'FOOD FIT', 'Saladas'];


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
    <script src="https://unpkg.com/imask"></script>
    <!-- Compiled and minified JavaScript -->

    <title>Receitas Calculadas - Plano Seca Gordura</title>
</head>

<body>


    <div class="container center main-container">
        <form action="" method="GET">
            <div class="row search-row">
                <div class="input-field  col s12">
                    <i class="material-icons prefix">search</i>
                    <input type="text" name="query" id="query" class="validate">
                    <label for="query">Buscar receita...</label>
                </div>


            </div>
        </form>
        <div class="col s12 input-field">
            Selecione a categoria
            <select name="cat" id="selectCat" required="false">
                <?php

                foreach ($cats as $cat) {
                    $selected = "";
                    if ($_GET['cat'] == $cat) $selected = "selected";
                ?>
                    <option value="<?= $cat ?>" <?= $selected ?>><?= $cat ?></option>
                <?php
                }
                ?>
            </select>

        </div>
        <h4><a href="new-recipe.php">Nova receita <i class="material-icons" style="vertical-align:middle;">add</i></a></h4>
        <div class="recipes">
            <?php
            $searchCompletion = "";

            if (isset($_GET['cat'])) {
                $cat = E($_GET['cat']);
                $completion = "AND (r.cat LIKE '%$cat%')";
            }

            if (isset($_GET['query'])) {

                $q = E($_GET['query']);

                $searchCompletion = "WHERE (r.title LIKE '%$q%' OR r.content LIKE '%$q%')";
            }

            $query = "SELECT r.title, r.id, r.create_date, c.name, r.content, r.cover FROM recipes r LEFT JOIN recipes_cats c ON r.cat=c.id  WHERE 1 $completion $searchCompletion";

            $qRecipes = Q($query);
            while ($recipe = $qRecipes->fetch_assoc()) {


            ?>
                <a class="recipe" href="edit-recipe.php?id=<?= $recipe['id'] ?>">
                    <!-- <span class="cat"><?= $recipe['name'] ?></span> -->
                    <!-- <span class="date"><?= $recipe['create_date'] ?></span> -->
                    <div class="cover" style="background-image: url(../assets/img/covers/<?= $recipe['cover'] ?>.jpg);background-size:cover;"></div>
                    <h3 class="title"><?= $recipe['title'] ?></h3>
                    <!-- <p class="description">
                        <?= substr(strip_tags($recipe['content']), 0, 300); ?>...
                    </p> -->
                </a>
            <?php
            }
            ?>
        </div>

    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, {});
        document.getElementById("selectCat").addEventListener("change", e => {
            document.location.href = `?cat=${e.target.value}`
        })


    });
</script>

</html>