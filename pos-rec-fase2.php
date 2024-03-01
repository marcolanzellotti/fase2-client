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
                        location.replace("https://planosecagordurapromo.carrinho.app/one-checkout/ocmsb-cp/5050207");
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

    <a href="https://wa.me/5521967391132?text=OI+Thays%2C+quero+mais+informa%C3%A7%C3%B5es+sobre+a+FASE+2+%21%21" class="floating">
        <img src="https://cdn-icons-png.flaticon.com/512/124/124034.png?w=360" alt="">
    </a>
    <header style="justify-content: center;background-color:orange;margin-bottom:1em;">
        <h3 class="bold">
            Promoção acaba em <p style="text-align: center;"><i class="material-icons red-text" style="vertical-align: middle;">timer</i><span class="red-text" id="time">00:00</span></p>
        </h3>
    </header>
    <!-- https://youtu.be/zMgozMqywyc -->
    <div class="container center main-container">
        <p class="white p1 black-text" style="font-size:12pt;">
            <b>AGORA VOCÊ TEM 3 ESCOLHAS</b> <br><br>Condições apenas para este momento e não estarão disponíveis no futuro.<br><br><b>PAGAMENTO ÚNICO:</b> A inscrição é feita uma única vez para o tempo escolhido.<br />

        </p><br />

        <!-- 
        <h3 class="black-text white p1" style="font-size:20pt;">FAÇA SUA ESCOLHA</h3> -->


        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b> 6 MESES DE ACESSO E<br />ACOMPANHAMENTO</b>


                <a href="https://metodot360promocional.carrinho.app/one-checkout/ocmsb/8445366" class="b z-depth-3 red">
                    INSCRIÇÃO 6 MESES</a><br />De R$ 247,00 por R$ 154,00

            </p>
        </div>

        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b> 1 ANO DE ACESSO E<br />ACOMPANHAMENTO</b>


                <a href="https://metodot360promocional.carrinho.app/one-checkout/ocmsb/2226661" class="b z-depth-3 red">
                    INSCRIÇÃO 1 ANO</a><br />De R$ 497,00 por R$ 174,00

            </p>
        </div>

        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b>2 ANOS DE ACESSO E<br />ACOMPANHAMENTO</b>



                <a href="https://metodot360promocional.carrinho.app/one-checkout/ocmsb/2125477" class="b z-depth-3 red">
                    INSCRIÇÃO 2 ANOS</a><br />De R$ 994,00 por R$ 224,00
            </p>

        </div>

        <div class="d">
            <!--
 <div class="img-container">
                <img src="assets/img/50.png" alt="">
            </div>-->
            <p>
                <b>VITALÍCIO ACESSO E<br />ACOMPANHAMENTO</b><br />
                <span class="red-text" style="font-weight: bolder;text-transform:uppercase;">Ainda ganha de bônus:</span> <br /><span style="font-weight: bolder;text-transform:uppercase;">Mini lipo nutricional</span>

                <br />

                <a href="https://metodot360promocional.carrinho.app/one-checkout/ocmsb/2122364" class="b z-depth-3 red">
                    INSCRIÇÃO VITALÍCIA</a><br />De R$ 4.970,00 por R$ 699,00
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