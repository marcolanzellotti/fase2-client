<div class="collection">
    <?php
    $challenges = getChallenges();

    foreach ($challenges as $challenge) {

        $term = ($challenge['phase'] == "1" ? "iniciais" : "finais");
        echo "<a href=\"/admin/challenge.php?id=$challenge[id]\" class=\"collection-item\">$challenge[title] (Fotos $term)<span class=\"secondary-content\"><i class=\"material-icons\">edit</i></span></a>";
    }
    ?>

</div>
<div class="collection">
    <a href="new-challenge" class="collection-item"><i class="material-icons">library_add</i>Novo desafio</a>
</div>