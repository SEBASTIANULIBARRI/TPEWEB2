<?php

class GenerosModelo {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=db_tpe;charset=utf8', 'root', '');
    }
 
    public function obtenerGeneros() {
        // 2. Ejecuto la consulta
        $query = $this->db->prepare('SELECT * FROM generos');
        $query->execute();
    
        // 3. Obtengo los datos en un arreglo de objetos
        $generos = $query->fetchAll(PDO::FETCH_OBJ); 
        var_dump($generos);
        return $generos;
      }
 
    public function obtenerGenero($id) {    
        $query = $this->db->prepare('SELECT * FROM generos WHERE id = ?');
        $query->execute([$id]);   
    
        $generos = $query->fetch(PDO::FETCH_OBJ);
    
        return $generos;
    }
 
    public function insertarGenero($nombre, $descripcion, $ruta_imagen ) { 
        $query = $this->db->prepare('INSERT INTO generos(nombre, descripcion, Ruta_imagen) VALUES (?, ?, ?)');
        $query->execute([$nombre, $descripcion, $ruta_imagen]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }
 
    public function borrarGenero($id) {
        $query = $this->db->prepare('DELETE FROM generos WHERE id = ?');
        $query->execute([$id]);
    }

    public function actualizarGenero($id) {        
        
    }
}