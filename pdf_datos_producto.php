<?php
session_start();
if (!isset($_SESSION['nomuser'])) 
{
    header('location:bienvenida.php');
}
require('fpdf/fpdf.php');
require('dbconnect.php');

class PDF extends FPDF
{
    //CABECERA DE PAGINA
    function HEADER()
    {
        //LOGO
        $this->image('img/logotipo.png',10,8,33);

        $this->setFont('Arial','B',15);
        //Movernos a la derecha

        $this->Cell(60);
        //titulo

        //colores

        $this->SetTextColor(10,10,255);
        $this->SetFillColor(235,235,200);
        
        //

        $this->Cell(170,15,'Datos de cada Productos',0,0,'C');

        //salto de linea

        $this->ln(20);

        
    }

    //pie de pagina
    function footer()
    {
        //posicion: a 1,5 cm del final
        $this->SetY(-15);

        //arial italic 8

        $this->SetFont('Arial','I',8);

        //Numero de pagina

        $this->Cell(0,10,'page'.$this->PageNo().'/{nb}',0,0,'C');
    }
}

//Creacion del objeto del objeto de la clase heredada
$pdf = new PDF('L');
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$y_axis_initial = 45;

//print colum title
//**************PASO 1***************
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',10);
$pdf->SetY($y_axis_initial);
$pdf->SetX(15);
$pdf->Cell(18,12,'CODIGO',1,0,'C',1);
$pdf->Cell(185,12,'PRODUCTO',1,0,'C',1);
$pdf->Cell(16,12,'PRECIO',1,0,'C',1);
$pdf->Cell(14,12,'STOCK',1,0,'C',1);
$pdf->Cell(14,12,'UNIDS.',1,0,'C',1);
$pdf->Cell(12,12,'CAT.',1,0,'C',1);
$pdf->Cell(14,12,'PROVE',1,0,'C',1);


//Set row height
$row_height = 10;
$y_axis = 50;
$y_axis = $y_axis + $row_height;
//**************PASO 2***************
//Select the products you want to show in your pdf file
$query= "Select * from producto order By codprod";
$result = mysqli_query($link,$query);

//initialize counter
$i=0;

//set maximum rows per page
$max =25;
while($row = mysqli_fetch_array($result))
{
    //if the current row is the last one, create new page and print colum title
    if($i == $max)
    {
        $pdf->AddPage();

        //print column tittles for the current page
        $pdf->SetY($y_axis_initial);
        $pdf->SetX(6);
        $pdf->Cell(30,6,'codprod',1,0,'L,1');
        $pdf->Cell(130,6,'nomprod',1,0,'L,1');
        $pdf->Cell(20,6,'preunitprod',1,0,'L,1');
        $pdf->Cell(20,6,'unistockprod',1,0,'L,1');

        //go to next row
        $y_axis = $y_axis + $row_height;

        //Set $i variable to 0 (first row)

        $i= 0;

    }
    

    $codigo = $row['codprod'];
    $nomprod = $row['nomprod']; 
    $precio_unidad = $row['preunitprod'];
    $cant_unidades_almacen = $row['unistockprod'];
    $unidades_pedido_prod = $row['unipedprod'];
    $codigo_categoria = $row['codcat'];
    $codigo_proveedor = $row['codprove'];

    $pdf->SetY($y_axis);
    $pdf->SetX(15);
    $pdf->Cell(18,12,$codigo,1,0,'C',1);
    $pdf->Cell(185,12,$nomprod,1,0,'J',1);
    $pdf->Cell(16,12,$precio_unidad.' $',1,0,'C',1);
    $pdf->Cell(14,12,$cant_unidades_almacen,1,0,'C',1);
    $pdf->Cell(14,12,$unidades_pedido_prod,1,0,'C',1);
    $pdf->Cell(12,12,$codigo_categoria,1,0,'C',1);
    $pdf->Cell(14,12,$codigo_proveedor,1,0,'C',1);

    //MultiCell(float w, float h, string txt [, mixed border [, string align [, boolean fill]]])


    //Go to next row

    $y_axis = $y_axis + $row_height;
    $i = $i +1;    
}
$pdf->Output();

?>