<?php
include 'cabecera.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bulma.min.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.css">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/styles.css">
    <title>Index</title>
</head>

<body>

    <!-- Barra de navegación -->
    <header>
        <nav class="navbar-top">
            <ul class="navbar-top-ul">
                <li class="navbar-top-item">
                    <a href="registro.php" class="navbar-top-links">Registro</a>
                </li>
                <li class="navbar-top-item">
                    <a href="login.php" class="navbar-top-links">Iniciar sesión</a>
                </li>
                <li class="navbar-top-item">
                    <a href="login.php" class="navbar-top-links">
                        <i class="zmdi zmdi-shopping-cart"></i> Carrito
                        <!-- <i class="zmdi zmdi-chevron-down"></i> -->
                    </a>
                </li>
            </ul>
        </nav>
        <nav class="navbar">
            <header class="nabvar-mobile is-size-5-mobile">
                <a class="navbar-mobile-link has-text-white" href="#" id="btn-mobile"><i class="zmdi zmdi-menu"></i></a>
                <a class="navbar-mobile-link has-text-white" href="index.php">Online Boutique</a>
            </header>
        </nav>
    </header>
    <!-- Banner -->
    <div class="banner banner-cover">
        <div class="banner-container ">
            <h1 class="title-cover">ONBOU</h1>
        </div>
    </div>
    <br><br>
    <!-- Sección de fotografías -->
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/tiendaDeRopa.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>ONBOU</h1>
                        <p>ONBOU NACE EN 2020 DURANTE LA PANDEMIA. SE PRESENTA COMO UN PUNTO DE REFERENCIA PARA LA MODA DIRIGIDA A ESTE PUBLICO CADA VEZ MAS EXIGENTE, AUN ES UNA EMPRESA CHICA PERO QUE CADA DIA CRECE MAS.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/casual.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>
                            <font color="#000000">NUESTRO PUBLICO</font>
                        </h1>
                        <p>
                            <font color="#000000">EL PUBLICO DE ONBOU SE CARACTERIZA POR SER JOVENES ATREVIDOS, CONOCEDORES DE LAS ULTIMAS TENDENCIAS E INTERESADOS EN LA MUSICA, LAS REDES SOCIALES Y LAS NUEVAS TECNOLOGIAS.</font>
                        </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/pieles.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>POLITICA DE TRATO A LOS ANIMALES</h5>
                        <p>TODOS LOS PRODUCTOS DE ORIGEN ANIMAL, INCLUIDAS PIELES Y CUEROS, COMERCIALIZADOS EN NUESTRAS TIENDAS PROCEDEN EXCLUSIVAMENTE DE ANIMALES CRIADOS EN GRANJAS PARA LA ALIMENTACION Y EN NINGUN CASO, DE ANIMALES SACRIFICADOS EXCLUSIVAMENTE PARA LA VENTA DE SUS PIELES.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    
    <footer class="footer">
        <div class="footer-bar-top">
            <div class="container">
                <a class="footer-bar-top-links" href="#">2022 Online Boutique</a>
            </div>
        </div>
    </footer>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>