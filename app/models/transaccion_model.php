<?php
require_once ('config/database.php');

class Transaccion_model
{
    public static function alta($fecha, $tipo_tr, $monto, $descripcion, $destino, $nro_cuenta) 
    {
        global $conn_id;

        // Preparar la consulta SQL
        $sql = "INSERT INTO transaccion (fecha, tipo_tr, monto, descripcion, destino, nro_cuenta) 
            VALUES (?, ?, ?, ?, ?, ?)";

        // Parámetros de la consulta
        $params = array($fecha, $tipo_tr, $monto, $descripcion, $destino, $nro_cuenta);

        print json_encode($params);
        // Ejecutar la consulta
        $stmt = sqlsrv_query($conn_id, $sql, $params);

        if ($stmt === false) {
            echo "Error al insertar la transaccion: " . print_r(sqlsrv_errors(), true);
            return false;
        } else {
            return true;
        } 
    }

    public static function mostrar_nro($nro_cuenta)
    {
        global $conn_id;

        $sql = "SELECT * FROM transaccion WHERE nro_cuenta = ?";

        $params = array($nro_cuenta);

        $stmt = sqlsrv_query($conn_id, $sql, $params);

        if ($stmt === false) {
            echo "Error al obtener transaccion: " . print_r(sqlsrv_errors(), true);
            return [];
        } else {
            $transacciones = [];
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $transacciones[] = $row;
            }
            return $transacciones;
        }
    }
    
    public static function mostrar_tr($nro_tr)
    {
        global $conn_id;

        $sql = "SELECT * FROM transaccion WHERE nro_tr = ?";

        $params = array($nro_tr);

        $stmt = sqlsrv_query($conn_id, $sql, $params);

        if ($stmt === false) {
            echo "Error al obtener transaccion: " . print_r(sqlsrv_errors(), true);
            return [];
        } else {
            $transacciones = [];
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $transacciones[] = $row;
            }
            return $transacciones;
        }
    }
    public static function cambio($fecha, $tipo_tr, $monto, $descripcion, $destino, $nro_cuenta, $nro_tr)
    {
        global $conn_id;

        $sql = "UPDATE transaccion SET fecha = ?, tipo_tr = ?, monto = ?, descripcion = ?, destino = ?, nro_cuenta = ?
                WHERE nro_tr = ?";

        $params = array($fecha, $tipo_tr, $monto, $descripcion, $destino, $nro_cuenta, $nro_tr);

        $stmt = sqlsrv_query($conn_id, $sql, $params);

        if ($stmt === false) {
            echo "Error al actualizar la transaccion: " . print_r(sqlsrv_errors(), true);
            return false;
        } else {
            return true;
        }

    }


    public static function baja($nro_tr)
    {
        global $conn_id;

        // Preparar la consulta SQL
        $sql = "DELETE FROM transaccion WHERE nro_tr = ?";

        // Parámetros de la consulta
        $params = array($nro_tr);

        // Ejecutar la consulta
        $stmt = sqlsrv_query($conn_id, $sql, $params);

        if ($stmt === false) {
            echo "Error al eliminar la transaccion: " . print_r(sqlsrv_errors(), true);
            return false;
        } else {
            return true;
        }
    }
}
?>