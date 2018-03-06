<?php 

	$conexion = mysqli_connect("localhost", "root", "", "lapp");
	
	if($conexion){
		//echo "Conexion Exitosa";
	}else{
		echo "Fallo en la conexión";
		die(print_r(sqlsrv_errors(), true));
	}
	
	if($conexion->connect_errno):
		echo "Error al conectarse con MySQL debido al error " .$mysql->connect_error;
	endif;

	/*$serverName = "SQLMX\ERPLN";
	$connectionInfo = array("Database"=>"erplnfp9db", "UID"=>"lapp", "PWD" =>"jess123lapp", "CharacterSet"=>"UTF-8");
	$con = sqlsrv_connect($serverName, $connectionInfo);

	if($con){
		echo "Conexion Exitosa";
	}else{
		echo "Fallo en la conexión";
		die(print_r(sqlsrv_errors(), true));
	}*/
	
	
?>