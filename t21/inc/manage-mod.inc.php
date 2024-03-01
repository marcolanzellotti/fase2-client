<div class="collection">
    <?php
    $mods = getMods();

    foreach ($mods as $mod) {
        echo "<a href=\"/admin/mod?id=$mod[id]\" class=\"collection-item\">$mod[name]<span class=\"secondary-content\"><i class=\"material-icons\">edit</i></span></a>";
    }
    ?></div>

<div class="collection">
    <a href="/admin/new-mod" class="collection-item"><i class="material-icons">person_add</i>Novo moderador</a>

</div>