<?php

function conectarDB()  : mysqli{//Para indicar que esto va returnar una funcion de mysqli
    $db = mysqli_connect('localhost','root','root','bienesraices_crud');
    if(!$db){
        echo "Error no se pudo conectar!";
        exit;//Se debe de poner para detenner la ejecucion para eevitar que se nos filtre informacion
    }
    return $db;
}