<?php
require('fpdf/fpdf.php');
require('dbconnect.php');
$codprov=$_POST['combo_proveedor'];

//Select the products you want to show in your pdf file
$query2= "Select * from proveedor where codprove='".$codprov."' order By codprove";
$result2 = mysqli_query($link,$query2);


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

        $this->SetTextColor(0,0,0);
        $this->SetFillColor(255,255,255);
        
        //

        
        $this->Cell(170,15,'Datos de Proveedor',0,0,'C');

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
$pdf->SetTextColor(242,120,50);
$pdf->SetFillColor(0,0,0);
$y_axis_initial = 45;

//print colum title

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',10);
$pdf->SetY($y_axis_initial);
$pdf->SetX(15);
$pdf->Cell(40,9,'PROVEEDOR',1,0,'C',1);
$pdf->Cell(40,9,'CARGO',1,0,'C',1);
$pdf->Cell(18,9,'CODIGO',1,0,'C',1);
$pdf->Cell(40,9,'NOMBRE EMPRESA',1,0,'C',1);
$pdf->Cell(26,9,'CIUDAD',1,0,'C',1);
$pdf->Cell(40,9,'MUNICIPIO',1,0,'C',1);
$pdf->Cell(22,9,'COD. POST.',1,0,'C',1);
$pdf->Cell(22,9,'COD. AREA',1,0,'C',1);
$pdf->Cell(30,9,'Numero',1,0,'C',1);




//Set row height
$row_height = 5;
$y_axis = 49;
$y_axis = $y_axis + $row_height;





//initialize counter
$i=0;

//set maximum rows per page
$max =25;
while($row = mysqli_fetch_array($result2))
{
    //if the current row is the last one, create new page and print colum title
    if($i == $max)
    {
        $pdf->AddPage();

        //print column tittles for the current page
        $pdf->SetY($y_axis_initial);
        $pdf->SetX(6);
        $pdf->Cell(18,6,'CODIGO',1,0,'C',1);
        $pdf->Cell(30,6,'PRODUCTO',1,0,'C',1);
        $pdf->Cell(20,6,'PRECIO',1,0,'C',1);
        $pdf->Cell(20,6,'STOCK',1,0,'C',1);
        $pdf->Cell(18,6,'CODIGO',1,0,'C',1);
        $pdf->Cell(30,6,'PRODUCTO',1,0,'C',1);
        $pdf->Cell(20,6,'PRECIO',1,0,'C',1);
        $pdf->Cell(20,6,'STOCK',1,0,'C',1);

        //go to next row
        $y_axis = $y_axis + $row_height;

        //Set $i variable to 0 (first row)

        $i= 0;

    }
    $cargoprove = $row['cargoprove'];
    $codprove = $row['codprove'];
    $nomempprovee = $row['nomempprove'];
    $ciudad = $row['ciudad'];
    $municipio = $row['municipio'];
    $codpostal = $row['codpostal'];
    $codarea = $row['codarea'];
    $nomprove = $row['nomprove'];
    $numprove = $row['numprove'];
    

    $pdf->SetY($y_axis);
    $pdf->SetX(15);
    $pdf->Cell(40,6,$nomprove,1,0,'C',1);
    $pdf->Cell(40,6,$cargoprove,1,0,'C',1);
    $pdf->Cell(18,6,$codprove,1,0,'C',1);
    $pdf->Cell(40,6,$nomempprovee,1,0,'C',1);
    $pdf->Cell(26,6,$ciudad,1,0,'C',1);
    $pdf->Cell(40,6,$municipio,1,0,'C',1);
    $pdf->Cell(22,6,$codpostal,1,0,'C',1);
    $pdf->Cell(22,6,$codarea,1,0,'C',1);
    $pdf->Cell(30,6,$numprove,1,0,'C',1);
    
   

    //Go to next row

    $y_axis = $y_axis + $row_height;
    $i = $i +1;    
}
$pdf->Output();
