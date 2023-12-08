<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/login.css">
    <title>Administrador</title>
</head>
<body>
<div id="nav-placeholder"></div>
    <script>
        $(function(){
          $("#nav-placeholder").load("nav.php");
        });
</script>
<div class="mainlog">
  <div class="login-box">
    <h2>Administrador</h2>
    <form action="iniciarAdmin.php" method="post">
      <div class="user-box">
        <input type="text" name="usuario" required="">
        <label>Usuario</label>
      </div>
      <div class="user-box">
        <input type="password" name="contrasena" required="">
        <label>Contraseña</label>
      </div>
        <input  class="ingresar" type="submit" name="subir" value="INGRESAR">
    </form>
  </div>
</div>
    <?php
    include 'conexion.php';
    if(isset($_POST["subir"]))
    {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];;

        $consulta = "SELECT contrasena FROM usuarios_empleados WHERE usuario = '$usuario'";
        
        $resultado = mysqli_query($conecta, $consulta);
            if ($resultado) {
            $fila = mysqli_fetch_array($resultado);
            $hash = $fila["contrasena"];
            if($contrasena === $hash){
                echo '<script>alert("BIENVENIDO ADMINISTRADOR");</script>';
                //session_start();
                //$_SESSION['usuario'] = $usuario;
                header('Location: reservacionesAdmin.php');
                exit;
            }
            else{
                echo '<script>alert("¡USUARIO O CONTRASEÑA INCORRECTAS");</script>';
            }
        }
    }


    ?>
</body>
</html>