<?php
	if( isset($_POST['nombre_Proveedor']) && $_POST['nombre_Proveedor']!="")
	{
			$nombre_Proveedor=$_POST['nombre_Proveedor'];
            $id_Proveedor = $_POST['id_Proveedor'];
			$conexion=mysqli_connect("localhost","root","") or die("Problemas en la conexion".mysql_error());
			if($conexion)
			{
				//echo "Se conecto exitosamente<br>";
				mysqli_select_db($conexion,"tiendaropa") or die("Problemas en la seleccion de la base de datos");
				//echo "Se conecto exitosamente a bd<br>";
                $act="UPDATE `proveedor` SET `nombre_Proveedor` = '$nombre_Proveedor' WHERE `proveedor`.`id_Proveedor` = '$id_Proveedor';";
                $reg=mysqli_query($conexion,$act) or die("error query ".mysqli_error());
				//echo "La consulta generada es: <br>".$query."<br>";
				if(mysqli_query($conexion,$act))
				{
					echo " <script> alert('Datos Guardados'); </script>";
					header("location: consultaProveedor.php");
				}
				else echo "error<br>";
				mysqli_close($conexion);
			}
	}else{
		echo " <script> alert('Error'); </script>";
        header("location: mod_proveedor.php");
	} 

?>