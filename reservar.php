<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/reservar.css">
    <title>Reservar</title>
</head>
<body>
    <div id="nav-placeholder"></div>
    <script>
        $(function(){
          $("#nav-placeholder").load("nav.php");
        });
    </script>
<div class="mainregistrar">
    <div class="registrar-box">
    <h2>Reservar</h2>
        <form action="reservar.php" method="post" id="reservacion">
        <div class="info-box informacion">
            <input type="date" name="fecha">
            <label>Fecha</label>
        </div>
        <div class="info-box informacion">
            <input type="time" name="hora">
            <label>Hora</label>
        </div>
        <div class="info-box radio">
        <div class="radio">
				<input type="radio" value="1" name="tipo_paquete">Desayuno<br>	
				<input type="radio" value="2" name="tipo_paquete">Comida<br>
				<input type="radio" value="3" name="tipo_paquete">Cena<br>
                <input type="radio" value="3" name="tipo_paquete">Buffet
				<label>Paquetes</label>
			</div>
        </div>
        <div class="info-box informacion">
            <input type="number" min="1" max="30" name="cantidad_personas">
            <label>Cantidad de personas</label>
        </div>
        <div class="info-box informacion">
            <input type="text" name="informacion_extra">
            <label>Informacion extra</label>
        </div>   
            <input class="botonRegistrar" type="submit" name="subir" value="Reservar">
        </form>
    </div>
</div>
<?php
include 'conexion.php';

function generarFicha($longitud = 8)
{
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longitudCaracteres = strlen($caracteres);
    $ficha = '';
    for ($i = 0; $i < $longitud; $i++) {
        $ficha .= $caracteres[rand(0, $longitudCaracteres - 1)];
    }
    return $ficha;
}

if (isset($_POST["subir"])) {
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $tipo_paquete = $_POST['tipo_paquete'];
    $cantidad_personas = $_POST['cantidad_personas'];
    $informacion_extra = $_POST['informacion_extra'];
    session_start();
    $usuario = $_SESSION['usuario'];

    if (isset($_SESSION['usuario'])) {
        $consulta = "SELECT id_usuario FROM usuarios_clientes WHERE usuario = '$usuario'";
        $resultado = mysqli_query($conecta, $consulta);

        if ($resultado) {
            $fila = mysqli_fetch_array($resultado);
            $id_usuario = $fila["id_usuario"];

            $buscar = "SELECT id_cliente FROM clientes WHERE id_usuario = '$id_usuario'";
            $resultadoBuscar = mysqli_query($conecta, $buscar);

            if ($resultadoBuscar) {
                $encontrar = mysqli_fetch_array($resultadoBuscar);
                $id_cliente = $encontrar["id_cliente"];

                // Generar la ficha para la reserva
                $ficha = generarFicha(10);

                // Ahora vamos a verificar si ya existe alguna reserva con la misma fecha y hora
                $verificar_reserva = "SELECT * FROM reservaciones WHERE fecha = '$fecha' AND hora = '$hora'";
                $resultado_verificar = mysqli_query($conecta, $verificar_reserva);

                if (mysqli_num_rows($resultado_verificar) > 0) {
                    echo '<script>alert("Ya existe una reserva para el día ' . $fecha . ' a las ' . $hora . '");</script>';
                } else {
                    // Si no hay reserva con esa fecha y hora, podemos proceder a hacer la nueva reserva
                    $reservacion = "INSERT INTO reservaciones(id_cliente,ficha,fecha,hora,tipo_paquete,cantidad_personas,informacion_extra) value ('$id_cliente','$ficha','$fecha','$hora','$tipo_paquete','$cantidad_personas','$informacion_extra')";
                    if (mysqli_query($conecta, $reservacion)) {
                        echo '<script>alert("Tu reservacion esta hecha, Dia: ' . $fecha . ' Hora: ' . $hora . ' Ficha: ' . $ficha . '");</script>';
                    } else {
                        echo "Error al reservar" . mysqli_error($conecta);
                    }
                }
            }
        } else {
            echo "Error al reservar" . mysqli_error($conecta);
        }
    } else {
        echo '<script>alert("INICIA SESION PARA RESERVAR");</script>';
    }
}
?>



</body>
</html>