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
        <h2>EDITAR RESERVACION</h2>
        <?php
            include 'conexion.php';

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $ficha = $_POST['ficha'];
                    $fecha = $_POST['fecha'];
                    $hora = $_POST['hora'];
                    $tipo_paquete = $_POST['tipo_paquete'];
                    $cantidad_personas = $_POST['cantidad_personas'];
                    $informacion_extra = $_POST['informacion_extra'];
                    

                    $query = "UPDATE reservaciones SET ficha='$ficha', fecha='$fecha', hora='$hora', tipo_paquete='$tipo_paquete', cantidad_personas='$cantidad_personas', informacion_extra='$informacion_extra' WHERE id_reservacion=$id";
                    if ($conecta->query($query) === TRUE) {
                        echo'<script>alert("Reservacion actualizado");</script>';
                        echo "<script>window.location.href='reservacionesAdmin.php';</script>";
                        exit();
                    } else {
                        echo'<script>alert("ERROR");</script>';
                    }
                }

                $query = "SELECT * FROM reservaciones WHERE id_reservacion=$id";
                $result = $conecta->query($query);
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
            ?>
                    <form method="POST" >
                    <div class="info-box">
                        <input type="text" name="ficha" value="<?php echo $row['ficha']; ?>">
                        <label>Ficha</label>
                    </div>
                    <div class="info-box">
                        <input type="date" name="fecha" value="<?php echo $row['fecha']; ?>">
                        <label>Fecha</label>
                    </div>
                    <div class="info-box">
                        <input type="time" name="hora" value="<?php echo $row['hora']; ?>">
                        <label>Hora</label>
                    </div>
                    <div class="info-box">
                        <input type="text" name="tipo_paquete" value="<?php echo $row['tipo_paquete']; ?>">
                        <label>Paquete</label>
                    </div>
                    <div class="info-box">
                        <input type="number" min="1" max="30" name="cantidad_personas" value="<?php echo $row['cantidad_personas']; ?>">
                        <label>Personas</label>
                    </div>
                    <div class="info-box">
                        <input type="text" name="informacion_extra" value="<?php echo $row['informacion_extra']; ?>">
                        <label>Informacion</label>
                    </div>
                        <input type="submit" class="botonRegistrar" value="Guardar">
                        <?php echo "<button class = 'botonRegistrar' onclick='window.location.href='reservacionesAdmin.php''>Cancelar</button>"?>
                    </form>
            <?php
                } else {
                    echo'<script>alert("Reserva no encontrada");</script>';
                }
            } else {
                echo'<script>alert("ID ERROR");</script>';
            }
            ?>
        </div>
</div>
    <a href="index.php"><strong>Volver al menu principal</strong></a>
</body>
</html>
