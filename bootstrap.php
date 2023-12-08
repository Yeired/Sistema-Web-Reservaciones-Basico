<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>nav</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm .bg-transparent navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><strong>FOODWEB</strong></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">INICIO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="paquetes.php">PAQUETES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="reservaciones.php">RESERVACIONES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contacto.php">CONTACTO</a>
              </li>   
              <li class="nav-item">
                <a class="nav-link" href="registrar.php">REGISTRAR</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="iniciar.php">INICIAR SESION</a> 
              </li>        
            </ul>
          </div>
        </div>
      </nav>
      <div id="nav-placeholder"></div>
  <?php
    session_start();
    $pagina = "cerrarSesion.php";
    $method = "post";
    $name = "cerrar";
    $cerrar = "CerrarSesion";
    $submit = "submit";
    if (isset($_SESSION['usuario'])) {
      echo "<STRONG>Usuario activo: " . $_SESSION['usuario']."<STRONG>";
      echo "<form action=".$pagina." method=".$method."><input value=".$cerrar." name=".$name." type=".$submit."></form>";
      } 
      else {
        echo "<STRONG>No has iniciado sesion</STRONG>";
      }
      ?>
  <hr>
</body>
</html>