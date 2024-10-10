<?php
require_once './app/modelos/generos.modelo.php';
require_once './app/vistas/generos.vista.php';

class GenerosControlador {
    private $modelo;
    private $vista;

    public function __construct() {
        $this->modelo = new GenerosModelo();
        $this->vista = new GenerosVista();
    }

    public function mostrarGeneros() {
        // obtengo los géneros de la DB
        $generos = $this->modelo->obtenerGeneros();

        // mando los géneros a la vista
        return $this->vista->mostrarGeneros($generos);
    }

    public function agregarGenero() {
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->vista->mostrarError('Falta completar el título');
        }
    
        if (!isset($_POST['Ruta_imagen']) || empty($_POST['Ruta_imagen'])) {
            return $this->vista->mostrarError('Falta completar la Ruta_imagen');
        }
    
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $ruta_imagen = $_POST['Ruta_imagen'];
    
        $id = $this->modelo->insertarGenero($nombre, $descripcion, $ruta_imagen);
    
        // redirijo al home (también podríamos usar un método de una vista para mostrar un mensaje de éxito)
        header('Location: ' . BASE_URL);
    }

    public function borrarGenero($id) {
        // obtengo el género por id
        $genero = $this->modelo->obtenerGenero($id);

        if (!$genero) {
            return $this->vista->mostrarError("No existe el género con el id=$id");
        }

        // borro el género y redirijo
        $this->modelo->borrarGenero($id);

        header('Location: ' . BASE_URL);
    }

    public function finalizarGenero($id) {
        $genero = $this->modelo->obtenerGenero($id);

        if (!$genero) {
            return $this->vista->mostrarError("No existe el género con el id=$id");
        }

        // actualiza el género
        $this->modelo->actualizarGenero($id);

        header('Location: ' . BASE_URL);
    }
}
