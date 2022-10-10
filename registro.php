
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <a class="navbar-mobile-link has-text-white" href="index.php">Online Boutique</a>
                <a class="navbar-mobile-link has-text-white" href="index.html"><i class="zmdi zmdi-shopping-cart"></i> Vacio</a>
            </header>
            <nav class="nav-menu --nav-dark-light" id="mySidenav">
                <a class="is-hidden-mobile brand is-uppercase has-text-weight-bold has-text-dark" href="index.php">Online Boutique</a>
                <ul class="nav-menu-ul">
                    <li class="nav-menu-item" id="men">
                        <a class="nav-menu-link link-submenu" href="departamentocaballeros.php">Hombre</a>
                    </li>
                    <li class="nav-menu-item" id="women">
                        <a href="departamentodamas.php" class="nav-menu-link link-submenu">Mujer</a>
                        
                    </li>
                    <li class="nav-menu-item"><a href="laMarca.php" class="nav-menu-link">La Marca</a></li>
                    <li class="nav-menu-item"><a href="registro.php" class="nav-menu-link active">Registro</a></li>
                    <li class="nav-menu-item"><a href="login.php" class="nav-menu-link">Iniciar Sesión</a></li>
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
                <h2 class="is-size-4">Registro</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-control">
                    <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control-field" required />

                    <input id="email" name="email" type="email" placeholder="Email" class="form-control-field" required />

                    <input id="password" name="password" type="password" placeholder="Password" class="form-control-field" required />

                    <input id="vpassword" name="vpassword" type="password" placeholder="Confirma tu password" class="form-control-field" required />

                    <input id="direccion" name="direccion" type="text" placeholder="Direccion" class="form-control-field" required />

                    <input type="submit" class="btn btn-default btn-primary" value="Registrar">
                </form>
                <div class="col-sm-6 forgot-w3l text-sm-right">
                    <?php if (isset($mensaje)) {
                        echo $mensaje;
                    } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="footer">
        <div class="footer-bar-top">
            <div class="container">
                <a class="footer-bar-top-links" href="#">2019 Online Boutique</a>
            </div>
        </div>
    </footer>
    <script src="js/main.js"></script>


</body>

</html>
<?php
function inicio()
{
    echo "<script>alert('Usuario registrado con exito.');</script>";
    echo "<script> window.open('login.php');</script>";
    echo "<script> window.close();</script>";
}

include("database/config.php");
if (isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['password']) && $_POST['password'] != "" && isset($_POST['vpassword']) && $_POST['vpassword'] != "") {
    $conexion = mysqli_connect("localhost", $username, $password) or die("No se hizo la conexion");
    if ($conexion) {
        if($_POST['password'] == $_POST['vpassword']){
            mysqli_select_db($conexion, $database) or die("Hubo un error");
            $query = "INSERT INTO cuentas(correo, contraseña, id_Rol) VALUES ('$_POST[email]', '$_POST[password]' , 2);";
            echo $result = mysqli_query($conexion, $query);
            mysqli_close($conexion);

            $conexion = mysqli_connect("localhost", $username, $password) or die("No se hizo la conexion");
            mysqli_select_db($conexion, $database) or die("Hubo un error");
            $query2 = "SELECT * FROM cuentas WHERE correo = '$_POST[email]'";
            $result1 = mysqli_query($conexion, $query2) or die("Hubo un error durante la consulta");
            $user = mysqli_fetch_array($result1);
            $a = $user[0];
            $query1 = "INSERT INTO cliente(nombre_Cliente, direccion, id_Cuenta) VALUES ('$_POST[nombre]','$_POST[direccion]',$a);";
            $result2 = mysqli_query($conexion, $query1);
            (mysqli_query($conexion, $query)) ? inicio() : print "Datos no guardados";
            mysqli_close($conexion);
        }else{
            $mensaje = "Las contraseñas no coinciden";
        }
    }
}
?>