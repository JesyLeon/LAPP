<?php
	//CONEXION A SQL SERVER
	$servername = "SQLMX\ERPLN";//Nombre del servidor
									//Base de datos       usuario        contraseña
	$connectionInfo = array("Database"=>"erplnfp9db", "UID"=>"lapp", "PWD"=>"jess123lapp","CharacterSet"=>"UTF-8");
	$con = sqlsrv_connect($servername, $connectionInfo);

	if ($con) 
	{
		//echo "Succesfull";
	}
	else
	{
		echo "Fail Connection";
	}
	
?>