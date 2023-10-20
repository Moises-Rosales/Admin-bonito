<?php

require "Funciones/conecta.php";



$con = conecta();

///Recibe Valores

$nombre = $_REQUEST['nombre'];
$apellidos = $_REQUEST['apellidos'];
$correo = $_REQUEST['correo'];
$pass = $_REQUEST['pass'];
$rol = $_REQUEST['rol'];
$archivo_n = '';
$archivo = '';
$passEnc = md5($pass);

$sql = "INSERT INTO empleados
        (nombre, apellidos, correo, pass ,rol, archivo_n, archivo)
        VALUES ('$nombre','$apellidos', '$correo','$passEnc', $rol,
        '$archivo_n','$archivo')";
$res = $con->query($sql);

header("Location: empleados_lista.php")
?>