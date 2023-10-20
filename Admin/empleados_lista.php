<!DOCTYPE html>
<html>
<head>
    <title>Lista de Empleados</title>
    <link rel="stylesheet" type="text/css" href="Css/style.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        function confirmarEliminar(id) {
            if (confirm("¿Estás seguro de que quieres eliminar este registro?")) {
                eliminarEmpleado(id);
            }
        }

        function eliminarEmpleado(id) {
            $.ajax({
                url: 'empleados_elimina.php',
                type: 'post',
                data: { id: id },
                success: function(response) {
                    if (response == 'exito') {
                        $('#fila_' + id).remove(); // Eliminar la fila con jQuery
                    } else {
                        alert('Hubo un error al eliminar el registro');
                    }
                }
            });
        }
    </script>
</head>
<body>
    <h1 class="titulo">Listado de Empleados</h1>

    <a href="empleados_alta.php" class="crear-enlace">Crear nuevo registro</a><br><br>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre Completo</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        <?php
        require "Funciones/conecta.php";
        $con = conecta();

        $sql = "SELECT * FROM empleados WHERE status = 1 AND eliminado = 0";
        $res = $con->query($sql);

        while($row = $res->fetch_array()){
            $id = $row["id"];
            $nombre = $row["nombre"];
            $apellidos = $row["apellidos"];
            $correo = $row["correo"];
            $rol = $row["rol"];

            echo "<tr id='fila_$id'>";
            echo "<td>$id</td>";
            echo "<td>$nombre $apellidos</td>";
            echo "<td>$correo</td>";
            echo "<td>$rol</td>";
            echo "<td><button onclick='confirmarEliminar($id)'>Eliminar</button></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

