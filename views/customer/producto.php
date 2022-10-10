<?php
session_start();
include("../../database/config.php");

$usuario = $_SESSION['email'];
if (!isset($_SESSION['email'])) {
    header("location: ../../login.php");
}
if ($_SESSION['id'] != 2) {
    header("location: ../../login.php");
}
//echo '<script> alert("el id es: '.$_GET['producto'].'"); </script>';

$consulta=consultarproductos($_GET['producto']);
function consultarproductos($producto){
    $conexion = mysqli_connect("localhost","root","") or die ("error en la conexion");
    if($conexion)
    {

        mysqli_select_db($conexion,"tiendaropa") or die("ERROR bd");
        $mostrar="SELECT * FROM prenda WHERE id_Prenda ='".$producto."';";
        $resultado=$conexion->query($mostrar) or die ("error al ver la prenda".mysqli_error($conexion));
        $filas=$resultado->fetch_assoc();
        return [
            $filas['id_Prenda'],
            $filas['precio'],
            $filas['cantidad'],
            $filas['id_Marca'],
            $filas['id_Talla'],
            $filas['id_Departamento'],
            $filas['id_Proveedor']

           
        ];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/bulma.min.css">
    <link rel="stylesheet" href="../../css/material-design-iconic-font.css">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/styles.css"> 
    
    <title>Document</title>
</head>

<body>
    <!-- Barra de navegación -->
    <header>
        <nav class="navbar-top">
            <ul class="navbar-top-ul">
                <li class="navbar-top-item">
                    <a href="login.html" class="navbar-top-links">Registro</a>
                </li>
                <li class="navbar-top-item">
                    <a href="login.html" class="navbar-top-links">Iniciar sesión</a>
                </li>
                <li class="navbar-top-item">
                    <a href="#" class="navbar-top-links">
                        <i class="zmdi zmdi-shopping-cart"></i> Carrito
                        <!-- <i class="zmdi zmdi-chevron-down"></i> -->
                    </a>
                </li>
            </ul>
        </nav>
        <nav class="navbar">
            <header class="nabvar-mobile is-size-5-mobile">
                <a class="navbar-mobile-link has-text-white" href="#" id="btn-mobile"><i class="zmdi zmdi-menu"></i></a>
                <a class="navbar-mobile-link has-text-white" href="index.php"> Online Boutique</a>
                <a class="navbar-mobile-link has-text-white" href="#"><i class="zmdi zmdi-shopping-cart"></i> Vacio</a>
            </header>
            <nav class="nav-menu --nav-dark-light" id="mySidenav">
                <form class="form-group " action="#">
                    <div class="form-group-container">
                        <span class="form-group-icon"><i class="zmdi zmdi-search"></i></span>
                        <input type="text" class="form-group-input" placeholder="Buscar...">
                    </div>
                </form>

                <a class="is-hidden-mobile brand is-uppercase has-text-weight-bold has-text-dark" href="index.html">Online Boutique</a>
                <ul class="nav-menu-ul">
                    <li class="nav-menu-item" id="men">
                        <a class="nav-menu-link link-submenu active" href="#">Hombre <i
                                class="zmdi zmdi-chevron-down"></i></a>
                        <div class="container-sub-menu">
                            <ul class="sub-menu-ul">
                                <li class="nav-menu-item ">
                                    <a class="nav-menu-link" href="#">
                                        <strong>Casual</strong>
                                        <i class="zmdi zmdi-chevron-down "></i>
                                    </a>
                                    <ul class="sub-menu-ul">
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Chaquetas</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisas Polo</a>
                                        </li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Pantalones</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisetas</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="sub-menu-ul">
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">
                                        <strong>Formal</strong>
                                        <i class="zmdi zmdi-chevron-down "></i>
                                    </a>
                                    <ul class="sub-menu-ul">
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Chaquetas</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisetas</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Trajes</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Pantalones</a></li>
                                    </ul>
                                </li>
                            </ul>
                           
                        </div>
                    </li>
                    <li class="nav-menu-item" id="women">
                        <a href="#" class="nav-menu-link link-submenu">Mujer <i class="zmdi zmdi-chevron-down"></i> </a>
                        <div class="container-sub-menu">

                            <ul class="sub-menu-ul">
                                <li class="nav-menu-item ">
                                    <a class="nav-menu-link" href="#">
                                        <strong>Casual</strong>
                                        <i class="zmdi zmdi-chevron-down "></i>
                                    </a>
                                    <ul class="sub-menu-ul">
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Chaquetas</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisas Polo</a>
                                        </li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Pantalones</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisetas</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="sub-menu-ul">
                                <li class="nav-menu-item"><a class="nav-menu-link" href="#">
                                        <strong>Formal</strong>
                                        <i class="zmdi zmdi-chevron-down "></i>
                                    </a>
                                    <ul class="sub-menu-ul">
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Chaquetas</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Camisetas</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Trajes</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="#">Pantalones</a></li>
                                    </ul>
                                </li>
                            </ul>
                           
                        </div>
                    </li>
                    <li class="nav-menu-item"><a href="brand.html" class="nav-menu-link">La Marca</a></li>
                    <li class="nav-menu-item"><a href="lookbook.html" class="nav-menu-link">Look Book</a></li>
                    <li class="nav-menu-item"><a href="login.html" class="nav-menu-link">Registro</a></li>
                    <li class="nav-menu-item"><a href="lookbook.html" class="nav-menu-link">Iniciar Sesión</a></li>
                </ul>
            </nav>
        </nav>
    </header>
    <!-- Banner -->
    <div class="banner banner-producto">
        
    </div>


    <div class="container">
        <div class="columns">
            <div class="column is-two-fifths-desktop">
                <div class="slider" id="slider">
                    <div class="slider-img-container">
                        <img src="img/item-1.png" alt="camiseta" class="active slider-item">
                    </div>
                    <div class="slider-img-container">
                        <img src="img/item-2.png" alt="camiseta" class="slider-item">
                    </div>
                    <div class="slider-img-container">
                        <img src="img/item-5.png" alt="camiseta" class="slider-item">
                    </div>
                    <div class="slider-button-left slider-buttons" onClick="previus()">
                        <i class="zmdi zmdi-chevron-left zmdi-hc-3x"></i>
                    </div>
                    <div class="slider-button-right slider-buttons" onClick="next()">
                        <i class="zmdi zmdi-chevron-right zmdi-hc-3x"></i>
                    </div>
                </div>
            </div>
            <div class="column">
                <h3 class="is-size-4">Departamento: <?php 
                $conexion=mysqli_connect("localhost","root","") or die("Problemas en la conexion".mysql_error());
                if($conexion)
                {
                    mysqli_select_db($conexion,"tiendaropa") or die("Problemas en la seleccion de la base de datos");
                    $query="SELECT nombre_Departamento FROM departamento WHERE id_Departamento'".$consulta[6]."';";
                    $reg=mysqli_query($conexion,$query) or die("error query ".mysqli_error());
                    $tupla=mysqli_fetch_array($reg);
                    $nombre_Departamento=$tupla['nombre_Departamento'];
                    echo '<script> alert("el id es: '.$tupla['nombre_Departamento'].'"); </script>';
                }    
                //echo $consulta[6]; ?></h3>
                
                <h2 class="price is-size-4"><sup>$</sup>89.99</h2>
                <p class="has-text-grey"> <strong>Disponibilidad:</strong> En stock</p>
                <p class="has-text-grey"><strong>Código del procuto: </strong>#56843265</p>
                <p class="text-default">Detalles..</p>
                <form action="#" class="form-control">
                    <div class="columns is-multiline">
                        <div class="column is-one-third">
                            <label for="color">Color</label>
                            <select class="form-control-field" id="color">
                                <option value="#">Color 1</option>
                                <option value="#">Color 2</option>
                                <option value="#">Color 3</option>
                            </select>

                        </div>
                        <div class="column is-one-third">

                            <label for="size">Tamaño</label>
                            <select class="form-control-field" id="size">
                                <option value="#">Tamaño 1</option>
                                <option value="#">Tamaño 2</option>
                                <option value="#">Tamaño 3</option>
                            </select>
                        </div>
                        <div class="column is-one-third">
                            <label for="quality">Cantidad</label>
                            <input class="form-control-field" type="number">
                        </div>
                        <div class="column is-full is-marginless">
                            <button class="btn btn-default btn-outline"><i class="zmdi zmdi-shopping-cart"></i>
                                Agregar al carrito</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <div class="container">

        <div class="columns is-tablet">
            <div class="column">
                <div class="tabs-container">
                    <ul class="tabs" id="tabs">
                        <li class="tabs-item active-tab">Descripción</li>
                        <li class="tabs-item">Tamaños</li>
                        <li class="tabs-item">Envío y reembolso</li>
                    </ul>
                    <div class="tabs-panels">
                        <div class="tab-panel active-panel">
                            <div class="container">
                                <div class="columns">
                                    <div class="column">
                                        <h2 class="is-size-4">Descripción</h2>
                                        <p>Detalles..</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-panel">
                            <div class="container">
                                <div class="columns">
                                    <div class="column is-half">

                                        <div class="video-container">
                                            <iframe src="https://www.youtube.com/embed/MDgZLV6gqV0" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>

                                        
                                </div>
                            </div>
                        </div>
                        <div class="tab-panel">
                            <h2 class="is-size-4">Tamaños</h2>
                            <p>Detalles.</p>
                        </div>
                        <div class="tab-panel">
                            <h2 class="is-size-4">Envios y reembolsos</h2>
                            <p>Detalles</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="columns is-multiline">
                <div class="column">
                    <ul class="footer-ul">
                        <li class="footer-item">
                            <h3 class="has-text-weight-bold">Información</h3>
                        </li>
                        <li class="footer-item"><a class="footer-link" href="#">La marca</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Local stores</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Servicios </a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Privacidad y cookies</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Mapa del sitio</a></li>
                    </ul>
                </div>

                <div class="column">
                    <ul class="footer-ul">
                        <li class="footer-item">
                            <h3 class="has-text-weight-bold">Porqué comprar</h3>
                        </li>
                        <li class="footer-item"><a class="footer-link" href="#">Envios y retornos</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Envios seguros</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Testimonios </a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Award waining</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Etival trading</a></li>
                    </ul>
                </div>
                <div class="column">
                    <ul class="footer-ul">
                        <li class="footer-item">
                            <h3 class="has-text-weight-bold">Tu cuenta</h3>
                        </li>
                        <li class="footer-item"><a class="footer-link" href="#">Iniciar sesión</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Registro</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Ver carrito </a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Ver catálogo</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Track an order</a></li>
                    </ul>
                </div>
                <div class="column">
                    <ul class="footer-ul">
                        <li class="footer-item">
                            <h3 class="has-text-weight-bold">Catalogo</h3>
                        </li>
                        <li class="footer-item"><a class="footer-link" href="#">Catálogo para hombres</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Catálogo para mujeres</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Ver tu Catalogo </a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Privacidad y cookies</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Borrar tu catalogo</a></li>
                    </ul>
                </div>
                <div class="column">

                    <ul class="footer-ul">
                        <li class="footer-item">
                            <h3 class="has-text-weight-bold">Datos de contacto</h3>
                        </li>
                        <li class="footer-item"><a class="footer-link" href="#">Head</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Catálogo para mujeres</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Ver tu Catalogo </a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Privacidad y cookies</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Borrar tu catalogo</a></li>
                    </ul>
                </div>
                <div class="column is-full">
                    <div class="footer-socials">
                        <a class="footer-solcials-link" href="#"><i class="zmdi zmdi-facebook"></i></a>
                        <a class="footer-solcials-link" href="#"><i class="zmdi zmdi-twitter"></i></a>
                        <a class="footer-solcials-link" href="#"><i class="zmdi zmdi-instagram"></i></a>
                        <a class="footer-solcials-link" href="#"><i class="zmdi zmdi-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bar-top">
            <div class="container">
                <a class="footer-bar-top-links" href="#">2019 Avenue Fashion</a>
            </div>
        </div>
    </footer>
    <script src="js/main.js"></script>
</body>

</html>