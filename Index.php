<?Php

/*$url = $_POST['controller/validation.php'];
require 'controller/'.$url.'php';*/

/*header("Status: 301 Moved Permanently");
header("Location: http://localhost/lapp/controller/validation.php");*/

/*	session_unset(); //Libera todas las variables de sesión
	session_destroy(); //Destruye toda la información registrada de una sesión
	header("location: login.php");
exit;*/

if($id_type_user != 1){
	header("location: view/superuser/home.php");
}
if($id_type_user != 2){
	header("location: view/user/home.php");
}
else {
	header("Location: http://localhost/lapp/controller/validation.php");
	exit();
}

?>