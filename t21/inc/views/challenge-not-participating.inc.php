<div class="section">
    <div class="row">
        <!-- <blockquote class="blockquote-green">Você já está participando</blockquote> -->
        <!-- <blockquote class="blockquote-yellow">Você ainda não está participando<?= $challenge['phase'] == "2" ? " da fase 2" : "" ?></blockquote> -->
    </div>

    <h5>Anexe suas fotos para participar do desafio</h5>

    <form action="" method="POST" enctype="multipart/form-data">
        <label>Selecione 3 fotos</label>
        <?= ($challenge['phase'] == "2"  && $phase2) ? "<input type=\"hidden\" name=\"phase2\">" : "" ?>
        <div class="file-field input-field row">
            <div class="btn">
                <span>Foto de frente</span>
                <input type="file" accept="image/*" onchange="document.getElementById('photo-2').classList.remove('disabled')" id="photo-1" name="photos[]" required />
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Escolher foto" />
            </div>
        </div>

        <div class="file-field input-field row">
            <div class="btn disabled" id="photo-2">
                <span>Foto de lado</span>
                <input type="file" accept="image/*" onchange="document.getElementById('photo-3').classList.remove('disabled')" name="photos[]" required />
            </div>

            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Escolher foto" />
            </div>
        </div>
        <div class="file-field input-field row">
            <div class="btn disabled" id="photo-3">
                <span>Foto de costas</span>
                <input type="file" accept="image/*" onchange="document.getElementById('send-photos').classList.remove('disabled')" name="photos[]" required />
            </div>

            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Escolher foto" />
            </div>
        </div>
        <?php
        if ($challenge['phase'] == "2") {
        ?>
            <div class="file-field input-field row">
                <p>Você autoriza mostrar suas fotos de resultado na LIVE DOS GANHADORES caso seja um dos vencedores?</p>
                <p>
                    <label>
                        <input name="authorizes_showing_photos" id="authorizes_showing_photos_sim" value="1" type="radio" required />
                        <span>Sim</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input name="authorizes_showing_photos" id="authorizes_showing_photos_nao" value="2" type="radio" required />
                        <span>Não</span>
                    </label>
                </p>
            </div>
        <?php } ?>
        <div class="row">
            <button type="submit" name="send-photos" id="send-photos" class="btn disabled">Enviar <i class="material-icons">send</i></button>
        </div>
    </form>
</div>