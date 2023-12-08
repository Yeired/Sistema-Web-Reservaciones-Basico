<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM clientes WHERE id_cliente=$id";
    if ($conecta->query($query) === TRUE) {
        echo'<script>alert("Cliente Eliminado");</script>';
        //echo "window.location.href='clientesAdmin.php'";
        header("Location: clientesAdmin.php");
    } else {
        echo "<script>alert('Error al eliminar el cliente');</script>";
    }
} else {
    echo'<script>alert("ID no encontrado");</script>';
}

?>
