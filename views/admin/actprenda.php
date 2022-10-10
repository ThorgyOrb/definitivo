<?php  
    include("db/config.php");
    session_start();
	$usuario=$_SESSION['email'];
	if (!isset($_SESSION['email'])) {
		header("location: ../../login.php");
	}
	if ($_SESSION['id'] != 1) {
		header("location: ../../login.php");
	}

			$img=$_FILES['img_prenda']['name'];
			if(isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['cantidad']) && isset($_POST['nombre_marca']) && isset($_POST['numero_Talla']) && isset($_POST['nombre_Departamento']) && isset($_POST['nombre_Proveedor']) && isset($_FILES['img_prenda']) && $_POST['precio']>0 && $_POST['cantidad']>0)
			{
					$nombre = $_POST['nombre'];
					$id_p= $_POST['id_Prenda'];
					$precio=$_POST['precio'];
					$cantidad=$_POST['cantidad'];
					$nombre_Marca=$_POST['nombre_marca'];
					$numero_Talla=$_POST['numero_Talla'];
					$nombre_Departamento=$_POST['nombre_Departamento'];
					$nombre_Proveedor=$_POST['nombre_Proveedor'];

					$conexion=mysqli_connect("localhost","root","") or die("Problemas en la conexion".mysql_error());
					if($conexion)
					{
						//echo "Se conecto exitosamente<br>";
						mysqli_select_db($conexion,"tiendaropa") or die("Problemas en la seleccion de la base de datos");
						
						
						$query="SELECT id_Marca FROM marca WHERE nombre_marca='".$nombre_Marca."';";
						$reg=mysqli_query($conexion,$query) or die("error query ".mysqli_error());
						$tupla=mysqli_fetch_array($reg);
						$id_Marca=$tupla['id_Marca'];
						
						$query="SELECT id_Talla FROM talla WHERE numero_Talla='".$numero_Talla."';";
						$reg=mysqli_query($conexion,$query) or die("error query ".mysqli_error());
						$tupla=mysqli_fetch_array($reg);
						$id_Talla=$tupla['id_Talla'];
						
						$query="SELECT id_Departamento FROM departamento WHERE nombre_Departamento='".$nombre_Departamento."';";
						$reg=mysqli_query($conexion,$query) or die("error query ".mysqli_error());
						$tupla=mysqli_fetch_array($reg);
						$id_Departamento=$tupla['id_Departamento'];
						
						$query="SELECT id_Proveedor FROM proveedor WHERE nombre_Proveedor='".$nombre_Proveedor."';";
						$reg=mysqli_query($conexion,$query) or die("error query ".mysqli_error());
						$tupla=mysqli_fetch_array($reg);
						$id_Proveedor=$tupla['id_Proveedor'];

						$ruta = "../../productos/".$img;
						$tipo = $_FILES['img_prenda']['type'];
						$tamano = $_FILES['img_prenda']['size'];
						$temp = $_FILES['img_prenda']['tmp_name'];
						$subir = move_uploaded_file($temp,$ruta);

						//Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
						if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
							echo'<br>';
							echo'<div class="alert alert-danger" role="alert">';
							echo'Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.';
							echo'</div>';
						}
						else{

							//actualizo la prenda
							$act1="UPDATE `prenda` SET `cantidad` = '$cantidad' WHERE `prenda`.`id_Prenda` = '$id_p'";
							$act="UPDATE `prenda` SET `precio` = '$precio', `cantidad` = '$cantidad', `id_Marca` = '$id_Marca', `id_Departamento` = '$id_Departamento', `id_Proveedor` = '$id_Proveedor', `img_prenda` = '$img', `nombre` = '$nombre' WHERE `prenda`.`id_Prenda` = '$id_p';";
							$reg=mysqli_query($conexion,$act) or die("error query ".mysqli_error());
							//header("location: /index.php");
							//echo "La consulta generada es: <br>".$query."<br>";
							//$datos=mysqli_query($conexion,$query) or die("error query ".mysqli_error());
							if(mysqli_query($conexion,$act))
							{
								
								echo " <script> alert('Datos Guardados'); </script>";
								header("location: consultaPrenda.php");
							}
							else echo "error<br>";
							mysqli_close($conexion);
						}
					}
			}else{
				echo " <script> alert('Error'); </script>";
			} 
?>