<?php

session_start();
$usuario = $_SESSION['email'];
if (!isset($_SESSION['email'])) {
	header("location: ../../login.php");
}
if ($_SESSION['id'] != 1) {
	header("location: ../../login.php");
}
$consulta = consultarproductos($_GET['ropa']);
function consultarproductos($prenda)
{
	$conexion = mysqli_connect("localhost", "root", "") or die("error en la conexion");
	if ($conexion) {
		mysqli_select_db($conexion, "tiendaropa") or die("ERROR bd");
		$mostrar = "SELECT * FROM prenda WHERE id_Prenda ='" . $prenda . "';";
		$resultado = $conexion->query($mostrar) or die("error al ver la prenda" . mysqli_error($conexion));
		$filas = $resultado->fetch_assoc();
		return [
			$filas['id_Prenda'],
			$filas['precio'],
			$filas['cantidad'],
			$filas['id_Marca'],
			$filas['id_Talla'],
			$filas['id_Departamento'],
			$filas['id_Proveedor'],
			$filas['nombre']
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
	<link rel="stylesheet" href="css/bulma.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.css">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styles.css">
	<title>Modificar Prenda</title>
</head>

<body>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="../../css/bulma.min.css">
		<link rel="stylesheet" href="../../css/material-design-iconic-font.css">
		<meta charset="utf-8">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

		<link rel="stylesheet" href="../../css/styles.css">
		<title>Index</title>
	</head>

	<body>

		<!-- Barra de navegación -->
		<header>
			<nav class="navbar-top">
				<ul class="navbar-top-ul">
					<li class="navbar-top-item">
						<?php
						echo '<p class="navbar-top-links">Bienvenido ' . $usuario . '</p>';
						?>
					</li>
					<li class="navbar-top-item">
						<a href="login.php" class="navbar-top-links">Cerrar sesión</a>
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
					<a class="navbar-mobile-link has-text-white" href="index.php"><i class="zmdi zmdi-shopping-cart"></i> Vacio</a>
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
						<li class="nav-menu-item" id="women">
							<a href="#" class="nav-menu-link link-submenu">Prenda<i class="zmdi zmdi-chevron-down"></i> </a>
							<div class="container-sub-menu">
								<ul class="sub-menu-ul">
									<li class="nav-menu-item ">
									<li class="nav-menu-item"><a class="nav-menu-link" href="altaPrenda.php">Altas</a></li>
									<li class="nav-menu-item"><a class="nav-menu-link" href="bajaPrenda.php">Bajas</a></li>
									<li class="nav-menu-item"><a class="nav-menu-link" href="consultaPrenda.php">Consultas</a></li>

						</li>
					</ul>
					</div>
					</li>
					<li class="nav-menu-item" id="women">
						<a href="#" class="nav-menu-link link-submenu">Marca<i class="zmdi zmdi-chevron-down"></i> </a>
						<div class="container-sub-menu">
							<ul class="sub-menu-ul">
								<li class="nav-menu-item ">
								<li class="nav-menu-item"><a class="nav-menu-link" href="altaMarca.php">Altas</a></li>
								<li class="nav-menu-item"><a class="nav-menu-link" href="bajaMarca.php">Bajas</a></li>
								<li class="nav-menu-item"><a class="nav-menu-link" href="consultaMarca.php">Consultas</a></li>

					</li>
					</ul>
					</div>
					</li>
					<li class="nav-menu-item" id="women">
						<a href="#" class="nav-menu-link link-submenu">Talla<i class="zmdi zmdi-chevron-down"></i> </a>
						<div class="container-sub-menu">
							<ul class="sub-menu-ul">
								<li class="nav-menu-item ">
								<li class="nav-menu-item"><a class="nav-menu-link" href="altaTalla.php">Altas</a></li>
								<li class="nav-menu-item"><a class="nav-menu-link" href="bajaTalla.php">Bajas</a></li>
								<li class="nav-menu-item"><a class="nav-menu-link" href="consultaTalla.php">Consultas</a></li>

					</li>
					</ul>
					</div>
					</li>
					<li class="nav-menu-item" id="women">
						<a href="#" class="nav-menu-link link-submenu">Departamento<i class="zmdi zmdi-chevron-down"></i> </a>
						<div class="container-sub-menu">
							<ul class="sub-menu-ul">
								<li class="nav-menu-item ">
								<li class="nav-menu-item"><a class="nav-menu-link" href="altaDepartamento.php">Altas</a></li>
								<li class="nav-menu-item"><a class="nav-menu-link" href="bajaDepartamento.php">Bajas</a></li>
								<li class="nav-menu-item"><a class="nav-menu-link" href="consultaDepartamento.php">Consultas</a></li>

					</li>
					</ul>
					</div>
					</li>
					<li class="nav-menu-item" id="women">
						<a href="#" class="nav-menu-link link-submenu">Provedor<i class="zmdi zmdi-chevron-down"></i> </a>
						<div class="container-sub-menu">
							<ul class="sub-menu-ul">
								<li class="nav-menu-item ">
								<li class="nav-menu-item"><a class="nav-menu-link" href="altaProveedor.php">Altas</a></li>
								<li class="nav-menu-item"><a class="nav-menu-link" href="bajaProveedor.php">Bajas</a></li>
								<li class="nav-menu-item"><a class="nav-menu-link" href="consultaProveedor.php">Consultas</a></li>

					</li>
					</ul>
					</div>
					</li>
					<li class="nav-menu-item"><a href="index.php" class="nav-menu-link">Inicio</a></li>
					</ul>
				</nav>
			</nav>
		</header>
		<!-- Banner -->
		<div class="banner banner-registro">
			<div class="banner-container ">
				<h1>ONBOU</h1>
				<h2>ALTA DE PRENDAS</h2>
			</div>
		</div>
		<div class="container">
			<div class="columns">
				<div class="column">

					<div class="container">
						<div class="columns">
							<div class="column is-half">
								<br><br>
								<img src="img/ropaColgada.jpg" alt="">
							</div>
							<div class="column is-half">
								<form action="actprenda.php" enctype="multipart/form-data" METHOD="post">
									<center>
										<h2 class="is-size-4">Tabla Prenda</h2>
									</center>
									<br>

									<div class="input-group mb-3">
										<span class="input-group-text">ID: </span>
										<input type="entero" name="id_Prenda" style="pointer-events:none;" value="<?php echo $consulta[0]; ?>" class="form-control">

									</div>


									<div class="input-group mb-3">
										<span class="input-group-text">Precio: $</span>
										<input type="entero" name="precio" placeholder="Precio" value="<?php echo $consulta[1]; ?>" class="form-control" aria-label="Amount (to the nearest dollar)" require>

									</div>

									<div class="input-group input-group-sm mb-3">
										<span class="input-group-text" id="inputGroup-sizing-sm">Cantidad </span>
										<input type="entero" name="cantidad" placeholder="Cantidad" value="<?php echo $consulta[2]; ?>" class="form-control" aria-label="Sizing example input" placeholder="Id Prenda" aria-describedby="inputGroup-sizing-sm" require>
									</div>

									<?php
									$conexion = mysqli_connect("localhost", "root", "") or die("error en la conexion");
									if ($conexion) {
										mysqli_select_db($conexion, "tiendaropa") or die("ERROR bd");
										$query = "SELECT * FROM marca;";
										$registros = mysqli_query($conexion, $query) or die("error query " . mysqli_error());
										echo '<div class="input-group mb-3">';
										echo '<label class="input-group-text" for="inputGroupSelect01">Marca</label>';
										echo '<select class="form-select" id="inputGroupSelect01"  name="nombre_marca" >';
										echo '<option selected>Selecciona una opción</option>';
										while ($tupla = mysqli_fetch_array($registros)) {
											echo "<option value=" . $tupla['nombre_marca'] . ">" . $tupla['nombre_marca'] . "</option>";
										}
									}
									mysqli_close($conexion);
									echo '</select>';
									echo '</div>';

									$conexion = mysqli_connect("localhost", "root", "") or die("error en la conexion");
									if ($conexion) {
										mysqli_select_db($conexion, "tiendaropa") or die("ERROR bd");
										$query = "SELECT * FROM talla;";
										$registros = mysqli_query($conexion, $query) or die("error query " . mysqli_error());
										echo '<div class="input-group mb-3">';
										echo '<label class="input-group-text" for="inputGroupSelect01">Talla</label>';
										echo '<select class="form-select" id="inputGroupSelect01"  name="numero_Talla" >';
										echo '<option selected>Selecciona una opción</option>';
										while ($tupla = mysqli_fetch_array($registros)) {
											echo "<option value=" . $tupla['numero_Talla'] . ">" . $tupla['numero_Talla'] . "</option>";
										}
										mysqli_close($conexion);
										echo '</select>';
										echo '</div>';
									}


									$conexion = mysqli_connect("localhost", "root", "") or die("error en la conexion");
									if ($conexion) {
										mysqli_select_db($conexion, "tiendaropa") or die("ERROR bd");
										$query = "SELECT * FROM departamento;";
										$registros = mysqli_query($conexion, $query) or die("error query " . mysqli_error());
										echo '<div class="input-group mb-3">';
										echo '<label class="input-group-text" for="inputGroupSelect01">Departamento</label>';
										echo '<select class="form-select" id="inputGroupSelect01"  name="nombre_Departamento">';
										echo '<option selected>Selecciona una opción</option>';

										while ($tupla = mysqli_fetch_array($registros)) {
											echo "<option value=" . $tupla['nombre_Departamento'] . ">" . $tupla['nombre_Departamento'] . "</option>";
										}
										mysqli_close($conexion);
										echo '</select>';
										echo '</div>';
									}

									$conexion = mysqli_connect("localhost", "root", "") or die("error en la conexion");
									if ($conexion) {
										mysqli_select_db($conexion, "tiendaropa") or die("ERROR bd");
										$query = "SELECT * FROM proveedor;";
										$registros = mysqli_query($conexion, $query) or die("error query " . mysqli_error());

										echo '<div class="input-group mb-3">';
										echo '<label class="input-group-text" for="inputGroupSelect01">Proveedor</label>';
										echo '<select class="form-select" id="inputGroupSelect01"  name="nombre_Proveedor" >';
										echo '<option selected>Selecciona una opción</option>';
										while ($tupla = mysqli_fetch_array($registros)) {
											echo "<option value=" . $tupla['nombre_Proveedor'] . ">" . $tupla['nombre_Proveedor'] . "</option>";
										}
										mysqli_close($conexion);
										echo '</select>';
										echo '</div>';
									}
									echo '<div class="input-group mb-3">';
									echo '<input type="file" name="img_prenda" class="form-control" id="inputGroupFile02">';

									echo '</div>';
									echo '<div class="input-group mb-3">';
									echo '<span class="input-group-text">Nombre: </span>';
									echo '<input type="text" name="nombre" placeholder="Nombre" value=" ' . $consulta[7] . '" class="form-control"  >';

									echo '</div>	';

									?>

									<?php echo '<center><button type="submit" name="" class="btn btn-default btn-primary">Guardar</button><br></center>'; ?>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- footer -->
		<footer class="footer">
			<div class="footer-bar-top">
				<div class="container">
					<a class="footer-bar-top-links" href="#">2022 ONBOU</a>
				</div>
			</div>
		</footer>
		<script src="js/main.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	</body>

</html>