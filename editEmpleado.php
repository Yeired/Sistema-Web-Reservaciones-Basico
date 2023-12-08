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
        <h2>EDITAR EMPLEADO</h2>
        <?php
            include 'conexion.php';

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $fecha_nacimiento = $_POST['fecha_nacimiento'];
                    $edad = $_POST['edad'];
                    $telefono = $_POST['telefono'];
                    $correo = $_POST['correo'];
                    $puesto = $_POST['puesto'];
                    

                    $query = "UPDATE empleados SET nombre='$nombre',apellido='$apellido', fecha_nacimiento='$fecha_nacimiento', edad='$edad', telefono='$telefono', correo='$correo', puesto='$puesto' WHERE id_empleado=$id";
                    if ($conecta->query($query) === TRUE) {
                        //echo'<script>alert("Empleado actualizado");</script>';
                        echo "<script>window.location.href='empleadosAdmin.php';</script>";
                        exit();
                    } else {
                        echo'<script>alert("ERROR");</script>';
                    }
                }

                $query = "SELECT * FROM empleados WHERE id_empleado=$id";
                $result = $conecta->query($query);
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
            ?>
                    <form method="POST" >
                    <div class="info-box">
                        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>">
                        <label>Nombre</label>
                    </div>
                    <div class="info-box">
                        <input type="text" name="apellido" value="<?php echo $row['apellido']; ?>">
                        <label>Apellido</label>
                    </div>
                    <div class="info-box">
                        <input type="date" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>">
                        <label>Fecha de nacimiento</label>
                    </div>
                    <div class="info-box">
                        <input type="number" name="edad" value="<?php echo $row['edad']; ?>">
                        <label>Edad</label>
                    </div>
                    <div class="info-box">
                        <input type="number" name="telefono" value="<?php echo $row['telefono']; ?>">
                        <label>Telefono</label>
                    </div>
                    <div class="info-box">
                        <input type="email" min="1" max="30" name="correo" value="<?php echo $row['correo']; ?>">
                        <label>Correo</label>
                    </div>
                    <div class="info-box">
                        <input type="text" name="puesto" value="<?php echo $row['puesto']; ?>">
                        <label>Puesto</label>
                    </div>
                        <input type="submit" name="subir" class="botonRegistrar" value="Guardar">
                        <?php echo "<button class='botonRegistrar' onclick=\"window.location.href='empleadosAdmin.php'\">Cancelar</button>";
?>
                    </form>
            <?php
                } else {
                    echo'<script>alert("Empleado no encontrada");</script>';
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
