<html>

<head>
    <?php require("../inc/head.inc.php") ?>
    <title>Posts</title>
</head>

<body>

    <main>
        <div class="container white p1">
            <?php
            $data = file_get_contents("result.json");
            $data = json_decode($data, 1);

            foreach ($data["posts"] as $recipe) {
                $content = preg_replace("/\n|\r\n/", "<br />", $recipe["content"]);
                echo "
                <div class=\"section\">
                <h3>$recipe[title]</h3>
                <img style=\"width:100%;\" src=\"$recipe[image]\"/>
                <p>$content</p>
                </div>
                ";
            }

            ?>
        </div>

    </main>
</body>

</html>