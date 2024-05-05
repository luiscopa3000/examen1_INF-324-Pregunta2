<?php $personas = $_POST['personas']; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de usuarios</title>
</head>

<body>
    <div class="container">
        <h2>Listado de usuarios</h2>
        <form action="index.php">
            <button type="submit" name="action" value="agregarPersona">Agregar personas</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>CI</th>
                    <th>Nombres</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Género</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Celular</th>
                    <th>Correo Electrónico</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personas as $persona) { ?>
                    <tr>
                        <td><?php echo $persona['ci'] ?></td>
                        <td><?php echo $persona['nombres'] ?></td>
                        <td><?php echo $persona['paterno'] ?></td>
                        <td><?php echo $persona['materno'] ?></td>
                        <td><?php echo $persona['fecha_nac']->format('Y-m-d') ?></td>
                        <td><?php if ($persona['genero'] == 1)
                            echo "Masculino";
                        else
                            echo "Femenino" ?></td>
                            <td><?php echo $persona['direccion_dom'] ?></td>
                        <td><?php echo $persona['telefono'] ?></td>
                        <td><?php echo $persona['celular'] ?></td>
                        <td><?php echo $persona['correo'] ?></td>
                        <td><?php echo $persona['rol'] ?></td>
                        <td>
                            <form action="index.php?action=editarPersona" method="POST">
                                <input type="hidden" name="ci" value="<?php echo $persona['ci'] ?>">
                                <input class="btn-edit" type="submit" value="Editar">
                            </form>
                        </td>
                        <td>
                            <form id="<?php echo $persona['ci'] ?>" action="index.php" method="POST"
                                onsubmit="return confirmarEliminar()">
                                <input type="hidden" name="action" value="eliminarPersona">
                                <input type="hidden" name="ci" value="<?php echo $persona['ci'] ?>">
                                <input class="btn-delete" type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script>
        function confirmarEliminar() {
            var confirmacion = confirm("¿Estás seguro de que deseas eliminar esta persona?");
            return confirmacion;
        }
    </script>
</body>

</html>


<style>
    /* Estilos generales */
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .container {
        width: 80%;
        margin: auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333;
    }

    /* Estilos para el formulario */
    form {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    input[type="text"],
    input[type="date"],
    input[type="email"],
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }
    button:hover {
        background-color: #45a049;

    }

    /*Estilo para los botones de eliminar */
    .btn-delete {
        background-color: #cc0000;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;

    }
    .btn-delete:hover {
        background-color: #990000;

    }
    /*Estilo para los botones de editar */
    .btn-edit {
        background-color: #ff8000;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;

    }
    .btn-edit:hover {
        background-color: #cc6600;

    }
    /* Estilos para los mensajes de error */
    .error {
        color: #ff0000;
        margin-top: 5px;
    }
    
    /* Estilos para la tabla */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
    }
</style>