<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM reservaciones WHERE id_reservacion=$id";
    if ($conecta->query($query) === TRUE) {
        echo'<script>alert("Reservacion eliminada");</script>';
        echo "<script>window.location.href='reservacionesAdmin.php';</script>";
        exit();

    } else if ($conecta->query($query) === FALSE){
        echo'<script>alert("Error al eliminar");</script>';
        //echo "Error al eliminar la reservacion: " . $conecta->error;
        echo "<script>window.location.href='reservacionesAdmin.php';</script>";
        exit();
    }   
} else {
    echo "ID de cliente no especificado.";
}

?>
