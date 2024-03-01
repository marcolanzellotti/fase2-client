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
                        location.replace("pos-fase2.php");
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

    <a href="https://wa.me/5521967391132?text=OI+Thays%2C+quero+mais+informa%C3%A7%C3%B5es+sobre+a+FASE+2+%21%21" class="floating white">
        <img src="https://empregosimperatriz.com.br/wp-content/uploads/2022/07/customer-2533659_1920-300x225-1.png" alt="">
    </a>
    <header style="justify-content: center;background-color:orange;margin-bottom:1em;">
        <h3 class="bold">
            Promoção VÁLIDA APENAS PARA HOJE</p>
        </h3>
    </header>
    <!-- https://youtu.be/zMgozMqywyc -->
    <div class="container center main-container">
        <iframe class="mb1" src="https://www.youtube.com/embed/zMgozMqywyc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <a href="pos-mentor-fase2.php" class="b z-depth-3 red">
            QUERO ELIMINAR GORDURA E EMAGRECER
        </a><br />
        <p class="white p1 black-text" style="font-size:12pt;">
            PROTOCOLO ALIMENTAR CALCULADO onde <b>vai aprender a combinar alimentos simples e acessíveis</b>, para destravar a queima de gordura e o metabolismo, com todas as refeições planejadas, facilitando a vida de quem não tem tempo.<br />
            <br />

            Ainda vai aprender quais as combinações de alimentos que aceleram ainda mais a QUEIMA de gordura e ajudam a estimular o colágeno para não ter flacidez.<br /><br />

            Terá acesso ao Grupo VIP e Suporte Individual de um especialista da Equipe do Plano Seca Gordura.
            <br />
            <!-- <b>DETALHE</b>: Grupo de Acompanhamento e suporte individual durante 12 meses -->
        </p>
        <br />
        <img src="assets/img/pv1.jpg" style="width:100%;" alt="">
        <h3 class="black-text white p1" style="font-size:20pt;">O QUE ESTÁ INCLUSO NO PSG TURBO</h3>

        <div class="d">
            <p>
                <b> ACESSO, SUPORTE E ACOMPANHAMENTO <br /></b><br />
                ÚNICO PROGRAMA DO BRASIL que você escolhe o tempo de acompanhamento para lhe garantir resultado e ajustes no planejamento de acordo com sua evolução corporal.
            </p>
        </div>

        <div class="d">
            <p>
                <b>PAGAMENTO ÚNICO</b><br />
                Só precisa fazer a sua inscrição uma única vez para ter seu acesso e acompanhamento.<br /><br />
                Fazemos isso para ajudar o maior número de pessoas e aumentar cada vez mais a quantidade de alunas com resultado, gerando mais indicação.
            </p>
        </div>
        <div class="d">
            <p>
                <b>PLATAFORMA PSG</b><br />
                Terá acesso a ÚNICA Plataforma que possui um diário, onde pode registrar suas dificuldades e momentos emocionais para que o especialista do PSG possa orientar de forma imediata.

                Além disso, terá acesso ao FIT FLIX onde contém todas as estratégias nutricionais usadas nos últimos anos.
            </p>
        </div>
        <div class="d">
            <p>
                <b>PLANO ALIMENTAR PSG</b><br />
                Irá receber o Planejamento Alimentar calculado para acelerar seu resultado e com 310 liberações alimentares simples e acessíveis para facilitar a montagem das suas refeições.
            </p>
        </div>
        <div class="d">
            <p>
                <b>MENTOR INDIVIDUAL</b><br />

                Chega de ficar com dúvidas ou sem saber o que escolher, pois no PSG terá um especialista para tirar suas dúvidas e receber orientações. Também receberá acompanhamento da sua evolução toda semana.
            </p>
        </div>
        <div class="d">
            <p>
                <b>6 ESTRATÉGIAS SEC</b><br />
                Ter estratégia nutricional que funcione para o seu corpo é fundamental para não travar o resultado e aprenda a manter o resultado.
            </p>
        </div>


        <div class="d">
            <p>
                <b>SUPLEMENTAÇÃO</b><br />
                Formas para acelerar resultado de forma mais fácil e saudável. Assim evitamos a perda de massa na atividade física.
            </p>
        </div>

        <div class="d">
            <p>
                <b>PORTAL DE TREINOS</b><br />
                Terá acesso a rotina completa e planejada de exercícios online para fazer em casa ou em qualquer lugar, mas que vão ajudar no seu resultado.
            </p>
        </div>
        <div class="d">
            <p>
                <b>PORTAL DE RECEITAS CALCULADAS</b><br />
                Chega de receitas que travam seu resultado, então agora vai ter uma Plataforma com inúmeras receitas para cada refeição do seu dia.
            </p>
        </div>

        <div class="d">
            <p>
                <b>LIVES SEMANAIS</b><br />
                Toda Semana temos encontros online, trazendo atualizações de emagrecimento e assuntos complementares: Mentalidade - Desafios - Orientações Nutricionais - Turma Detox
            </p>
        </div>

        <div class="d">
            <p>
                <b> ANÁLISE DE RESULTADO</b><br />
                Quer ter resultado toda semana igual as nossas alunas? Para isso precisamos acompanhar evolução do seu resultado para caso seja necessário, façamos ajustes no planejamento.
            </p>
        </div>


        <div class="d">
            <p>
                <b> REFEIÇÕES LIVRES</b><br />
                As refeições livres no final de semana podem ser feitas sem prejudicar o resultado, desde que aprenda a preparar o corpo (café da manhã e lanche da manhã).
            </p>
        </div>

        <div class="d">
            <p>
                <b>DESAFIO DOS R$ 10.000,00</b><br />
                Todo mês temos um DESAFIO de 21 DIAS valendo 10 prêmios de R$ 1.000,00 com orientações para eliminar drasticamente a queima de gordura, desde que siga o planejamento estratégico.
            </p>
        </div>


        <div class="d">
            <p>
                <b>PROTOCOLO PSG TURBO</b><br />
                Durante os 12 meses, terá acesso a planejamentos de acordo com seu objetivo: redução de gordura, ganho de massa, manutenção de peso, flacidez e menopausa.
            </p>
        </div>
        <a href="pos-mentor-fase2.php" class="b z-depth-3 red">
            QUERO ELIMINAR GORDURA E EMAGRECER
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

        <a href="pos-mentor-fase2.php" class="b z-depth-3 red">
            QUERO ELIMINAR GORDURA E EMAGRECER
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
            axios.get("pv-fase2.php?setTime=" + timer).then(res => {
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