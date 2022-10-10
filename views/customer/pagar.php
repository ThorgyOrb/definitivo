<?php
include 'config2.php';
include 'conexion.php';
include 'carrito.php';
include 'cabecera.php';
$usuario = $_SESSION['email'];
?>
<br><br><br><br>
<?php
	if($_POST){
		$total=0;
		$SID=session_id();//aqui se debe recuperar el id del usuario
		foreach($_SESSION['CARRITO'] as $indice=>$producto){
			$total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
		}
		$sentencia=$pdo->prepare("INSERT INTO `tblventas` (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `status`) 
		VALUES (NULL,:ClaveTransaccion, '', NOW(),:Correo,:Total, 'Pendiente');");
		
		$sentencia->bindParam(":ClaveTransaccion",$SID);
		$sentencia->bindParam(":Correo",$usuario);
		$sentencia->bindParam(":Total",$total);
		$sentencia->execute();
		$idVenta=$pdo->lastInsertId();
		
		
		foreach($_SESSION['CARRITO'] as $indice=>$producto){
		
			$idProducto=$producto['ID'];
			$precio=$producto['PRECIO'];
			$cantidad=$producto['CANTIDAD'];
		    $query="INSERT INTO detalleventa (ID, IDVENTA, IDPRODUCTO,PRECIOUNITARIO, CANTIDAD, COMPRADO)  
			VALUES (NULL, $idVenta, $idProducto, $precio,$cantidad , 0)";

			$sentencia=$pdo->prepare($query);
			$sentencia->execute();
			//echo "<br> <br> <br> <br> <br>".$query. "<br>".$idVenta."     ".$producto['PRECIO']."    ".$producto['ID']."    ".$producto['CANTIDAD'];
			//echo $sentencia;
		}
		
	}
?>
<script>
	var total = <?php echo $total; ?>;
</script>
<div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
  <script src="https://www.paypal.com/sdk/js?client-id=ARD5veFAvdOHvRSfPaX2jWwHiOMZerrXSStfmV0gNhKfmw2QVqAC1EUklSSRiD_HaL2gFWGnHu3uf9Zs&enable-funding=venmo&currency=MXN" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"MXN","value":total}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';

            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();

</script>


<?php include 'pie.php'; ?>