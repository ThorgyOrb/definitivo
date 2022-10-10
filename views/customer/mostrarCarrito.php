<?php
include 'config2.php';
include 'carrito.php';
include 'cabecera.php';
session_start();
?>
<div class="container">
<br><br><br><br>
<h3>Detalles del carrito</h3>

<?php if(!empty($_SESSION['CARRITO'])) { ?>
<table class="table table-light table-bordered">
	<tbody>
		<tr>
			<th width="40%" class="text-center">Articulo</th>
			<th width="15%" class="text-center">Precio</th>
			<th width="15%" class="text-center">Cantidad</th>
			<th width="15%" class="text-center">Total</th>
			<th width="15%" >---</th>
		</tr>
		<?php $total=0; ?>
		<?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
		<tr>
			<td widtd="40%" class="text-center"><?php echo $producto['NOMBRE']?></td>
			<td widtd="15%" class="text-center"><?php echo $producto['PRECIO']?></td>
			<td width="15%" class="text-center"><?php echo $producto['CANTIDAD']?></td>
			<td widtd="15%" class="text-center"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2); ?></td>
			<td widtd="15%" >
			
			<form action="" method="post">
				<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
				<button 
				class="badge text-bg-danger" 
				type="submit"
				name="btnAccion"
				value="Eliminar"
				>Eliminar</button>
			</form>
			</td>
		</tr>
		<?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']); 
		} ?>
		<tr>
			<td colspan="3" align="right"><h3>Total</h3></td>
			<td align="right"><h3>$<?php echo number_format($total,2);?></h3></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="5">
				
				<form action="pagar.php" method="post">
					<div class="d-grid gap-2">
						<button class="btn btn-outline-primary" type="submit"
						name="btnAccion"
						value="proceder">
						Proceder a pagar >>
						</button>
						<br />
					</div>
				</form>
			</td>
		<tr>
	</tbody>
</table>
<?php }else{ ?>
			<div class="alert alert-success">
				No hay productos en el carrito...
			</div>
<?php } ?> 
</div>
<?php include 'pie.php'; ?>
