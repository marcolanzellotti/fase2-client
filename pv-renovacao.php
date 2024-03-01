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
                        location.replace("https://t360.carrinho.app/one-checkout/ocmsb/1301446");
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

    <!-- <a href="https://api.whatsapp.com/send?phone=5521967391132&text=Thays,%20estou%20com%20d%C3%BAvida%20na%20renova%C3%A7%C3%A3o.%20Pode%C2%A0me%C2%A0ajudar?" class="floating white" style="height: 55px;" class="floating">
        <img src="https://empregosimperatriz.com.br/wp-content/uploads/2022/07/customer-2533659_1920-300x225-1.png" alt="">
    </a> -->
    <header style="height:14em;justify-content: center;background-color:orange;margin-bottom:1em;background-image:url(http://fase2.planosecagordura.com.br/assets/img/renovacao15.png);background-size:cover;">
        <!-- <h3 class="bold">
            Promoção acaba em <p style="text-align: center;"><i class="material-icons red-text" style="vertical-align: middle;">timer</i><span class="red-text" id="time">00:00</span></p>
        </h3> -->
    </header>
    <a href="/home.php" class="back" style="margin-top: -15px;">Voltar</a>

    <!-- https://youtu.be/zMgozMqywyc -->

    <div class="container center main-container">
        <iframe class="mb1" src="https://www.youtube.com/embed/p_O-Fctb5KI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        <p class="white p1 black-text" style="font-size:12pt;">
            <b>BLACK FRIDAY - RENOVAÇÃO</b> <br><br>As condições abaixo são exclusivas para renovar e aumentar seu tempo de acesso e acompanhamento ao Plano Seca Gordura (FASE 2) !!<br />

        </p><br />

        <!-- 
        <h3 class="black-text white p1" style="font-size:20pt;">FAÇA SUA ESCOLHA</h3> -->

        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b> ACRESCENTAR +6 MESES <BR>DE ACESSO E ACOMPANHAMENTO</b><br />
                

                <a href="https://t360.carrinho.app/one-checkout/ocmsb-cp/1301446" class="b z-depth-3 red">
                    INSCRIÇÃO 6 MESES</a><br />De R$ 497,00 por R$ 149,00

            </p>
        </div>

        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b>ACRESCENTER +1 ANO <BR>DE ACESSO E ACOMPANHAMENTO</b><br />
                


                <a href="https://t360.carrinho.app/one-checkout/ocmsb-cp/1629573" class="b z-depth-3 red">
                    INSCRIÇÃO 1 ANO</a><br />De R$ 994,00 por R$ 199,00
            </p>

        </div>

        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b>ACRESCENTER +2 ANOS <BR>DE ACESSO E ACOMPANHAMENTO</b><br />
            


                <a href="https://t360.carrinho.app/one-checkout/ocmsb-cp/1448020" class="b z-depth-3 red">
                    INSCRIÇÃO 2 ANOS</a><br />De R$ 1.988,00 por 12x R$ 30,02
            </p>

        </div>

        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b>VITALÍCIO ACESSO E<br />ACOMPANHAMENTO</b><br />
                

                <br />

                <a href="https://t360.carrinho.app/one-checkout/ocmsb-cp/1302610" class="b z-depth-3 red">
                    INSCRIÇÃO VITALÍCIA</a><br />De R$ 6.999,00 por 12x R$ 70,18
            </p>

        </div>

<div class="col-12 text-center">
                        

                        PLANO SECA GORDURA <br />
                        CNPJ: 37.042.725/0001-52 <BR> informacoes@planosecagordura.com.br<br /><BR>
                        
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