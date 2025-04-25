<?php require_once 'controller/ControladorCorredor.php';


// Crear una instancia del controlador

$controlador = new ControladorCorredor();


// Verificar si se ha especificado una acción en la URL

if (isset($_GET['action'])) {

    switch ($_GET['action']) {

        case 'iniciarSesion':

            // Llamar al método que maneja el inicio de sesión

            $controlador->iniciarSesion($_POST['correo_electronico'], $_POST['contrasena']);

            break;


        case 'registrar':

            // Llamar al método que maneja el registro de un nuevo estudiante

            $controlador->registrarCorredor($_POST['nombre_usuario'],  $_POST['apellido_usuario'],$_POST['correo_electronico'], $_POST['contrasena']);

            break;


        case 'mostrarRegistro':

            // Mostrar el formulario de registro

            $controlador->mostrarRegistro();

            break;
        
        case 'cerrarSesion':

            // Cerrar sesión y redirigir al formulario de inicio de sesión

            $controlador->cerrarSesion();
            break;
//------------------------------------------------------------------
        case 'cambiarContrasena':

                // Mostrar el formulario de registro
                
                $controlador->cambiarContrasena($_POST['correo_electronico'],$_POST['new_password'],$_POST['confirm_password'],$_POST['current_password']);
    
                break;


        default:

            // Si la acción no es reconocida, redirigir al formulario de inicio de sesión

            $controlador->mostrarLogin();

            break;

    }

} else {

    // Si no se ha especificado ninguna acción, mostrar el formulario de inicio de sesión por defecto

    $controlador->mostrarLogin();
}