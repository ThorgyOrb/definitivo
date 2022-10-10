<?php
if( isset($_POST['nombre_Departamento']) && $_POST['nombre_Departamento']!="")
{
        $nombre_Departamento=$_POST['nombre_Departamento'];
        $id_departamento = $_POST['id_Departamento'];

        $conexion=mysqli_connect("localhost","root","") or die("Problemas en la conexion".mysql_error());
        if($conexion)
        {
            //echo "Se conecto exitosamente<br>";
            mysqli_select_db($conexion,"tiendaropa") or die("Problemas en la seleccion de la base de datos");
            //echo "Se conecto exitosamente a bd<br>";
            //actualizo la departamento
            $act="UPDATE `departamento` SET `nombre_Departamento` = '$nombre_Departamento' WHERE `departamento`.`id_Departamento` = '$id_departamento';";
                $reg=mysqli_query($conexion,$act) or die("error query ".mysqli_error());
				//echo "La consulta generada es: <br>".$query."<br>";
				if(mysqli_query($conexion,$act))
				{
					echo " <script> alert('Datos Guardados'); </script>";
					header("location: consultaDepartamento.php");
				}
				else echo "error<br>";
				mysqli_close($conexion);
			}
	}else{
		echo " <script> alert('Error'); </script>";
        header("location: mod_departamento.php");
	} 
?>