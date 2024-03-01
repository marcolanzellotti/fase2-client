<?php
session_start();
if (isset($_SESSION['time'])) {
    $time = $_SESSION['time'];
}
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
                        location.replace("https://planosecagordura7dias.carrinho.app/one-checkout/ocmsb/8208536");
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

    <a href="https://wa.me/5521978926228?text=OI+Karla%2C+quero+mais+informa%C3%A7%C3%B5es+sobre+a+FASE+2+%21%21" class="floating white" style="height: 55px;">
        <img src="https://empregosimperatriz.com.br/wp-content/uploads/2022/07/customer-2533659_1920-300x225-1.png" alt="">
    </a>
    <header style="justify-content: center;background-color:orange;margin-bottom:1em;">
        <h3 class="bold">
            Promoção acaba em <p style="text-align: center;"><i class="material-icons red-text" style="vertical-align: middle;">timer</i><span class="red-text" id="time">00:00</span></p>
        </h3>
    </header>
    <!-- https://youtu.be/zMgozMqywyc -->
    <div class="container center main-container">
        <p class="white p1 black-text" style="font-size:12pt;">
            <b>PLANO SECA GORDURA</b><br>Escolha qual tempo de acesso e acompanhamento com suporte individual deseja no PSG. <br><br>Condições Especiais podem acabar a qualquer momento devido a quantidade de vagas disponíveis.<br><br><b>LEMBRANDO:</b> O valor de inscrição é feito uma única vez para o tempo escolhido.<br />
        </p>
        <br />

        <div class="d">
            <p>
                <b> 6 MESES DE ACESSO E<br />ACOMPANHAMENTO</b>
                <a href="https://planosecagordura7dias.carrinho.app/one-checkout/ocmsb/8208536" class="b z-depth-3 red">
                    INSCRIÇÃO 6 MESES</a><br />De R$ 247,00 por R$ 149,00
            </p>
        </div>

        <div class="d">
            <p>
                <b> 1 ANO DE ACESSO E<br />ACOMPANHAMENTO</b>
                <a href="https://planosecagordura7dias.carrinho.app/one-checkout/ocmsb/2273866" class="b z-depth-3 red">
                    INSCRIÇÃO 1 ANO</a><br />De R$ 494,00 por R$ 189,00
            </p>
        </div>

        <div class="d">
            <p>
                <b>2 ANOS DE ACESSO E<br />ACOMPANHAMENTO</b>
                <a href="https://planosecagordura7dias.carrinho.app/one-checkout/ocmsb-cbp/8107897" class="b z-depth-3 red">
                    INSCRIÇÃO 2 ANOS</a><br />De R$ 994,00 por 12x R$ 26,51
            </p>
        </div>

        <div class="d">
            <p>
                <b>VITALÍCIO ACESSO E<br />ACOMPANHAMENTO</b><br />
                <span class="red-text" style="font-weight: bolder;text-transform:uppercase;">Ainda ganha de bônus:</span> <br /><span style="font-weight: bolder;text-transform:uppercase;">Mini lipo nutricional</span>
                <br />
                <a href="https://planosecagordura7dias.carrinho.app/one-checkout/ocmsb-cbp/8107899" class="b z-depth-3 red">
                    INSCRIÇÃO VITALÍCIA</a><br />De R$ 4.940,00 por 12X R$ 70,18
            </p>

        </div>






</body>
<script>
    function startTimer(duration, display) {
        //        duration = 60 * duration;
        var timer = duration,
            minutes, seconds;
        setInterval(function() {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = duration;
                console.log(duration)

            }
        }, 1000);
    }

    window.onload = function() {
        <?php
        if ($time) {
            echo " var duration = $time";
        } else {
            echo "var duration = 10 * 60";
        }
        ?>

        var display = document.querySelector('#time');
        startTimer(duration, display);
    };
</script>

</html>