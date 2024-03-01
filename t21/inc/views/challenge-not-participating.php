<div class="section">
    <div class="row">
        <!-- <blockquote class="blockquote-green">Você já está participando</blockquote> -->
        <blockquote>Você ainda não está participando<?= $challenge['phase'] == "2" ? " da fase 2" : "" ?></blockquote>
    </div>

    <h5>Anexar fotos</h5>
    <?php


    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Selecione 3 fotos</label>
        <?= $challenge['phase'] == "2" ? "<input type=\"hidden\" name=\"phase2\">" : "" ?>
        <div class="file-field input-field row">
            <div class="btn">
                <span>Foto 1</span>
                <input type="file" accept="image/*" onchange="document.getElementById('photo-2').classList.remove('disabled')" id="photo-1" name="photos[]" required />
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Escolher foto" />
            </div>
        </div>

        <div class="file-field input-field row">
            <div class="btn disabled" id="photo-2">
                <span>Foto 2</span>
                <input type="file" accept="image/*" onchange="document.getElementById('photo-3').classList.remove('disabled')" name="photos[]" required />
            </div>

            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Escolher foto" />
            </div>
        </div>
        <div class="file-field input-field row">
            <div class="btn disabled" id="photo-3">
                <span>Foto 3</span>
                <input type="file" accept="image/*" onchange="document.getElementById('send-photos').classList.remove('disabled')" name="photos[]" required />
            </div>

            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Escolher foto" />
            </div>
        </div>
        <div class="row">
            <button type="submit" name="send-photos" id="send-photos" class="btn disabled">Enviar <i class="material-icons">send</i></button>
        </div>
    </form>
</div>