<?php
    include 'conexion.php';
 
    require('fpdf186/fpdf.php');
    date_default_timezone_set('America/Mexico_City');

    $query = "SELECT * FROM reservaciones ";
    $result = $conecta->query($query);

    $pdf = new FPDF('L');
    $pdf->AddPage();

    $pdf->Image('img/logo_foodweb.png', 0, 0, 35);

    $pdf->SetFont('Courier','B', 15);
    $pdf->SetXY(35, 5);
    $pdf->Cell(0, 10, 'FOODWEB', 0, 1, 'R');
    $pdf->SetFont('Courier', '', 10);
    $pdf->SetXY(35, 10);
    $pdf->Cell(0, 10, 'Miguel Coatlinchan', 0, 1, 'R');
    $pdf->SetXY(35, 15);
    $pdf->Cell(0, 10, '56250 Texcoco, Mex', 0, 1, 'R');
    $pdf->SetXY(35, 20);
    $pdf->Cell(0, 10, '595 921 3027', 0, 1, 'R');
    $pdf->SetXY(35, 25);
    $pdf->Cell(0, 10, 'www.FOODWEB.COM', 0, 1, 'R');
    $pdf->SetXY(35, 30);
    $pdf->Cell(0, 10, 'FECHA Y HORA:', 0, 1, 'R');
    $pdf->SetXY(35, 35);
    $pdf->Cell(0, 10,date('Y-m-d h:i'), 0, 1, 'R');
    $pdf->SetXY(5, 40); 
    $pdf->Cell(0, 10, '----------------------------------------------------------------------------------------------------------------------------------------', 0, 1, 'L');

    $header = array('ID RESERVA','ID Cliente','FICHA','FECHA','HORA','PAQUETE','PERSONAS','INFO');

    //$pdf->SetXY(5,50);
    foreach ($header as $col) {
        $pdf->Cell(35, 10, $col, 1);
    }
    while ($row = $result->fetch_assoc()) {
        $pdf->Ln();
        //$pdf->SetXY(5,85);
        foreach ($row as $col) {
            $pdf->Cell(35, 5, $col, 1);
        }
        //break;
    }
    $conecta->close();
    $pdf->Output();

?>
