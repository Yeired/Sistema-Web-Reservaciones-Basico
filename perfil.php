<?php
include 'conexion.php';
    session_start();
    $usuario = $_SESSION['usuario'];
    if (isset($_SESSION['usuario'])) {
        $consulta = "SELECT id_usuario FROM usuarios_clientes WHERE usuario = '$usuario'";
        $resultado = mysqli_query($conecta, $consulta);

        if ($resultado) {
            $fila = mysqli_fetch_array($resultado);
            $id_usuario = $fila["id_usuario"];

            $obtenerReservacion = "SELECT id_cliente FROM clientes WHERE id_usuario = '$id_usuario'";
            $resultadoReservacion = mysqli_query($conecta, $obtenerReservacion);

            $filaCliente = mysqli_fetch_array($resultadoReservacion);
            $id_cliente = $filaCliente["id_cliente"];

            $buscarReservacion = "SELECT * FROM reservaciones WHERE id_cliente = '$id_cliente'";
            $reservacion = $conecta->query($buscarReservacion );

            if ($reservacion->num_rows > 0) {
                $row = $reservacion->fetch_assoc();
                $ficha = $row['ficha'];
                $fecha = $row['fecha'];
                $hora = $row['hora'];
                $paquete = $row['tipo_paquete'];
                $personas = $row['cantidad_personas'];
                $informacion = $row['informacion_extra'];
                
        }

            $buscar = "SELECT * FROM clientes WHERE id_usuario = '$id_usuario'";
            $result = $conecta->query($buscar);

            if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $nombre = $row['nombre'];
                    $apellido = $row['apellido'];
                    $telefono = $row['telefono'];
                    $correo = $row['correo'];
            }
        } else {
            echo "Error al reservar" . mysqli_error($conecta);
        }
    } else {
        echo '<script>alert("No has iniciado sesión."); window.location.href = "login.php";</script>';
    exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Inicio</title>
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/reservar.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
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
    <h2>Perfil</h2>
        <form>
        <div class="info-box informacion">
            <input type="Text" >
            <label>Nombre: <?php echo $nombre; ?></label>
        </div>
        <div class="info-box informacion">
            <input type="Text" >
            <label>Apellido: <?php echo $apellido; ?> </label>
        </div>  
        <div class="info-box informacion">
            <input type="Text" >
            <label>Telefono: <?php echo $telefono; ?></label>
        </div> 
        <div class="info-box informacion">
            <input type="Text" >
            <label>Correo: <?php echo $correo; ?></label>
        </div>  
        </form>
    </div>
</div>
<div class="mainregistrar">
    <div class="registrar-box">
    <h2>Editar Datos</h2>
        <form action="perfil.php" method="post" id="reservacion">
        <div class="info-box informacion">
            <input type="Text"  value="<?php echo $nombre; ?>" name="newNombre">
            <label>Nuevo Nombre:</label>
        </div>
        <div class="info-box informacion">
            <input type="Text" value="<?php echo $apellido; ?>" name="newApellido">
            <label>Editar Apellido:</label>
        </div>  
        <div class="info-box informacion">
            <input type="Text"  value="<?php echo $telefono; ?>" name="newTelefono">
            <label>Editar Telefono: </label>
        </div> 
        <div class="info-box informacion">
            <input type="Text" value="<?php echo $correo; ?>" name="newCorreo">
            <label>Editar Correo: </label>
        </div>  
            <input class="botonRegistrar" type="submit" name="subir" value="Editar">
        </form>
    </div>
</div>
<div class="mainregistrar">
    <div class="registrar-box">
    <h2>Reservaciones</h2>
    <table WIDTH="500">
        <tr>
            <th>Ficha</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Paquete</th>
            <th>Personas</th>
            <th>Informacion</th>
        </tr>
        <tr>
            <td><?php echo $ficha; ?></td>
            <td><?php echo $fecha; ?></td>
            <td><?php echo $hora; ?></td>
            <td><?php echo $paquete; ?></td>
            <td><?php echo $personas; ?></td>
            <td><?php echo $informacion; ?></td>
        </tr>
    </table>
    <a href="pdf.php" target="_blank"><button class="botonRegistrar">Generar PDF</button></a>
    </div>  
    </div>
</div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newNombre = $_POST['newNombre'];
    $newApellido = $_POST['newApellido'];
    $newTelefono = $_POST['newTelefono'];
    $newCorreo = $_POST['newCorreo'];

    // Actualizar los datos en la base de datos
    $updateQuery = "UPDATE clientes SET nombre = '$newNombre', apellido = '$newApellido', telefono = '$newTelefono', correo = '$newCorreo' WHERE id_usuario = $id_usuario";
    if ($conecta->query($updateQuery) === TRUE) {
        echo '<script>alert("Datos actualizados correctamente."); window.location.href = "perfil.php";</script>';
        exit;
    } else {
        echo '<script>alert("ERROR."); window.location.href = "perfil.php";</script>';
    }
}

?>

</body>
</html>