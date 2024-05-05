<?php
require_once ('app/models/persona_model.php');

class Persona_controller
{
    public function listar()
    {
        $personas = Persona::mostrar();
        $_POST['personas'] = $personas;
        include ('app/views/persona/alta_view.php');
    }
    public function editar()
    {
        // Esta seccion funciona para recibir el CI cuando lo enviamos de cuenta_controller.php del metodo cambio() o de alta()
        session_start();
        if (isset($_SESSION['ci']) && count($_POST) == 0) {
            $_POST['ci'] = $_SESSION['ci'];
            session_unset();
            session_destroy();
        }
        //Hata aqui es lo del metodo cambio()


        if (count($_POST) == 1) {
            // Mostrar formulario para editar persona
            $ci = $_POST['ci'];
            $persona = Persona::mostrar_ci($ci);

            if ($persona) {
                include ('app/views/persona/cambio_view.php');
            } else {
                echo "No se encontró la persona.";
            }
        } else {
            // Recuperar los datos del formulario
            $ci = $_POST['ci'];
            $nombres = $_POST['nombres'];
            $paterno = $_POST['paterno'];
            $materno = $_POST['materno'];
            $fecha_nac = $_POST['fecha_nac'];
            $genero = $_POST['genero'];
            $direccion_dom = $_POST['direccion_dom'];
            $telefono = $_POST['telefono'];
            $celular = $_POST['celular'];
            $correo = $_POST['correo'];
            $rol = $_POST['rol'];

            // Procesar la actualización de los datos de la persona en la base de datos
            $resultado = Persona::cambio($ci, $nombres, $paterno, $materno, $fecha_nac, $genero, $direccion_dom, $telefono, $celular, $correo, $rol);

            if ($resultado) {
                echo "Los datos de la persona se actualizaron correctamente.";

                header('Location: index.php?action=listarPersona');
                exit();
            } else {
                echo "Ocurrió un error al actualizar los datos de la persona.";
            }

        }
    }

    public function alta()
    {
        if (isset($_POST['ci']) && isset($_POST['nombres']) && isset($_POST['paterno']) && isset($_POST['materno']) && isset($_POST['fecha_nac']) && isset($_POST['genero']) && isset($_POST['direccion_dom']) && isset($_POST['telefono']) && isset($_POST['celular']) && isset($_POST['correo']) && isset($_POST['password']) && isset($_POST['rol'])) {
            $ci = $_POST['ci'];
            $nombres = $_POST['nombres'];
            $paterno = $_POST['paterno'];
            $materno = $_POST['materno'];
            $fecha_nac = $_POST['fecha_nac'];
            $genero = $_POST['genero'];
            $direccion_dom = $_POST['direccion_dom'];
            $telefono = $_POST['telefono'];
            $celular = $_POST['celular'];
            $correo = $_POST['correo'];
            $password = $_POST['password'];
            $rol = $_POST['rol'];

            // Procesar la actualización de los datos de la persona en la base de datos
            $resultado = Persona::alta($ci, $nombres, $paterno, $materno, $fecha_nac, $genero, $direccion_dom, $telefono, $celular, $correo, $password, $rol);

            if ($resultado) {
                echo "Los datos de la persona se actualizaron correctamente.";

                header('Location: index.php?action=listarPersona');
                exit();
            } else {
                echo "Ocurrió un error al actualizar los datos de la persona.";
            }
        } else {
            include ('app/views/persona/alta_form.php');

        }

    }
    public function baja()
    {
        if (isset($_POST['ci'])) {
            $ci = $_POST['ci'];

            // Procesar la eliminación de la persona en la base de datos
            $resultado = Persona::baja($ci);

            if ($resultado) {
                echo "La persona se eliminó correctamente.";

                header('Location: index.php?action=listarPersona');
                exit();
            } else {
                echo "Ocurrió un error al eliminar la persona.";
            }
        } else {
            echo "Error: Falta el identificador de la persona a eliminar.";
        }
    }


}
?>