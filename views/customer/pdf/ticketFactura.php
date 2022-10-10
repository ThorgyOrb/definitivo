<?php
require('fpdf.php');
include '../pagar.php';
class PDF extends FPDF
{
	function Header()
	{
		$usuario = $_SESSION['email'];
		$idUsuario = $_SESSION['idCuenta'];

		$this->setY(12);
		$this->setX(10);
		
		$this->Image('img/ticket2.png',0,0,209);
		
		$this->SetFont('times', 'B', 13);
		
		$this->SetFont('Arial','',10);   
		$this->Text(17,83, $usuario);//aqui debe ir el NOMBRE DEL CLIENTE
		 
		$this->Text(112,83, date('d/m/Y'));
		
		$this->Text(57,93, '5256 7854 9114 6732');
		
		$this->Text(148,93,'ID CLIENTE:'. $idUsuario .'' );//aqui debe ir el ID cliente
		
		$this->Ln(50);
	}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(15);
$pdf->SetLeftMargin(20);
$pdf->SetRightMargin(20);

$pdf->setY(100);
$pdf->setX(10);
$pdf->Ln(10);

// En esta parte estan los encabezados
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20, 7, utf8_decode('Cod'),1,0,'C',0);
    $pdf->Cell(89, 7, utf8_decode('Articulo'),1,0,'C',0);
    $pdf->Cell(20, 7, utf8_decode('Cant'),1,0,'C',0);
    $pdf->Cell(20, 7, utf8_decode('Precio'),1,0,'C',0);
    $pdf->Cell(20, 7, utf8_decode('Total'),1,1,'C',0);
   
    $pdf->SetFont('Arial','',10);
	
	$total=0;
	
foreach($_SESSION['CARRITO'] as $indice=>$producto){
		
	$idProducto = $producto['ID'];
	$descripcion = $producto['NOMBRE'];
	$precio = $producto['PRECIO'];
	$cantidad = $producto['CANTIDAD'];
	$totalP = $precio * $cantidad;
	
	$pdf->Cell(20, 7, $idProducto,1,0,'C',0);
	$pdf->Cell(89, 7, $descripcion ,1,0,'L',0);
	$pdf->Cell(20, 7, $cantidad,1,0,'C',0);
	$pdf->Cell(20, 7, $precio,1,0,'C',0);
	$pdf->Cell(20, 7, $totalP,1,1,'C',0);
	
	$total = $total + $totalP;
}

    //Aqui inicia el for con todos los productos
/*for ($i=0; $i < 5; $i++) { 
   
    $pdf->Cell(20, 7, $i+1,1,0,'C',0);
    $pdf->Cell(89, 7, utf8_decode('Descripci�n del producto'),1,0,'L',0);
    $pdf->Cell(20, 7, utf8_decode('20'),1,0,'C',0);
    $pdf->Cell(20, 7, utf8_decode('5'),1,0,'C',0);
    $pdf->Cell(20, 7, utf8_decode('100'),1,1,'C',0);
    
}*/
//// Apartir de aqui esta la tabla con los subtotales y totales
		$pdf->Ln(10);
		$pdf->setX(129);
        $pdf->Cell(20,6,'Total',1,0);
        $pdf->Cell(40,6,$total,'1',1,'R');
$pdf->Output();
?>
