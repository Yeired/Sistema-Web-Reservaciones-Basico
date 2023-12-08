<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/contacto.css">
    <title>Contacto</title>
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
        <h2>Contacto</h2>
            <form action="registrar.php" method="post">
            <div class="info-box">
                <input type="text" name="nombre" required="">
                <label>Nombre(s)</label>
            </div>
            <div class="info-box">
                <input type="email" name="correo" required="">
                <label>Correo</label>
            </div>
            <div class="info-box">
                <input type="text" name="usuario" required="">
                <label>Mensage</label>  
            </div>
            <div class="info-box ubicacion">
                <label>Ubicacion: Miguel Coatlinchan, 56250 Texcoco, Méx.</label>
            </div>
            <div class="info-box ubicacion">
                <label>Telefono: 595 921 3027</label>  
            </div>
            <div class="info-box ubicacion">
                <label>Horario: 9:00 am  a 19:00 pm</label>  
            </div>
            <div class="info-box ubicacion">
                <label></label>  
            </div>
                <div class="info-box ubicacion">
                <label></label>  
            </div>
            <div class="info-box">
                
                <div class="container">
                <a href="#"><span>Facebook</span></a>
                <a href="#"><span>Twitter</span></a>
                <a href="#"><span>Google+</span></a>
                <a href="#"><span>Github</span></a>
                </div>  
            </div>
            <div class="info-box ubicacion">
                <label></label>  
            </div>
                <input class="botonRegistrar" type="submit" name="subir" value="ENVIAR">
            </form>
        </div>
    </div>
</body>
</html>