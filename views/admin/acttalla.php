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


if( isset($_POST['numero_Talla']) && $_POST['numero_Talla']!="")
{
        $id_talla = $_POST['id_Talla'];
        //echo $id_talla;
        $numero_Talla=$_POST['numero_Talla'];

        $conexion=mysqli_connect("localhost","root","") or die("Problemas en la conexion".mysql_error());
        if($conexion)
        {
            //echo "Se conecto exitosamente<br>";
			mysqli_select_db($conexion,"tiendaropa") or die("Problemas en la seleccion de la base de datos");
				
            $act="UPDATE `talla` SET `numero_Talla` = '$numero_Talla' WHERE `talla`.`id_Talla` = '$id_talla';";
            $reg=mysqli_query($conexion,$act) or die("error query ".mysqli_error());
				//echo "La consulta generada es: <br>".$query."<br>";
				if(mysqli_query($conexion,$act))
				{
					echo " <script> alert('Datos Guardados'); </script>";
					header("location: consultaTalla.php");
				}
				else echo "error<br>";
				mysqli_close($conexion);
			}
	}else{
		echo " <script> alert('Error'); </script>";
        header("location: modtalla.php");
	} 

?>