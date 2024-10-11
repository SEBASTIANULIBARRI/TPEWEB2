<?php
require_once 'app/controladores/generos.controlador.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'listar'; // accion por defecto si no se envia ningun
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'listar':
        $controller = new GenerosControlador();
        if (isset($params[1]) && !empty($params[1])) {
            $controller->mostrarGenero($params[1]);
        } else {
            $controller->mostrarGeneros();
        }
        break;
    case 'agregar':
        $controller = new GenerosControlador();
        $controller->mostrarFormularioCarga();
        break;
    case 'nuevo':
        $controller = new GenerosControlador();
        $controller->agregarGenero();
        break;
    case 'eliminar':
        $controller = new GenerosControlador();
        $controller->borrarGenero($params[1]);
        break;
    case 'datosGenero':
        $controller = new GenerosControlador();
        $controller->datosGenero($params[1]);
        break;
    case 'editar':
        $controller = new GenerosControlador();
        $controller->editarGenero($params[1]);
        break;
    default:
        echo "404 Page Not Found"; // deberiamos llamar a un controlador que maneje esto
        break;
}
