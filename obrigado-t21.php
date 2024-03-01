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
        body {
            background-image: url(assets/img/bg-novo-3.jpg);
        }

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

        .buttons {
            display: flex;
            justify-content: stretch;
            position: relative;
        }

        .buttons a {
            flex: 1;

        }

        .buttons span {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translateY(-50%) translateX(-50%);

            font-weight: bold;
            background-color: white;
            color: black;
            padding: 1em;
            border-radius: 100%;
        }
    </style>
</head>

<body>

    <a href="https://api.whatsapp.com/send?phone=5521967391132&text=Thays,%20estou%20com%20d%C3%BAvida%20na%20renova%C3%A7%C3%A3o.%20Pode%C2%A0me%C2%A0ajudar?" class="floating white" style="height: 55px;" class="floating">
        <img src="https://empregosimperatriz.com.br/wp-content/uploads/2022/07/customer-2533659_1920-300x225-1.png" alt="">
    </a>
    <header style="background-color:transparent;height:14em;justify-content: center;margin-bottom:1em;background-image:url(assets/img/banner-checkout.png);background-size:cover;background-position:center;">
        <!-- <h3 class="bold">
            Promoção acaba em <p style="text-align: center;"><i class="material-icons red-text" style="vertical-align: middle;">timer</i><span class="red-text" id="time">00:00</span></p>
        </h3> -->
    </header>
    <!-- https://youtu.be/zMgozMqywyc -->

    <div class="container center main-container">
        <div class="white-text p1 bold" style="margin-top:-10px;">
            <h5 style="font-weight:bold;font-size:16pt;">Parabéns pela inscrição!!</h5>
            <h5 class="red-text" style="font-size: 13pt;font-weight:bold;background-color:rgba(0,0,0,.5);padding:1em;">
                Avise à pessoa que lhe indicou o desafio que a sua inscrição foi confirmada para que ela possa enviar para a sua casa o KIT
            </h5>
        </div>

        <iframe class="mb1" src="https://www.youtube.com/embed/NbvzpEn1fDU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        <br />
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