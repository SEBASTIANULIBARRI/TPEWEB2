<?php

class generosVista {
    public function mostrarGeneros($generos) {
        // la vista define una nueva variable con la cantida de generos
        $count = count($generos);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion
        require 'templates/lista_generos.phtml';
    }

    public function mostrarError($error) {
        require 'templates/error.phtml';
    }
    public function mostrarimg($error) {
        
        var_dump($_FILES);
        var_dump($_POST);

$ruta = "img/".$_FILES['foto']['name'];
move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
echo "$ruta";


$salida = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <img src="<?= $ruta?>" alt="">  
</body>
</html>';
echo $salida;

    }



}