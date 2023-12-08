<?php
 $conecta = new mysqli("localhost","root","","foodweb");
 if(mysqli_connect_error())
 {
    echo"Error en conectar a la base de datos".mysqli_connect_error();
 }
 else{
    //echo"<hr><br>La conexion fue exitosa";
 }
?>
