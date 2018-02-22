<?php 
	include("../../../../model/connection.php"); 

	$status = $_POST['status'];

	if(isset($_POST['genera_reporte'])){
		//Nombre del Archivo y Charset
		header('Content-Type:text/csv; charset=latin1');
		header('Content-Disposition: attachment; filename="Report of Racks for day.csv"');

		//Salida de Archivo
		$salida = fopen('php://output', 'w');

		//Encabezados
		fputcsv($salida, array('Location', 'No. spools', 'Status'));//titulos de la tabla

		//Query para crear el reporte
		$reporte = $conexion->query("SELECT location, spools, status FROM racks WHERE status = '$status'");
		while($fila = $reporte->fetch_assoc())
			fputcsv($salida, array ($fila['location'], 
									$fila['spools'],
									$fila['status']
								));
	}
	if ($status== "GENERAL"){
		$reporte = $conexion->query("SELECT location, spools, status FROM racks");
		while($fila = $reporte->fetch_assoc())
			fputcsv($salida, array ($fila['location'],
									$fila['spools'],
									$fila['status']
								));
	}               

?>