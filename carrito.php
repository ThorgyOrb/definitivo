<?php
	session_start();
	
	$mensaje="";
	if(isset($_POST['btnAccion'])){
		switch($_POST['btnAccion']){
			case 'Agregar':
				if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
					$ID=openssl_decrypt($_POST['id'],COD,KEY);
					//$mensaje="Ok ID Correcto".$ID;
				}else{ $mensaje="ID incorrecto";break;}
				
				if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
					$NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
					//$mensaje.="nombre ok";
				}else{ $mensaje.="nombre incorrecto"; break;}
				
				if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
					$CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
					//$mensaje.="cantidad ok";
				}else{ $mensaje.="cantidad incorrecta"; break;}
				
				if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
					$PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
					//$mensaje.="precio ok";
				}else{ $mensaje.="precio incorrecto"; break;}
				
				if(is_string(openssl_decrypt($_POST['talla'],COD,KEY))){
					$TALLA=openssl_decrypt($_POST['talla'],COD,KEY);
					//$mensaje.="talla ok";
				}else{ $mensaje.="talla incorrecta"; break;}
				
				if(is_string(openssl_decrypt($_POST['marca'],COD,KEY))){
					$MARCA=openssl_decrypt($_POST['marca'],COD,KEY);
					//$mensaje.="marca ok";
				}else{ $mensaje.="marca incorrecta"; break;}
				
				if(!isset($_SESSION['CARRITO'])){
					$producto=array(
					'ID'=>$ID,
					'NOMBRE'=>$NOMBRE,
					'CANTIDAD'=>$CANTIDAD,
					'PRECIO'=>$PRECIO,
					'TALLA'=>$TALLA,
					'MARCA'=>$MARCA
					);
					$_SESSION['CARRITO'][0]=$producto;
					$mensaje="Producto agregado al carrito";
				}else{
				
					$idProductos=array_column($_SESSION['CARRITO'],"ID");//obtiene todos los id en el carrito de compras
					if(in_array($ID,$idProductos)){ //si id == id del producto a agregar 
						$num=0;
						foreach($_SESSION['CARRITO'] as $indice=>$producto){
							if($producto['ID']==$ID){
								$num=$producto['CANTIDAD']+1;
								unset($_SESSION['CARRITO'][$indice]); 
								$_SESSION['CARRITO']=array_values($_SESSION["CARRITO"]); 
								$productoN=array(
								'ID'=>$ID,
								'NOMBRE'=>$NOMBRE,
								'CANTIDAD'=>$num,
								'PRECIO'=>$PRECIO,
								'TALLA'=>$TALLA,
								'MARCA'=>$MARCA
								);
								array_push($_SESSION['CARRITO'], $productoN);
								$mensaje="Producto agregado al carrito";
								break;
							}
						}
					}else{
						$NumeroProductos=count($_SESSION['CARRITO']);
						$producto=array(
						'ID'=>$ID,
						'NOMBRE'=>$NOMBRE,
						'CANTIDAD'=>$CANTIDAD,
						'PRECIO'=>$PRECIO,
						'TALLA'=>$TALLA,
						'MARCA'=>$MARCA
						);
						//$_SESSION['CARRITO'][$NumeroProductos]=$producto;
						array_push($_SESSION['CARRITO'], $producto);
						$mensaje="Producto agregado al carrito";
					}
				}
				//$mensaje=print_r($_SESSION,true);
			break;
			case 'Eliminar':
				if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
					$ID=openssl_decrypt($_POST['id'],COD,KEY);
					foreach($_SESSION['CARRITO'] as $indice=>$producto){
						if($producto['ID']==$ID){
							unset($_SESSION['CARRITO'][$indice]); 
							$_SESSION['CARRITO']=array_values($_SESSION["CARRITO"]); 
							/*echo "<script>alert('Elemento borrado...');</script>";*/
							break;
						}
					}
				}else{ $mensaje="ID incorrecto".$_POST['id'];}
			break;
			
			
		}
	}
?>
