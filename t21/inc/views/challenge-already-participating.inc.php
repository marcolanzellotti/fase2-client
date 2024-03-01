<div class="section">
    <?php 
    //$participantImages = getParticipantImages($selfParticipant['id'], $id, 1);
    //var_dump($selfParticipant['id']);die;
    if($participantImages = getParticipantImages($selfParticipant['id'], $id, 1)) {

    ?>
    <blockquote class="blockquote-green">Você já está participando</blockquote>

    <h5>Suas fotos (Primeira etapa)</h5>

    <div class="slider">
        <ul class="slides">
            <?php
            foreach ($participantImages as $image) {

            ?>
                <li>
                    <img src="<?= $image['path'] ?>"> <!-- random image -->
                    <div class="caption center-align">

                    </div>
                </li>

            <?php } ?>
        </ul>
    </div>
    <?php } ?>

    <?php
    if ($challenge['phase'] == "2" && $participantImages = getUserImages($userId, $id, 2)) {
    ?>
        <h5>Suas fotos (Segunda etapa)</h5>

        <div class="slider">
            <ul class="slides">
                <?php
                foreach ($participantImages as $image) {

                ?>
                    <li>
                        <img src="<?= $image['path'] ?>"> <!-- random image -->
                        <div class="caption center-align">

                        </div>
                    </li>

                <?php } ?>
            </ul>
        </div>
    <?php } ?>
</div>