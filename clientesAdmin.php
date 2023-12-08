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
        <h2>CLIENTES</h2>
            <?php
            include 'conexion.php';
            $query = "SELECT * FROM clientes";
            $result = $conecta->query($query);

            if ($result->num_rows > 0) {
                echo "<table >";
                echo "<tr><th>ID</th><th>Usuario</th><th>Nombre</th><th>Apellido</th><th>Teléfono</th><th>Correo</th><th>Acciones</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id_cliente']}</td>";
                    echo "<td>{$row['id_usuario']}</td>";
                    echo "<td>{$row['nombre']}</td>";
                    echo "<td>{$row['apellido']}</td>";
                    echo "<td>{$row['telefono']}</td>";
                    echo "<td>{$row['correo']}</td>";
                    $id_cliente = $row['id_cliente'];
                    echo "<td>
                    <button class = 'botonRegistrar' onclick=\"window.location.href='editCliente.php?id={$row['id_cliente']}'\">Editar</button>
                    <button class='botonRegistrar' onclick='confirmarEdicion($id_cliente)'>Eliminar</button>
                        </td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo '<script>alert("Sin registros");</script>';
            }
            ?>
            <a href="clientesPDF.php" target="_blank"><button class="botonEmpleado">Generar PDF</button></a>
        </div>
</div>
    <a href="index.php"><strong>Volver al menu principal</strong></a>
    <script>
    function confirmarEdicion(id_cliente) {
      var resultado = confirm("¿Estás seguro de que quieres eliminar este cliente?");
      if (resultado) {
        window.location.href = 'deleteCliente.php?id=' + id_cliente;
      } else {
        //alert("Eliminacion cancelada");
      }
    }
  </script>
</body>
</html>
