<?php

try{
    $conexion = new PDO('mysql:host=localhost;dbname=gastos_bys', 'root', '');
    // echo "Conexión OK";
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();

}

// se debe reeemplazar esta linea para hacer comit en el repositorio y que tenga efecto la BD
// ('mysql:host=localhost;dbname=BD_solusoft', 'israelprogramador', '744920lovepass')

// conexion en localhost
// ('mysql:host=localhost;dbname=gastos_bys', 'root', '')

?>