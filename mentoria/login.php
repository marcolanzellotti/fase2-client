<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <!-- Compiled and minified JavaScript -->
    <style>

    </style>
    <title>Plano Seca Gordura</title>
</head>

<body>
    <div class="full-height parallax-container main-container">
        <div style="background-color: rgba(0,0,0,.5);color:white;padding:1em;text-align:center;text-transform:uppercase;margin:1em;">
            <h3>Mentoria Plano Seca Gordura Fase 2</h3>
            <p style="font-weight: bold;">

            </p>
        </div>
        <br />
        <a href="#login" class="cta" style="padding:.5em;text-decoration:none;line-height:18pt;"><span style="text-decoration: underline;text-transform:uppercase;font-size:15pt;">Acessar plataforma</span><br /><span style="font-size:10pt;font-weight: bolder;text-align:center;margin:auto;text-decoration:none !important;">Clique aqui para entrar</span></a>

        <div class="parallax">
            <img src="/assets/img/carolina-guzzo.jpeg" alt="">
        </div>
    </div>
    <div class="container login full-height  " id="login">

        <form action="" method="POST">
            <input type="hidden" name="login">
            <h3 class="center">Login</h3>
            <div class="row">
                <div class="col s12 input-field">
                    <i class="material-icons prefix">mail</i>
                    <input type="email" name="email" id="email" required>
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 input-field">
                    <i class="material-icons prefix">key</i>
                    <input name="password" id="password" type="password" required>
                    <label for="password">Senha</label>
                </div>
            </div>
            <div class="row">
                <button class="btn" type="submit">Entrar <i class="material-icons right">send</i></button>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.parallax');
            var instances = M.Parallax.init(elems, {});
        });
    </script>
</body>

</html>