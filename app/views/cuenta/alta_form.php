<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Cuenta</title>
</head>

<body>
    <div class="container">

        <h2>Adicionar de Cuenta</h2>
        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="agregarCuenta">
            <label for="nro_cuenta">Número de Cuenta:</label>
            <input type="text" id="nro_cuenta" name="nro_cuenta" value="<?php echo $nro_cuenta ?>" readonly
                required><br><br>

            <label for="tipo">Tipo de Cuenta:</label>
            <input type="text" id="tipo" name="tipo" required><br><br>

            <label for="saldo">Saldo:</label>
            <input type="text" id="saldo" name="saldo" required><br><br>

            <label for="fecha_exp">Fecha de Expiración:</label>
            <input type="date" id="fecha_exp" name="fecha_exp" required><br><br>

            <label for="ci">CI del Titular:</label>
            <input type="text" id="ci" name="ci" value="<?php echo $_POST['ci'] ?>" required readonly><br><br>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="status">Estado:</label>
            <select id="status" name="status" required>
                <option value="1">Activa</option>
                <option value="0">Inactiva</option>
            </select><br><br>

            <input type="submit" value="Guardar">
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

    input[type="text"],
    input[type="date"],
    input[type="email"],
    input[type="password"],
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    /* Estilos para los mensajes de error */
    .error {
        color: #ff0000;
        margin-top: 5px;
    }
</style>