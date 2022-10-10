<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bulma.min.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.css">
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="css/styles.css">
    <title>cabecera</title>
</head>

<body>
    <header>
        <nav class="navbar-top">
            <ul class="navbar-top-ul">
                <li class="navbar-top-item">
                    <a href="login.php" class="navbar-top-links">
                        <i class="zmdi zmdi-shopping-cart"></i>
                        Carrito(<?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']); ?>)
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
            <nav class="nav-menu --nav-dark-light" id="mySidenav">


                <a class="is-hidden-mobile brand is-uppercase has-text-weight-bold has-text-dark" href="index.php">Online Boutique</a>
                <ul class="nav-menu-ul">
                    <li class="nav-menu-item"><a href="departamentocaballeros.php" class="nav-menu-link">Hombre</a></li>
                    <li class="nav-menu-item"><a href="departamentodamas.php" class="nav-menu-link ">Mujer</a></li>
                    <li class="nav-menu-item"><a href="laMarca.php" class="nav-menu-link">La Marca</a></li>
                    <li class="nav-menu-item"><a href="registro.php" class="nav-menu-link">Registro</a></li>
                    <li class="nav-menu-item"><a href="login.php" class="nav-menu-link">Iniciar Sesion</a></li>
                </ul>
            </nav>
        </nav>
    </header>
    <!-- Banner -->