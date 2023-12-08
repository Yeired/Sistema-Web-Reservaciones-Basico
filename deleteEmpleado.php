<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM empleados WHERE id_empleado=$id";
    if ($conecta->query($query) === TRUE) {
        echo'<script>alert("Empleado eliminada");</script>';
        echo "<script>window.location.href='empleadosAdmin.php';</script>";
        exit();

    } else if ($conecta->query($query) === FALSE){
        echo'<script>alert("Error al eliminar");</script>';
        //echo "Error al eliminar la empleado: " . $conecta->error;
        echo "<script>window.location.href='empleadosAdmin.php';</script>";
        exit();
    }   
} else {
    echo "ID de cliente no especificado.";
}

?>
