<?php $cuenta = $cuentas[0]; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Cuenta</title>
</head>

<body>

    <div class="container">

        <h2>Formulario de Cuenta</h2>

        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="editarCuenta">
            <label for="nro_cuenta">Número de Cuenta:</label>
            <input type="text" id="nro_cuenta" name="nro_cuenta" value="<?php echo $cuenta['nro_cuenta'] ?>"
                readonly><br><br>

            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" value="<?php echo $cuenta['tipo'] ?>"><br><br>

            <label for="saldo">Saldo:</label>
            <input type="text" id="saldo" name="saldo" value="<?php echo $cuenta['saldo'] ?>"><br><br>

            <label for="fecha_exp">Fecha de Expiración:</label>
            <input type="date" id="fecha_exp" name="fecha_exp"
                value="<?php echo $cuenta['fecha_exp']->format('Y-m-d') ?>"><br><br>

            <label for="ci">CI:</label>
            <input type="text" id="ci" name="ci" value="<?php echo $cuenta['ci'] ?>" readonly><br><br>

            <label for="status">Estado:</label>
            <input type="text" id="status" name="status" value="<?php echo $cuenta['status'] ?>"><br><br>

            <input class="btn" type="submit" value="Editar">
        </form>
    </div>
    <br><br><br>
    <div class="container">
        <?php
        require_once ('app/controllers/transaccion_controller.php');
        $transaccionControlador = new Transaccion_controller();
        $transaccionControlador->listar($cuenta['nro_cuenta']);
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