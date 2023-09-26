<?php
    require ("configuracion/conexion.php");

// Solicita a la Base de Datos de la tabla semana el numero de semana


    // Seleccionando datos de BD con prepared statements
    $statement = $conexion->prepare('SELECT numero_semana FROM semana');
    $statement->execute();


    // guarda en la variable $res todos los resultados de la solicitud 
    $res = $statement->fetchAll();

    // imprime los datos del Array en el navegador 
    // foreach ($res as $fila) {
    //     print_r($fila);
    // }


// agrupa de mayor a manor los valores de numero de semana
    rsort($res);
    // print_r ($res) ;

?>