<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar datos de persona</title>
</head>

<body>
    <div class="container">

        <h1>Editar Persona</h1>
        <?php
        require_once ('app/models/persona_model.php');
        // Verificar si la persona existe
        if ($persona) {

            ?>
            <form action="index.php" method="POST">
                <input type="hidden" name='action' value='editarPersona'>
                <input type="hidden" name="ci" value="<?php echo $persona['ci']; ?>">
                <label for="nombres">Nombres:</label>
                <input type="text" id="nombres" name="nombres" value="<?php echo $persona['nombres']; ?>" required><br><br>
                <label for="paterno">Apellido Paterno:</label>
                <input type="text" id="paterno" name="paterno" value="<?php echo $persona['paterno']; ?>" required><br><br>
                <label for="materno">Apellido Materno:</label>
                <input type="text" id="materno" name="materno" value="<?php echo $persona['materno']; ?>" required><br><br>
                <label for="fecha_nac">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nac" name="fecha_nac"
                    value="<?php echo $persona['fecha_nac']->format('Y-m-d'); ?>" required><br><br>
                <label for="genero">Género:</label>
                <select id="genero" name="genero" required>
                    <option value="1" <?php echo ($persona['genero'] == 1) ? 'selected' : ''; ?>>Masculino</option>
                    <option value="2" <?php echo ($persona['genero'] == 2) ? 'selected' : ''; ?>>Femenino</option>
                </select><br><br>
                <label for="direccion_dom">Dirección Domiciliaria:</label>
                <input type="text" id="direccion_dom" name="direccion_dom" value="<?php echo $persona['direccion_dom']; ?>"
                    required><br><br>
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $persona['telefono']; ?>"><br><br>
                <label for="celular">Celular:</label>
                <input type="text" id="celular" name="celular" value="<?php echo $persona['celular']; ?>" required><br><br>
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" value="<?php echo $persona['correo']; ?>" required><br><br>
                <label for="rol">Rol:</label>
                <input type="text" id="rol" name="rol" value="<?php echo $persona['rol']; ?>" required><br><br>
                <input class="btn" type="submit" value="Guardar Cambios">
            </form>
            <?php
        } else {
            echo "No se encontró la persona.";
        }
        ?>
    </div>
    <br><br>
    <div class="container">

        <?php

        require_once ('app/controllers/cuenta_controller.php');
        $cuentaControlador = new Cuenta_controller();
        $cuentaControlador->listar($persona['ci']);
        ?>
    </div>
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

    /*Estilo para los botones para agregar*/
    .btn {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    .btn:hover {

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
</style>