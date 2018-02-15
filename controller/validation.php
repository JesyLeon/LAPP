<?php

session_start();
//sleep(5);
require("../model/connection.php"); 

$user = $_POST['user'];
$pass = $_POST['pass'];

$consulta = "SELECT id_user, name_user, id_type_user FROM users WHERE user = '".$user."' AND pass = md5('".$pass."')";

$resultado = mysqli_query($conexion, $consulta);

if(1 == mysqli_num_rows($resultado)){
    $linea = mysqli_fetch_array($resultado);

    $id_user = $linea[0];
    $nom_user = $linea[1];
    $id_type_user = $linea[2];

    $_SESSION["id_user"] = $id_user;
    $_SESSION["name_user"] = $nom_user;
    $_SESSION["id_type_user"] = $id_type_user;

    /*echo $_SESSION["name_user"];
    echo $_SESSION["id_type_user"];	*/	

    /*echo "$nom_user";
    echo "$id_tipo_user";*/

    /*if($id_tipo_user == 1){
        echo "$nom_user";
        echo "$id_tipo_user";
    }else if ($id_tipo_user == 2){
        echo "$nom_user";
        echo "$id_tipo_user";
    }else if ($id_tipo_user == 3){
        echo "$nom_user";
        echo "$id_tipo_user";
    }*/

    switch ($id_type_user) {
        case '1':
            header("location: ../view/superuser/home.php");
            break;
        
        case '2':
            header("location: ../view/user/home.php");
            break;
    }
    }else{
        echo "<script languaje='javascript'>alert('No se pudo Iniciar Sesión, Verifica que tus datos sean correctos'); 
          window.location='../login.php';</script>";
    }

    mysql_close();

?>
