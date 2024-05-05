<h2>Tabla de Transacciones</h2>
<form action="index.php" method="POST">
    <input type="hidden" name="nro_cuenta" value="<?php echo $nro_cuenta ?>">
    <input type="hidden" name="action" value="agregarTransaccion">
    <input class="btn" type="submit" value="+ Agregar Transaccion">
</form>
<table>
    <thead>
        <tr>
            <th>Número de Transacción</th>
            <th>Fecha</th>
            <th>Tipo de Transacción</th>
            <th>Monto</th>
            <th>Descripción</th>
            <th>Destino</th>
            <th>Número de Cuenta</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transacciones as $transaccion) { ?>
            <tr>
                <td><?php echo $transaccion['nro_tr'] ?></td>
                <td><?php echo $transaccion['fecha']->format('d-m-Y') ?></td>
                <td><?php echo $transaccion['tipo_tr'] ?></td>
                <td><?php echo $transaccion['monto'] ?></td>
                <td><?php echo $transaccion['descripcion'] ?></td>
                <td><?php echo $transaccion['destino'] ?></td>
                <td><?php echo $transaccion['nro_cuenta'] ?></td>
                <td>
                    <form action="index.php" method="POST">
                        <input type="hidden" name="nro_tr" value="<?php echo $transaccion['nro_tr'] ?>">
                        <input type="hidden" name="action" value="editarTransaccion">
                        <input class="btn-edit" type="submit" value="Editar">
                    </form>
                </td>
                <td>
                    <form action="index.php" method="POST" onsubmit="return confirmarEliminar()">
                        <input type="hidden" name="nro_tr" value="<?php echo $transaccion['nro_tr'] ?>">
                        <input type="hidden" name="nro_cuenta" value="<?php echo $transaccion['nro_cuenta'] ?>">
                        <input type="hidden" name="action" value="eliminarTransaccion">
                        <input class="btn-delete" type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    function confirmarEliminar() {
        var confirmacion = confirm("¿Estás seguro de que deseas eliminar esta transaccion?");
        return confirmacion;
    }
</script>