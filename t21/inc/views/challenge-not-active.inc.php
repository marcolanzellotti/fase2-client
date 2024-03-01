<div class="section">

    <?php
    if ($challenge['acticve'] == 0) {
        
        echo "<blockquote>Desafio encerrado!</blockquote>";
        
    } else {
    ?>

        <h5>Vencedores</h5>
        <div class="row">
            <?php
            $winnerIndex = 1;
            foreach ($winners as $winner) {
                $user = getUserById($winner['user_id']);
            ?>

                <h5><span class="blue-text"><?= $user['name'] ?></span><i class="material-icons yellow-text">star</i> <?= $winnerIndex ?>º Lugar<span class="badge new" data-badge-caption="<?= $winner['votes'] ?> Votos"></span></h5>
                <div class="slider  col s12 m6">
                    <ul class="slides">
                        <?php
                        $imagesPhase1 = getParticipantImages($winner['id'], $challenge['id']);
                        foreach ($imagesPhase1 as $image) {
                        ?>
                            <li>
                                <img src="/<?= $image['path'] ?>">
                                <div class="caption center-align">
                                    <h3>Antes</h3>
                                </div>
                            </li>

                        <?php } ?>
                    </ul>
                </div>
                <div class="slider  col s12 m6">
                    <ul class="slides">
                        <?php
                        $imagesPhase2 = getParticipantImages($winner['id'], $challenge['id'], 2);
                        foreach ($imagesPhase2 as $image) {
                        ?>
                            <li>
                                <img src="/<?= $image['path'] ?>">
                                <div class="caption center-align">
                                    <h3>Depois</h3>
                                </div>
                            </li>

                        <?php } ?>
                    </ul>
                </div>


            <?php
                $winnerIndex++;
            }
            ?>

        </div>
    <?php } ?>
</div>