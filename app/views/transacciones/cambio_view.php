<?php $transaccion = $transaccion[0] ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Transacción</title>
</head>

<body>
    <div class="container">

        <h2>Formulario de Transacción</h2>
        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="editarTransaccion">

            <input type="hidden" name="nro_tr" value="<?php echo $transaccion['nro_tr'] ?>">

            <label for="fecha">Fecha:</label><br>
            <input type="datetime-local" id="fecha" name="fecha"
                value="<?php echo $transaccion['fecha']->format('Y-m-d H:i:s') ?>"><br><br>

            <label for="tipo_tr">Tipo de Transacción:</label><br>
            <input type="text" id="tipo_tr" name="tipo_tr" maxlength="30"
                value="<?php echo $transaccion['tipo_tr'] ?>"><br><br>

            <label for="monto">Monto:</label><br>
            <input type="number" id="monto" name="monto" step="1.00" value="<?php echo $transaccion['monto'] ?>"><br><br>

            <label for="descripcion">Descripción:</label><br>
            <input type="text" id="descripcion" name="descripcion" maxlength="80"
                value="<?php echo $transaccion['descripcion'] ?>"><br><br>

            <label for="destino">Destino:</label><br>
            <input type="text" id="destino" name="destino" maxlength="80"
                value="<?php echo $transaccion['destino'] ?>"><br><br>

            <label for="nro_cuenta">Número de Cuenta:</label><br>
            <input type="text" id="nro_cuenta" name="nro_cuenta" maxlength="70"
                value="<?php echo $transaccion['nro_cuenta'] ?>" readonly><br><br>

            <input class="btn" type="submit" value="Enviar">
        </form>
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

    input[type="datetime-local"],
    input[type="text"],
    input[type="number"],
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
</style>