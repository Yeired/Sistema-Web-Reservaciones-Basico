<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADMIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style/index.css">
  <link rel="stylesheet" href="style/tablaAdmin.css">
  <link rel="stylesheet" href="style/navbarAdmin.css">
</head>
<body>
<div id="nav-placeholder"></div>
    <script>
        $(function(){
          $("#nav-placeholder").load("navAdmin.php");
        });
    </script>
<div class="maintablas">
        <div class="tabla-box">
        <h2>RESERVACIONES</h2>
            <?php
            include 'conexion.php';
            $query = "SELECT * FROM reservaciones";
            $result = $conecta->query($query);

            if ($result->num_rows > 0) {
                echo "<table >";
                echo "<tr><th>ID Reserva</th><th>ID Cliente</th><th>Ficha</th><th>Fecha</th><th>Hora</th><th>Paquete</th><th>Personas</th><th>Informacion</th><th>Acciones</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id_reservacion']}</td>";
                    echo "<td>{$row['id_cliente']}</td>";
                    echo "<td>{$row['ficha']}</td>";
                    echo "<td>{$row['fecha']}</td>";
                    echo "<td>{$row['hora']}</td>";
                    echo "<td>{$row['tipo_paquete']}</td>";
                    echo "<td>{$row['cantidad_personas']}</td>";
                    echo "<td>{$row['informacion_extra']}</td>";
                    $idReservacion = $row['id_reservacion'];
                    echo "<td>
                    <button class = 'botonRegistrar' onclick=\"window.location.href='editReservacion.php?id={$row['id_reservacion']}'\">Editar</button>
                    <button class='botonRegistrar' onclick='confirmarEdicion($idReservacion)'>Eliminar</button>
                        </td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo '<script>alert("Sin registros");</script>';
            }
            ?>
            <a href="reservasPDF.php" target="_blank"><button class="botonEmpleado">Generar PDF</button></a>
        </div>
        <div class="tabla-box">
        <h2>MESAS</h2>
            <?php
            include 'conexion.php';
            $query = "SELECT * FROM mesa_reservacion";
            $result = $conecta->query($query);

            if ($result->num_rows > 0) {
                echo "<table class = 'tabla2'>";
                echo "<tr><th>ID Mesa</th><th>ID Reservacion</th><th>Mesa</th><th>Acciones</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id_mesa']}</td>";
                    echo "<td>{$row['id_reservacion']}</td>";
                    echo "<td>{$row['no_mesa']}</td>";
                    $id_mesa = $row['id_mesa'];
                    echo "<td>
                    <button class = 'botonRegistrar' onclick=\"window.location.href='editReservacion.php?id={$row['id_mesa']}'\">Editar</button>
                    <button class='botonRegistrar' onclick='confirmarEdicion($idReservacion)'>Eliminar</button>
                        </td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo '<script>alert("Sin registros");</script>';
            }
            ?>
            <a href="mesasPDF.php" target="_blank"><button class="botonEmpleado">Generar PDF</button></a>
        </div>
</div>
    <a href="index.php"><strong>Volver al menu principal</strong></a>
    <script>
    function confirmarEdicion(idReservacion) {
      var resultado = confirm("¿Estás seguro de que quieres eliminar esta reservación?");
      if (resultado) {
        window.location.href = 'deleteReservacion.php?id=' + idReservacion;
      } else {
        //alert("Elimniacion cancelada");
      }
    }
  </script>
</body>
</html>
