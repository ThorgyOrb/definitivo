<?php
session_start();
if (isset($_POST['login'])) {
    include('database/config.php');
    $connect = mysqli_connect("localhost", $username, $password, $database) or die('No se pudo establecer la conexion');
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $userEmail = $_POST['email'];
        $userPassword = $_POST['password'];
        $sql = "SELECT * FROM cuentas WHERE correo = '$userEmail' AND contraseña = '$userPassword';";
        $result = mysqli_query($connect, $sql) or die("No se ha podido realizar la consulta");
        $user = mysqli_fetch_array($result);
        if ($user) {
            $rol = $user[3];
            if ($rol == 1) {
                header('location: views/admin/');
                $_SESSION['email'] = $userEmail;
                $_SESSION['id'] = $rol;
                $_SESSION['idCuenta'] = $user[0];
            } else {
                header('location: views/customer/');
                $_SESSION['email'] = $userEmail;
                $_SESSION['id'] = $rol;
                $_SESSION['idCuenta'] = $user[0];
            }
        }else{
            $mensaje = "Los datos ingresados son incorrectos";
        }
    }else{
        $mensaje = "Favor de rellenar los campos";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bulma.min.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.css">
    <link rel="stylesheet" href="css/styles.css">
    
    <title>Document</title>
</head>

<body>
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
                    <a href="login.php  " class="navbar-top-links">
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
                <a class="navbar-mobile-link has-text-white" href="index.php"><i class="zmdi zmdi-shopping-cart"></i> Vacio</a>
            </header>
            <nav class="nav-menu --nav-dark-light" id="mySidenav">

                <a class="is-hidden-mobile brand is-uppercase has-text-weight-bold has-text-dark" href="index.php">Online Boutique</a>
                <ul class="nav-menu-ul">
                    <li class="nav-menu-item" id="men">
                        <a class="nav-menu-link link-submenu" href="departamentocaballeros.php">Hombre</a>
                    </li>
                    <li class="nav-menu-item" id="women">
                        <a href="departamentodamas.php" class="nav-menu-link link-submenu">Mujer </a>
                    </li>
                    <li class="nav-menu-item"><a href="laMarca.php" class="nav-menu-link">La Marca</a></li>
                    <li class="nav-menu-item"><a href="lookbook.html" class="nav-menu-link">Look Book</a></li>
                    <li class="nav-menu-item"><a href="registro.php" class="nav-menu-link">Registro</a></li>
                    <li class="nav-menu-item"><a href="login.php" class="nav-menu-link active">Iniciar Sesión</a></li>
                </ul>
            </nav>
        </nav>
    </header>
    <!-- Banner -->
    <div class="banner banner-registro">
        <div class="banner-container ">
            <h1>Online Boutique</h1>
        </div>
    </div>

    <div class="container">
        <div class="columns">
            <div class="column">
            <center>  <h2 class="is-size-4">Iniciar sesión</h2></center>  <br>
                <form method="POST" action="login.php" class="form-control">
                    <br>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="staticEmail" placeholder="example@email.com">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword">
                    </div>
                </div>
                   
                    <input type="submit" name="login" value="Iniciar sesión" class="btn btn-default btn-primary" />
                </form>
            </div>
        </div>
        <div class="col-sm-6 forgot-w3l text-sm-right">
            <?php if (isset($mensaje)) {
                echo $mensaje;
            } ?>
           
        </div>
    </div>

    <!-- footer -->
    <footer class="footer">
        <div class="footer-bar-top">
            <div class="container">
                <a class="footer-bar-top-links" href="#">2019 Avenue Fashion</a>
            </div>
        </div>
    </footer>
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="js/main.js"></script>


</body>

</html>