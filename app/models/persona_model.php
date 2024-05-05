<?php

require_once ('config/database.php');

class Persona
{
    public static function mostrar()
    {
        global $conn_id;
        $sql = "SELECT * FROM persona";

        // Verificar si la conexión se estableció correctamente
        if ($conn_id === false) {
            die("Error de conexión: " . print_r(sqlsrv_errors(), true));
        }
        $stmt = sqlsrv_query($conn_id, $sql);

        if ($stmt === false) {
            echo "Error al obtener personas: " . print_r(sqlsrv_errors(), true);
            return [];
        } else {
            $personas = [];
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                // Convertir los valores de cadena a UTF-8
                $personas[] = $row;
            }

            return $personas;
        }
    }
    public static function mostrar_ci($ci)
    {
        global $conn_id;

        $sql = "SELECT * FROM persona WHERE ci = ?";

        $params = array($ci);

        $stmt = sqlsrv_query($conn_id, $sql, $params);

        if ($stmt === false) {
            echo "Error al obtener persona: " . print_r(sqlsrv_errors(), true);
            return null;
        } else {
            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            return $row;
        }
    }
    public static function cambio($ci, $nombres, $paterno, $materno, $fecha_nac, $genero, $direccion_dom, $telefono, $celular, $correo, $rol)
    {
        global $conn_id;

        $sql = "UPDATE persona SET nombres = ?, paterno = ?, materno = ?, fecha_nac = ?, genero = ?, direccion_dom = ?, telefono = ?, celular = ?, correo = ?, rol = ?
                WHERE ci = ?";

        $params = array($nombres, $paterno, $materno, $fecha_nac, $genero, $direccion_dom, $telefono, $celular, $correo, $rol ,$ci);

        $stmt = sqlsrv_query($conn_id, $sql, $params);

        if ($stmt === false) {
            echo "Error al actualizar persona: " . print_r(sqlsrv_errors(), true);
            return false;
        } else {
            return true;
        }
    }
    public static function alta($ci, $nombres, $paterno, $materno, $fecha_nac, $genero, $direccion_dom, $telefono, $celular, $correo, $password, $rol)
    {
        global $conn_id;

        // Preparar la consulta SQL
        $sql = "INSERT INTO persona (ci, nombres, paterno, materno, fecha_nac, genero, direccion_dom, telefono, celular, correo, password, rol) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Parámetros de la consulta
        $params = array($ci, $nombres, $paterno, $materno, $fecha_nac, $genero, $direccion_dom, $telefono, $celular, $correo, $password, $rol);

        // Ejecutar la consulta
        $stmt = sqlsrv_query($conn_id, $sql, $params);

        if ($stmt === false) {
            echo "Error al insertar persona: " . print_r(sqlsrv_errors(), true);
            return false;
        } else {
            return true;
        }
    }


    public static function baja($ci)
    {
        global $conn_id;

        // Preparar la consulta SQL
        $sql = "DELETE FROM persona WHERE ci = ?";

        // Parámetros de la consulta
        $params = array($ci);

        // Ejecutar la consulta
        $stmt = sqlsrv_query($conn_id, $sql, $params);

        if ($stmt === false) {
            echo "Error al eliminar persona: " . print_r(sqlsrv_errors(), true);
            return false;
        } else {
            return true;
        }
    }








}
?>