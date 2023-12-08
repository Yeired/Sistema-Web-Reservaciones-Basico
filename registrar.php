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
          $("#nav-placeholder").load("nav.php");
        });
    </script>
    <div class="mainregistrar">
        <div class="registrar-box">
        <h2>Registrate</h2>
            <form action="registrar.php" method="post">
            <div class="info-box">
                <input type="text" name="nombre" required="">
                <label>Nombre(s)</label>
            </div>
            <div class="info-box">
                <input type="text" name="apellido" required="">
                <label>Apellidos</label>
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
            </form>
        </div>
    </div>
    <?php
    include 'conexion.php';
    if(isset($_POST["subir"])){
        $nombre =$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $telefono=$_POST['telefono'];
        $correo =$_POST['correo'];

        $usuario = $_POST['usuario'];
        $contrasena =$_POST['contrasena'];
        $confirmaContrasena =$_POST['confirmaContrasena'];
        if($contrasena === $confirmaContrasena)
        {
            if (validarContraseña($contrasena)){
                $contrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);

                $registrarUsuario = "INSERT INTO usuarios_clientes(usuario,contrasena) value ('$usuario','$contrasenaEncriptada')";

                $valor = "SELECT MAX(id_usuario) as ultimo_valor FROM usuarios_clientes";
                $obtener = mysqli_query($conecta, $valor);
                if (mysqli_num_rows($obtener) > 0) 
                {
                    while($row = mysqli_fetch_assoc($obtener)) 
                    {
                        $id_usuario = $row["ultimo_valor"] + 1;
                    }
                }
                $registrarCliente = "INSERT INTO clientes(id_usuario,nombre,apellido,telefono,correo) value ('$id_usuario','$nombre','$apellido','$telefono','$correo')";
                if(mysqli_query($conecta, $registrarUsuario) && mysqli_query($conecta, $registrarCliente))
                {
                    echo'<script>alert("CLIENTE REGISTRADO CORRECTAMENTE");</script>';
                    header('Location: login.php');
                    exit;
                }
                else{
                    echo"ERROR DATOS USUARIO".$registrarUsuario."".mysqli_error($conecta);
                    echo"ERROR DATOS CLIENTE".$registrarCliente."".mysqli_error($conecta);
                }
            }
            else{
                echo '<script>alert("Tu contraseña debe contener al menos 8 caracteres, al menos una letra y al menos un número");</script>';
            }
        }
        else    
        {
            echo '<script>alert("¡LAS CONTRASEÑAS NO COINCIDEN!, Intentelo de nuevo");</script>';
        }
    }
    function validarContraseña($contrasena) {
        if (strlen($contrasena) < 8) {
            return false;
        }
        if (!preg_match('/[A-Za-z]/', $contrasena) || !preg_match('/\d/', $contrasena)) {
            return false;
        }
        return true;
    }

    ?>
</body>
</html>