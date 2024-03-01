<?php
session_start();
if (isset($_SESSION['time'])) {
    $time = $_SESSION['time'];
}
if (isset($_GET['setTime'])) {
    $_SESSION['time'] = $_GET['setTime'];
    die(json_encode($_SESSION));
}
// session_destroy();
// unset($_SESSION);
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/imask"></script>

    <script type="text/javascript">
        var newUrl = location.pathname + location.search;

        (function(window, location) {
            history.replaceState(null, document.title, newUrl + "#!/backbutton");
            history.pushState(null, document.title, newUrl);
            window.addEventListener("popstate", function() {
                if (location.hash === "#!/backbutton") {
                    history.replaceState(null, document.title, newUrl);
                    setTimeout(function() {
                        location.replace("pos-rec-fase2.php");
                    }, 0);
                }
            }, false);
        }(window, location));
    </script>

    <!-- Compiled and minified JavaScript -->

    <title>Plano Seca Gordura</title>
    <style>
        .floating {
            position: fixed;
            bottom: 1em;
            right: 1em;
            border-radius: 100%;
            width: 4em;
            z-index: 2;
            box-shadow: 0px 0px 10px #fff;
        }

        .floating img {
            width: 100%;
            border-radius: 100%;
        }


        .d p {
            max-width: unset;
            text-align: center;
        }

        .d p b {
            text-align: center;
            display: block;
            font-size: 15pt;
        }

        .d2 {
            flex-direction: column;
        }

        .d2 .img-container {
            width: 100%;
        }


        .d2 p {
            border-radius: 0;
            text-align: center;
        }
    </style>
</head>

<body>

    <a href="https://wa.me/5521978926228?text=OI+Karla%2C+quero+mais+informa%C3%A7%C3%B5es+sobre+a+FASE+2+%21%21" class="floating">
        <img src="https://cdn-icons-png.flaticon.com/512/124/124034.png?w=360" alt="">
    </a>
    <header style="justify-content: center;background-color:orange;margin-bottom:1em;">
        <h3 class="bold">
            Promoção acaba em <p style="text-align: center;"><i class="material-icons red-text" style="vertical-align: middle;">timer</i><span class="red-text" id="time">00:00</span></p>
        </h3>
    </header>
    <!-- https://youtu.be/zMgozMqywyc -->
    <div class="container center main-container">
        <iframe class="mb1" src="https://www.youtube.com/embed/zMgozMqywyc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <a href="pos-rec-fase2.php" class="b z-depth-3 red">
            INSCRIÇÃO PSG FASE 2
        </a><br />
        <p class="white p1 black-text" style="font-size:12pt;">
            PROTOCOLO ALIMENTAR DIFERENCIADO com <b>310 liberações alimentares e todas as refeições planejadas</b>, facilitando a vida de quem não tem tempo.<br />
            <br />

            Ainda vai aprender a combinar os alimentos para manter a queima de gordura toda semana, para evitar o efeito platô.<br /><br />
            <!-- <b>DETALHE</b>: Grupo de Acompanhamento e suporte individual durante 12 meses -->
        </p>
        <br />
        <img src="assets/img/pv1.jpg" style="width:100%;" alt="">
        <h3 class="black-text white p1" style="font-size:20pt;">O QUE ESTÁ INCLUSO NA FASE 2 DO PSG</h3>

        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b> ACESSO, SUPORTE E ACOMPANHAMENTO DE <br />12 MESES</b><br />


                ÚNICO PROGRAMA DO BRASIL que possui acompanhamento por 12 meses para lhe garantir resultado e ajustes no planejamento de acordo com sua evolução corporal para acelerar o resultado.
            </p>
        </div>

        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b>PAGAMENTO ÚNICO</b><br />


                Só precisa fazer a sua inscrição para ter direito aos 12 meses de acesso e acompanhamento.<br /><br />

                Fazemos isso pois muitas pessoas que vão ver seu resultado, vão se interessar e assim temos muitas pessoas no PSG.
            </p>
        </div>

        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->

            <p>
                <b>MENTOR INDIVIDUAL</b><br />

                Chega de ficar perdida e sozinha, pois na FASE 2 terá um especialista para tirar suas dúvidas e receber orientações. Também receberá acompanhamento da sua evolução toda semana.
            </p>
        </div>
        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b>6 ESTRATÉGIAS SEC</b><br />

                Ter estratégia nutricional que funcione para o seu corpo é fundamental para não travar o resultado e ainda evita que ganhe tudo novamente.
            </p>
        </div>

        <div class="d">
            <!-- <div class="img-container">

                <img src="assets/img/52.png" alt="">
            </div> -->
            <p>
                <b>PLANO ALIMENTAR 10.0</b><br />
                Irá receber o Planejamento Alimentar calculado para acelerar seu resultado e com 310 novas liberações alimentares para facilitar a montagem das suas refeições.
            </p>
        </div>
        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b>SUPLEMENTAÇÃO</b><br />
                Formas de acelerar resultado de forma mais fácil e saudável. Assim evitamos a perda de massa na atividade física.
            </p>
        </div>

        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b>PORTAL DE TREINOS</b><br />
                Terá acesso a rotina completa de exercícios online para fazer em casa ou em qualquer lugar, mas que vão ajudar no seu resultado.
            </p>
        </div>



        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b>PORTAL DE RECEITAS CALCULADAS</b><br />
                Chega de receitas que travam seu resultado, então agora vai ter uma Plataforma com inúmeras receitas para cada refeição do seu dia.
            </p>
        </div>

        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b>LIVES SEMANAIS</b><br />
                Toda Semana temos 2 encontros online, trazendo atualizações de emagrecimento e assuntos complementares: Mentalidade - Desafios - Orientações Nutricionais - Turma Detox
            </p>
        </div>

        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b> ANÁLISE DE RESULTADO</b><br />
                Quer ter resultado toda semana igual as nossas alunas? Para isso precisamos acompanhar evolução do seu resultado para caso seja necessário, façamos ajustes no planejamento
            </p>
        </div>


        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b> REFEIÇÕES LIVRES</b><br />
                As refeições livres no final de semana podem ser feitas sem prejudicar o resultado, desde que aprenda a preparar o corpo (café da manhã e lanche da manhã).
            </p>
        </div>

        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b>GRUPO AVANÇADO 10 DIAS</b><br />
                Todo mês temos um grupo com rotinas avançadas onde qualquer pessoa pode participar, desde que siga o planejamento estratégico.
            </p>
        </div>

        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b> DESAFIO ELIMINA+</b><br />
                Todo mês temos um Desafio valendo premiação em dinheiro para os 5 melhores resultados de transformação corporal (redução de gordura, peso e medidas)
            </p>
        </div>

        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b>PROTOCOLO PSG TURBO</b><br />


                Durante os 12 meses, terá acesso a planejamentos de acordo com seu objetivo: redução de gordura, ganho de massa, manutenção de peso, flacidez e menopausa.
            </p>
        </div>




        <a href="https://membros.planosecagordura.com.br/pos-rec-fase2.php" class="b z-depth-3 red">
            INSCRIÇÃO PSG FASE 2
        </a><br />


        <div class="d d2">
            <div class="img-container">
                <img src="assets/img/d1.jpg" alt="">
            </div>
            <p>
                Meu nome é Nair e aos 82 anos eu achava que seria difícil, mas depois que aumentei a ingestão nutricional na FASE 2 do PSG e as combinações adequadas, não tive nenhuma dificuldade.
            </p>
        </div>
        <div class="d d2">
            <div class="img-container">
                <img src="assets/img/d2.jpg" alt="">
            </div>
            <p>
                Me chamo Thayse e como trabalho em Platão com horários desregulados, pensei que iria demorar mais para emagrecer, mas com ajuda da minha especialista, consegui em 5 meses mudar meu corpo.
            </p>
        </div>

        <div class="d d2">
            <div class="img-container">
                <img src="assets/img/d3.jpg" alt="">
            </div>
            <p>
                Meu nome é Deisy e como moro no Sul, achava que o frio dava mais fome, só que depois que entrei na FASE 2 do PSG, consegui emagrecer mesmo no frio e no meio da pandemia. Nunca conheci um programa com uma equipe tão dedicada. </p>
        </div>

        <div class="d d2">
            <div class="img-container">
                <img src="assets/img/d4.jpg" alt="">
            </div>
            <p>
                Sou a Marluci e aos 54 anos, estou na melhor fase da minha vida depois que conheci o Plano Seca Gordura. Além do resultado, tenho acompanhamento e motivação para continuar. Aprender a se amar faz diferença nas escolhas
        </div>

        <a href="https://membros.planosecagordura.com.br/pos-rec-fase2.php" class="b z-depth-3 red">
            INSCRIÇÃO PSG FASE 2
        </a><br />

    </div>
</body>
<script>
    console.log("init")

    function startTimer(duration, display) {
        // duration = 60 * duration;
        var timer = duration,
            minutes, seconds;
        setInterval(function() {

            console.log(duration)
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;
            axios.get("pv-fase2-rec.php?setTime=" + timer).then(res => {
                console.log(res);
            })
            if (--timer < 0) {
                timer = duration;

            }
        }, 1000);
    }

    window.onload = function() {
        <?php
        if ($time) {
            echo "var duration = $time";
        } else {
            echo "var duration = 10 * 60";
        }
        ?>

        var display = document.querySelector('#time');
        startTimer(duration, display);
    };
</script>

</html>