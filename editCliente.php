<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADMIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style/index.css">
  <link rel="stylesheet" href="style/registrar.css">
</head>
<body>
<div id="nav-placeholder"></div>
    <script>
        $(function(){
          $("#nav-placeholder").load("navAdmin.php");
        });
    </script>
<div class="mainregistrar">
        <div class="registrar-box">
        <h2>EDITAR CLIENTE</h2>
        <?php
            include 'conexion.php';

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $telefono = $_POST['telefono'];
                    $correo = $_POST['correo'];

                    $query = "UPDATE clientes SET nombre='$nombre', apellido='$apellido', telefono='$telefono', correo='$correo' WHERE id_cliente=$id";
                    if ($conecta->query($query) === TRUE) {
                        echo'<script>alert("Cliente actualizado");</script>';
                        header("Location: clientesAdmin.php");
                        exit();
                    } else {
                        echo'<script>alert("ERROR");</script>';
                    }
                }

                $query = "SELECT * FROM clientes WHERE id_cliente=$id";
                $result = $conecta->query($query);
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
            ?>
                    <form method="POST" >
                    <div class="info-box">
                        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>">
                        <label>Nombre(s)</label>
                    </div>
                    <div class="info-box">
                        <input type="text" name="apellido" value="<?php echo $row['apellido']; ?>">
                        <label>Apellidos</label>
                    </div>
                    <div class="info-box">
                        <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>">
                        <label>Telefono</label>
                    </div>
                    <div class="info-box">
                        <input type="text" name="correo" value="<?php echo $row['correo']; ?>">
                        <label>Correo</label>
                    </div>
                        <input type="submit" class="botonRegistrar" value="Guardar">
                        <?php echo "<button class = 'botonRegistrar' onclick='window.location.href='clientesAdmin.php''>Cancelar</button>"?>
                    </form>
            <?php
                } else {
                    echo'<script>alert("Cliente no encontrado");</script>';
                }
            } else {
                echo'<script>alert("ID ERROR");</script>';
            }
            ?>
        </div>
</div>
    <a href="index.php"><strong>Volver al menu principal</strong></a>
    <script>
    function confirmarEdicion() {
      var resultado = confirm("¿Estás seguro de editar este cliente?");
      if (resultado) {
        window.location.href='clientesAdmin.php';
      } else {
        //alert("Elimniacion cancelada");
      }
    }
  </script>
</body>
</html>
