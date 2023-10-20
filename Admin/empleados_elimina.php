<?php
require "Funciones/conecta.php";

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    $con = conecta();

    // Realizar la consulta para eliminar el registro
    $sql = "UPDATE empleados SET eliminado = 1 WHERE id = $id";
    
    if($con->query($sql) === TRUE) {
        echo 'exito';
    } else {
        echo 'error';
    }

    $con->close();
} else {
    echo 'error';
}
?>