<?php
require_once 'app/controladores/generos.controlador.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// tabla de ruteo

// listar  -> GenerosControlador->showGenero();
// nueva  -> GenerosControlador->addGenero();
// eliminar/:ID  -> GenerosControlador->deleteGenero($id);
// finalizar/:ID -> GenerosControlador->finishGenero($id);
// ver/:ID -> GenerosControlador->view($id); COMPLETAR

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'listar':
        $controller = new GenerosControlador();
        $controller->mostrarGeneros();
        break;
    case 'nueva':
        $controller = new GenerosControlador();
        $controller->agregarGenero();
        break;
    case 'eliminar':
        $controller = new GenerosControlador();
        $controller->borrarGenero($params[1]);
        break;
       //case 'img':
       // $controller = new GenerosControlador();
       // $controller->($params[1]);
       // break;
    case 'finalizar':
        $controller = new GenerosControlador();
        $controller->finalizarGenero($params[1]);
        break;
    default: 
        echo "404 Page Not Found"; // deberiamos llamar a un controlador que maneje esto
        break;
}