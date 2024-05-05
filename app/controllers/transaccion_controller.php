<?php
include ('app/models/transaccion_model.php');

class Transaccion_controller
{
    public function listar($nro_cuenta)
    {
        $transacciones = Transaccion_model::mostrar_nro($nro_cuenta);
        // Lógica para mostrar la lista de cuentas
        include ('app/views/transacciones/alta_view.php');
    }

    public function alta()
    {
        if (isset($_POST['fecha']) && isset($_POST['tipo_tr']) && isset($_POST['monto']) && isset($_POST['descripcion']) && isset($_POST['destino']) && isset($_POST['nro_cuenta'])) {
            $fecha = $_POST['fecha'];
            $fecha_sql = date('Y-m-d H:i:s', strtotime($fecha));
            $tipo_tr = $_POST['tipo_tr'];
            $monto = $_POST['monto'];
            $descripcion = $_POST['descripcion'];
            $destino = $_POST['destino'];
            $nro_cuenta = $_POST['nro_cuenta'];

            // Procesar la actualización de los datos de la persona en la base de datos
            $resultado = Transaccion_model::alta($fecha_sql, $tipo_tr, $monto, $descripcion, $destino, $nro_cuenta);

            if ($resultado) {
                echo "Los datos de la transaccion se actualizaron correctamente.";

                //Primero destruimos sesiones anteriores
                session_unset();
                session_destroy();

                session_start();
                $_SESSION['nro_cuenta'] = $nro_cuenta;
                header('Location: index.php?action=editarCuenta');
                exit();
            } else {
                echo "Ocurrió un error al actualizar los datos de la persona.";
            }
        } else {
            include ('app/views/transacciones/alta_form.php');

        }
    }
    public function baja()
    {
        print json_encode($_POST);
        if (isset($_POST['nro_tr'])) {
            $nro_tr = $_POST['nro_tr'];

            // Procesar la eliminación de la persona en la base de datos
            $resultado = Transaccion_model::baja($nro_tr);

            if ($resultado) {
                echo "La transaccion se eliminó correctamente.";

                header('Location: index.php?action=editarCuenta');
                exit();
            } else {
                echo "Ocurrió un error al eliminar la persona.";
            }
        } else {
            echo "Error: Falta el identificador de la persona a eliminar.";
        }
    }


    public function cambio()
    {
        if (isset($_POST['fecha']) && isset($_POST['tipo_tr']) && isset($_POST['monto']) && isset($_POST['descripcion']) && isset($_POST['destino']) && isset($_POST['nro_cuenta']) && isset($_POST['nro_tr'])) {
            $fecha = $_POST['fecha'];
            $fecha_sql = date('Y-m-d H:i:s', strtotime($fecha));
            $tipo_tr = $_POST['tipo_tr'];
            $monto = $_POST['monto'];
            $descripcion = $_POST['descripcion'];
            $destino = $_POST['destino'];
            $nro_cuenta = $_POST['nro_cuenta'];
            $nro_tr = $_POST['nro_tr'];


            // Procesar la actualización de los datos de la persona en la base de datos
            $resultado = Transaccion_model::cambio($fecha_sql, $tipo_tr, $monto, $descripcion, $destino, $nro_cuenta, $nro_tr);

            if ($resultado) {
                echo "Los datos de la transaccion se actualizaron correctamente.";

                sleep(2);

                header('Location: index.php?action=editarCuenta');
                exit();
            } else {
                echo "Ocurrió un error al actualizar los datos de la persona.";
            }

        } else {
            // Mostrar formulario para editar transaccion
            $nro_tr = $_POST['nro_tr'];
            $transaccion = Transaccion_model::mostrar_tr($nro_tr);

            if ($transaccion) {
                include ('app/views/transacciones/cambio_view.php');
            } else {
                echo "No se encontró la cuenta.";
            }

        }
    }
    
}
?>