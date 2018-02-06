<?php 

    $mysqli = new mysqli('localhost', 'root', '', 'lapp');
    
    if($mysqli->connect_error){
        die('Error en la conection' .$mysql->connect_error);
    }
?>