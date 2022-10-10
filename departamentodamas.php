<?php
include 'config2.php';
include 'conexion.php';
include 'cabecera.php';
include 'carrito.php';
?>
<title>damas</title>
<div class="grid-block" style="background-image: url('img/dama3.png'); ">
	<div class="banner banner-cover">
        <div class="banner-container ">
            <marquee SCROLLAMOUNT=30><h1 class="title-cover">DAMAS         </h1></marquee>
        </div>
    </div>
</div>
<div class="container">
		<br>
		<?php if($mensaje!=""){?>
			<div class="alert alert-secondary">
				<?php echo $mensaje;?>
				<a href="mostrarCarrito.php" class="badge bg-secondary">Ver carrito</a>
			</div>
		<?php } ?>
		<div class="row">
		<?php
			$sentencia=$pdo->prepare("SELECT * from prenda WHERE id_Departamento=1");
			$sentencia->execute();
			$listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
			//print_r($listaProductos);
		?>
		<?php foreach($listaProductos as $producto){ 
			//<!-- PRODUCTOOOOSSSS----------------------------->
				$id_prenda = $producto['id_Prenda'];
				$precio = $producto['precio'];
				$cantidad = $producto['cantidad'];
				$id_marca = $producto['id_Marca'];
				$id_talla = $producto['id_Talla'];
				$id_departamento = $producto['id_Departamento'];
				$id_Proveedor = $producto['id_Proveedor'];
				$nombre=$producto['nombre'];
				
				$marca = $pdo->prepare("SELECT nombre_marca from marca where id_marca='$id_marca'");
				$marca->execute();
				$marca=$marca->fetchAll(PDO::FETCH_ASSOC);
				$marca=implode(' ',$marca[0]);
				
				$talla = $pdo->prepare("SELECT numero_Talla from talla where id_Talla='$id_talla'");
				$talla->execute();
				$talla=$talla->fetchAll(PDO::FETCH_ASSOC);
				$talla=implode(' ',$talla[0]);
				echo '<div class="col-3">';
				echo '<div class="card">';
				echo '<img title="Titulo del producto" height="317px" class="card-img.top" src="productos/'.$producto['img_prenda'].'">';
				?>
					<div class="card-body"
					<h3><?php echo $producto['nombre'];?></h3>
						<h5 class="card-title">$<?php echo $producto['precio'];?></h5>
						<p class="card-text">Talla: <?php echo $talla;?>,  Marca: <?php echo $marca;?></p>
						<form action="" method="post">
							<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id_Prenda'],COD,KEY);?>">
							<input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'],COD,KEY);?>">
							<input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'],COD,KEY);?>">
							<input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
							<input type="hidden" name="talla" id="talla" value="<?php echo openssl_encrypt($talla,COD,KEY);?>">
							<input type="hidden" name="marca" id="marca" value="<?php echo openssl_encrypt($marca,COD,KEY);?>">
							<button class="btn btn--mini-rounded" 
								name="btnAccion" 
								value="Agregar" 
								type="submit"
								>
							<i class="zmdi zmdi-shopping-cart"></i></button>
						</form>
					</div>
				</div>
			</div>
<!-- PRODUCTOOOOSSSS ----------------------------->
		<?php } ?>
		</div>
		<?php include 'pie.php'; ?>
		
		

			
			

                