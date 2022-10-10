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
if( isset($_POST['nombre_marca']) && $_POST['nombre_marca']!="")
	{       
            $id_marca = $_POST['id_Marca'];
           // echo $id_marca;
			$nombre_Marca=$_POST['nombre_marca'];

			$conexion=mysqli_connect("localhost","root","") or die("Problemas en la conexion".mysql_error());
			if($conexion)
			{
				//echo "Se conecto exitosamente<br>";
				mysqli_select_db($conexion,"tiendaropa") or die("Problemas en la seleccion de la base de datos");
				//echo "Se conecto exitosamente a bd<br>";
				//actualizo la marca
				$act="UPDATE `marca` SET `nombre_marca` = '$nombre_Marca' WHERE `marca`.`id_Marca` = $id_marca;";
                $reg=mysqli_query($conexion,$act) or die("error query ".mysqli_error());
				//echo "La consulta generada es: <br>".$query."<br>";
				if(mysqli_query($conexion,$act))
				{
					echo " <script> alert('Datos Guardados'); </script>";
					header("location: consultaMarca.php");
				}
				else echo "error<br>";
				mysqli_close($conexion);
			}
	}else{
		echo " <script> alert('Error'); </script>";
        header("location: mod_marca.php");
	} 
?>