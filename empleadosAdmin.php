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
        <h2>Empleados</h2>
            <?php
            include 'conexion.php';
            $query = "SELECT * FROM empleados";
            $result = $conecta->query($query);

            if ($result->num_rows > 0) {
                echo "<table >";
                echo "<tr><th>ID Empleado</th><th>ID Usuario</th><th>Nombre</th><th>Apellido</th><th>Nacimiento</th><th>Edad</th><th>Telefono</th><th>Correo</th><th>Puesto</th><th>Acciones</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id_empleado']}</td>";
                    echo "<td>{$row['id_usuario']}</td>";
                    echo "<td>{$row['nombre']}</td>";
                    echo "<td>{$row['apellido']}</td>";
                    echo "<td>{$row['fecha_nacimiento']}</td>";
                    echo "<td>{$row['edad']}</td>";
                    echo "<td>{$row['telefono']}</td>";
                    echo "<td>{$row['correo']}</td>";
                    echo "<td>{$row['puesto']}</td>";
                    $id_empleado = $row['id_empleado'];
                    echo "<td>
                    <button class = 'botonRegistrar' onclick=\"window.location.href='editEmpleado.php?id={$row['id_empleado']}'\">Editar</button>
                    <button class='botonRegistrar' onclick='confirmarEdicion($id_empleado)'>Eliminar</button>
                        </td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<button class='botonEmpleado' onclick=\"window.location.href='registrarEmpleado.php'\">Registrar</button>";
            } else {
                echo '<script>alert("Sin registros");</script>';
            }
            ?>
            <a href="empleadosPDF.php" target="_blank"><button class="botonEmpleado">Generar PDF</button></a>
        </div>
</div>
    <a href="index.php"><strong>Volver al menu principal</strong></a>
    <script>
    function confirmarEdicion(id_empleado) {
      var resultado = confirm("¿Estás seguro de que quieres eliminar este empleado?");
      if (resultado) {
        window.location.href = 'deleteEmpleado.php?id=' + id_empleado;
      } else {
        //alert("Elimniacion cancelada");
      }
    }
  </script>
</body>
</html>
