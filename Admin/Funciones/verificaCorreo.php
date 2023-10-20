<?php

require "Funciones/conecta.php";

if(isset($_POST['correo'])) {
    $correo = $_POST['correo'];

    

    $
$con = conecta();

    $sql = "SELECT * FROM empleados WHERE correo = '$correo'";
    $res = $con->query($sql);

    if($res->num_rows > 0) {
        echo 'existe';
    }

    $con->close();
}
?>