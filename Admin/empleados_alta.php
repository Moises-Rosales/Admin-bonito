<!DOCTYPE html>
<html>

<head>
    <title>Alta de Empleados</title>
    <link rel="stylesheet" type="text/css" href="Css/alta.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        function validarCampos() {
            var nombre = $('#nombre').val();
            var apellidos = $('#apellidos').val();
            var correo = $('#correo').val();
            var pass = $('#pass').val();
            var rol = $('#rol').val();

            if (nombre && apellidos && correo && pass && rol > 0) {
                $.ajax({
                    url: 'Funciones/verificaCorreo.php',
                    type: 'post',
                    data: {
                        correo: correo
                    },
                    success: function(response) {
                        if (response === 'existe') {
                            $('#mensajeCorreo').html('El correo ' + correo + ' ya existe.');
                            setTimeout(function() {
                                $('#mensajeCorreo').html('');
                            }, 5000);
                        } else {
                            $('#pass').val(btoa(pass)); // Encriptar contraseña
                            $('#Alta').submit();
                        }
                    }
                });
            } else {
                $('#mensaje').html('Error: Faltan campos por llenar');
                setTimeout(function() {
                    $('#mensaje').html('');
                }, 5000);
            }
        }
        
        function validarCorreo() {
            var correo = $('#correo').val();

            if (correo) {
                $.ajax({
                    url: 'validar_correo.php',
                    type: 'post',
                    data: {
                        correo: correo
                    },
                    success: function(response) {
                        if (response === 'existe') {
                            $('#mensajeCorreo').html('El correo ' + correo + ' ya existe.');
                            setTimeout(function() {
                                $('#mensajeCorreo').html('');
                            }, 5000);
                        }
                    }
                });
            }
        }
    </script>
</head>

<body>
    <h1>Alta de Empleados</h1>
    <a href="empleados_lista.php">Regresar al Listado</a><br><br>
    <form name="Alta" id="Alta">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required> <br>
        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required> <br>
        <input type="text" name="correo" id="correo" placeholder="Correo" onBlur="validarCorreo()" required> <br>
        <div id="mensajeCorreo"></div>
        <input type="password" name="pass" id="pass" placeholder="Escribe tu password" required><br>
        <select name="rol" id="rol" required> <br>
            <option value="0">Selecciona</option>
            <option value="1">Gerente</option>
            <option value="2">Ejecutivo</option>
        </select><br>
        <input type="button" value="Salvar" onclick="validarCampos();">
        <div id="mensaje"></div>
    </form>
</body>

</html>

