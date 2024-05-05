<h2>Tabla de Cuentas</h2>
<form action="index.php" method="POST">
    <input type="hidden" name="action" value="agregarCuenta">
    <input type="hidden" name="ci" value="<?php echo $ci ?>">
    <input class="btn" type="submit" value="+ Agregar nueva cuenta">
</form>
<table>
    <thead>
        <tr>
            <th>Número de Cuenta</th>
            <th>Tipo</th>
            <th>Saldo</th>
            <th>Fecha de Expiración</th>
            <th>CI</th>
            <th>Password</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cuentas as $cuenta) {
            if ($cuenta['status'] == 1) { ?>
                <tr>
                    <td><?php echo $cuenta['nro_cuenta'] ?></td>
                    <td><?php echo $cuenta['tipo'] ?></td>
                    <td><?php echo $cuenta['saldo'] ?></td>
                    <td><?php echo $cuenta['fecha_exp']->format('Y-m-d') ?></td>
                    <td><?php echo $cuenta['ci'] ?></td>
                    <td>*****</td>
                    <td><?php if ($cuenta['status'] == 1) echo "Activo"; else echo "Inactivo" ?></td>
                    <td>
                        <form action="index.php?action=editarCuenta" method="POST">
                            <input type="hidden" name="nro_cuenta" value="<?php echo $cuenta['nro_cuenta'] ?>">
                            <input class="btn-edit" type="submit" value="Editar">
                        </form>
                    </td>
                    <td>
                        <form action="index.php" method="POST" onsubmit="return confirmarEliminar()">
                            <input type="hidden" name="action" value="eliminarCuenta">
                            <input type="hidden" name="ci" value="<?php echo $cuenta['ci'] ?>">
                            <input type="hidden" name="nro_cuenta" value="<?php echo $cuenta['nro_cuenta'] ?>">
                            <input class="btn-delete" type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php }
        } ?>
    </tbody>
</table>

<script>
    function confirmarEliminar() {
        var confirmacion = confirm("¿Estás seguro de que deseas eliminar esta persona?");
        return confirmacion;
    }
</script>

<style>
    /* Estilos generales */
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        width: 80%;
        margin: auto;
    }

    h2 {
        color: #333;
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

    /* Estilos para el botón */
    .btn-agregar {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    .btn-agregar:hover {
        background-color: #45a049;
    }

    /* Estilos para los formularios dentro de las celdas de la tabla */
    .form-inline {
        display: inline-block;
    }

    /* Estilos para los botones dentro de las celdas de la tabla */
    .btn-table {
        background-color: #f44336;
        color: white;
        padding: 5px 10px;
        border: none;
        cursor: pointer;
        border-radius: 3px;
    }

    .btn-table:hover {
        background-color: #d32f2f;
    }
</style>