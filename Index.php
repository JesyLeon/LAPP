<?Php

/*$url = $_POST['controller/validation.php'];
require 'controller/'.$url.'php';*/

header("Status: 301 Moved Permanently");
header("Location: http://localhost/lapp/controller/validation.php");

/*	session_unset(); //Libera todas las variables de sesión
	session_destroy(); //Destruye toda la información registrada de una sesión
	header("location: login.php");
exit;*/

?>