<?php
    include 'conexion.php';
 
    require('fpdf186/fpdf.php');
    date_default_timezone_set('America/Mexico_City');

    $query = "SELECT ficha, fecha, hora FROM reservaciones WHERE id_cliente = '6'";
    $result = $conecta->query($query);

    $buscar = "SELECT nombre, apellido FROM clientes WHERE id_cliente = '6'";
    $resultado = $conecta->query($buscar);

    if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
    }

    $pdf = new FPDF('P', 'mm', array(80, 150));
    $pdf->AddPage();

    $pdf->Image('img/logo_foodweb.png', 0, 0, 35);

    $pdf->SetFont('Courier','B', 15);
    $pdf->SetXY(35, 5);
    $pdf->Cell(0, 10, 'FOODWEB', 0, 1, 'L');
    $pdf->SetFont('Courier', '', 10);
    $pdf->SetXY(35, 10);
    $pdf->Cell(0, 10, 'Miguel Coatlinchan', 0, 1, 'L');
    $pdf->SetXY(35, 15);
    $pdf->Cell(0, 10, '56250 Texcoco, Mex', 0, 1, 'L');
    $pdf->SetXY(35, 20);
    $pdf->Cell(0, 10, '595 921 3027', 0, 1, 'L');
    $pdf->SetXY(35, 25);
    $pdf->Cell(0, 10, 'www.FOODWEB.COM', 0, 1, 'L');
    $pdf->SetXY(5, 35); 
    $pdf->Cell(0, 10, '---------------------------------', 0, 1, 'L');
    $pdf->SetXY(5, 40); 
    $pdf->Cell(0, 10, 'TITULAR:', 0, 1, 'L');
    $pdf->SetXY(5, 45); 
    $pdf->Cell(0, 10, $nombre . ' ' . $apellido, 0, 1, 'L'); 
    $pdf->SetXY(5, 50);
    $pdf->Cell(0, 10, 'FECHA Y HORA:', 0, 1);
    $pdf->SetXY(5, 55);
    $pdf->Cell(0, 10,date('Y-m-d h:i'), 0, 1);
    $pdf->SetXY(5, 70); 
    $pdf->Cell(0, 10, '---------------------------------', 0, 1, 'L'); 
    $pdf->SetXY(5, 75);
    $pdf->Cell(0, 10, 'INFORMACION DE LA RESERVACION', 0, 1, 'L'); 

    $header = array('FICHA','FECHA','HORA');

    $pdf->SetXY(5,85);
    foreach ($header as $col) {
        $pdf->Cell(25, 0, $col, 0);
    }
    while ($row = $result->fetch_assoc()) {
        $pdf->Ln();
        $pdf->SetXY(5,85);
        foreach ($row as $col) {
            $pdf->Cell(25, 10, $col, 0);
        }
        break;
    }
    $pdf->SetXY(5, 90); 
    $pdf->Cell(0, 10, '---------------------------------', 0, 1, 'L'); 
    $pdf->SetXY(23, 95);
    $pdf->SetFont('Courier','', 15);
    $pdf->Cell(0, 10, 'CODIGO QR ', 0, 1, 'L');
    $pdf->Image('img/qr_foodweb.png', 20, 105, 35);
    $conecta->close();
    $pdf->Output();

?>
