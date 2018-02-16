<?php 
	include("../../../../model/connection.php"); 

	$fecha = $_POST['fecha'];

	if(isset($_POST['genera_reporte'])){
		//Nombre del Archivo y Charset
		header('Content-Type:text/csv; charset=latin1');
		header('Content-Disposition: attachment; filename="Report of Transactions for day.csv"');

		//Salida de Archivo
		$salida = fopen('php://output', 'w');

		//Encabezados
		fputcsv($salida, array('Shift', 'No. Transactions', 'Date'));//titulos de la tabla

		//Query para crear el reporte
		$reporte = $conexion->query("SELECT shift, num_trans, date_trans FROM transactions WHERE date_trans = '$fecha' ");
		while($fila = $reporte->fetch_assoc())
			fputcsv($salida, array ($fila['shift'], 
									$fila['num_trans'],
									$fila['date_trans']
								));
	}               

?>