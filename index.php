<?php include ('config/database.php') ?>

<?php
require_once ('app/controllers/persona_controller.php');
require_once ('app/controllers/cuenta_controller.php');
require_once ('app/controllers/transaccion_controller.php');

$cuentaControlador = new Cuenta_controller();
$personaControlador = new Persona_controller();
$transaccionControlador = new Transaccion_controller();

// Enrutamiento simple basado en la URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'listarPersona':
            $personaControlador->listar();
            break;
        case 'agregarPersona':
            $personaControlador->alta();
            break;
        case 'editarPersona':
            $personaControlador->editar();
            break;
        case 'eliminarPersona':
            $personaControlador->eliminar();
            break;

        case 'listarCuenta':
            $cuentaControlador->listar();
            break;
        case 'agregarCuenta':
            $cuentaControlador->alta();
            break;
        case 'editarCuenta':
            $cuentaControlador->cambio();
            break;
        case 'eliminarCuenta':
            $cuentaControlador->eliminar();
            break;


        default:
            echo "Acción no válida";
            break;
    }
} else if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'agregarPersona':
            $personaControlador->alta();
            break;
        case 'editarPersona':
            $personaControlador->editar();
            break;
        case 'eliminarPersona':
            $personaControlador->baja();
            break;

        case 'agregarCuenta':
            $cuentaControlador->alta();
            break;
        case 'editarCuenta':
            $cuentaControlador->cambio();
            break;
        case 'eliminarCuenta':
            $cuentaControlador->baja();
            break;
        
        case 'agregarTransaccion':
            $transaccionControlador->alta();
            break;
        case 'editarTransaccion':
            $transaccionControlador->cambio();
            break;
        case 'eliminarTransaccion':
            $transaccionControlador->baja();
            break;
    


    }
} else {
        $personaControlador->listar();
}

?>