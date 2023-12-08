<?php
    include 'conexion.php';
 
    require('fpdf186/fpdf.php');

// Conexión a la base de datos

// Consulta a la base de datos
$query = "SELECT * FROM empleados";
$result = $conecta->query($query);

// Crear instancia de FPDF con orientación vertical y tamaño personalizado para un ticket
$pdf = new FPDF('P', 'mm', array(80, 150)); // 'P' representa la orientación vertical, 'mm' es la unidad de medida y se establece el tamaño del array para el ancho y el alto
$pdf->AddPage();

// Calcular el ancho máximo de cada columna
$ancho_maximo = array();

// Obtener la primera fila para determinar el número de columnas
$first_row = $result->fetch_assoc();
$num_columns = count($first_row);

// Inicializar el ancho máximo para cada columna
for ($i = 0; $i < $num_columns; $i++) {
    $ancho_maximo[] = 0;
}

// Calcular el ancho máximo para cada columna
$result->data_seek(0); // Reiniciar el puntero del resultado para volver a recorrer los datos
while ($row = $result->fetch_assoc()) {
    foreach ($row as $indice => $col) {
        $longitud = $pdf->GetStringWidth($col); // Usar GetStringWidth para obtener el ancho del texto
        if ($longitud > $ancho_maximo[$indice]) {
            $ancho_maximo[$indice] = $longitud;
        }
    }
}

// Configurar el ancho de las columnas y la fuente
$pdf->SetFont('Arial', '', 12); // Establecer la fuente y el tamaño

foreach ($ancho_maximo as $ancho) {
    $pdf->Cell($ancho + 2, 10, '', 1); // Ajustar el ancho y agregar un pequeño espacio adicional
}

// Agregar filas
$result->data_seek(0); // Reiniciar el puntero del resultado para volver a recorrer los datos
while ($row = $result->fetch_assoc()) {
    $pdf->Ln();
    foreach ($row as $indice => $col) {
        $pdf->Cell($ancho_maximo[$indice] + 2, 10, $col, 1); // Ajustar el ancho y agregar un pequeño espacio adicional
    }
}

// Cerrar conexión a la base de datos
$conn->close();

// Salida del PDF
$pdf->Output();
?>
