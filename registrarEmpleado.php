<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style/registrar.css">
    <link rel="stylesheet" href="style/index.css">
    <title>Registrar</title>
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
        <h2>REGISTRAR EMPLEADO</h2>
            <form action="registrarEmpleado.php" method="post">
            <div class="info-box">
                <input type="text" name="nombre" required="">
                <label>Nombre(s)</label>
            </div>
            <div class="info-box">
                <input type="text" name="apellido" required="">
                <label>Apellidos</label>
            </div>
            <div class="info-box">
                <input type="date" name="fecha_nacimiento">
                <label>Fecha de nacimiento</label>
            </div>
            <div class="info-box">
                <input type="number" name="edad" required="">
                <label>Edad</label>
            </div>
            <div class="info-box">
                <input type="number" name="telefono" required="">
                <label>Telefono</label>
            </div>
            <div class="info-box">
                <input type="email" name="correo" required="">
                <label>Correo</label>
            </div>
            <div class="info-box">
                <input type="text" name="puesto" required="">
                <label>Puesto</label>
            </div>
            <div class="info-box">
                <input type="text" name="usuario" required="">
                <label>Usuario</label>
            </div>
            <div class="info-box">
                <input type="password" name="contrasena" required="">
                <label>Contraseña</label>
            </div>
            <div class="info-box">
                <input type="password" name="confirmaContrasena" required="">
                <label>Confirmar contraseña</label>
            </div>
                    <input class="botonRegistrar" type="submit" name="subir" value="REGISTRAR">
                    <?php echo "<button class='botonRegistrar' onclick=\"window.location.href='empleadosAdmin.php'\">Cancelar</button>";?>
            </form>
        </div>
    </div>
    <?php
    include 'conexion.php';
    if(isset($_POST["subir"])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $edad = $_POST['edad'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $puesto = $_POST['puesto'];

        $usuario = $_POST['usuario'];
        $contrasena =$_POST['contrasena'];
        $confirmaContrasena =$_POST['confirmaContrasena'];
        if($contrasena === $confirmaContrasena)
        {
            $contrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);

            $registrarUsuario = "INSERT INTO usuarios_empleados(usuario,contrasena) value ('$usuario','$contrasenaEncriptada')";

            $valor = "SELECT MAX(id_usuario) as ultimo_valor FROM usuarios_empleados";
            $obtener = mysqli_query($conecta, $valor);
            if (mysqli_num_rows($obtener) > 0) 
            {
                while($row = mysqli_fetch_assoc($obtener)) 
                {
                    $id_usuario = $row["ultimo_valor"] + 1;
                }
            }
            $registrarEmpleado = "INSERT INTO empleados(id_usuario,nombre,apellido,fecha_nacimiento,edad,telefono,correo,puesto) value ('$id_usuario','$nombre','$apellido','$fecha_nacimiento','$edad','$telefono','$correo','$puesto')";
            
            if(mysqli_query($conecta, $registrarUsuario) && mysqli_query($conecta, $registrarEmpleado))
            {
                echo'<script>alert("Empleado REGISTRADO CORRECTAMENTE");</script>';
                echo "<script>window.location.href='empleadosAdmin.php';</script>";
                exit();
            }
            else{
                echo"ERROR DATOS USUARIO".$registrarUsuario."".mysqli_error($conecta);
                echo"ERROR DATOS Empleado".$registrarCliente."".mysqli_error($conecta);
            }
        }
        else    
        {
            echo '<script>alert("¡LAS CONTRASEÑAS NO COINCIDEN!, Intentelo de nuevo");</script>';
        }
    }
    ?>
</body>
</html>