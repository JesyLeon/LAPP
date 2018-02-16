<?php 
	include("../../../../model/connection.php"); 

	$fecha_inicio = $_POST['fecha_inicio'];
	$fecha_termino = $_POST['fecha_termino'];

	if(isset($_POST['generar_reporte'])){
		//Nombre del Archivo y Charset
		header('Content-Type:text/csv; charset=latin1');
		header('Content-Disposition: attachment; filename="Report of transactions for month.csv"');

		//Salida de Archivo
		$salida = fopen('php://output', 'w');

		//Encabezados
		fputcsv($salida, array('Shift', 'No. Transactions', 'Date'));

		//Query para crear el reporte
		$reporte = $conexion->query("SELECT shift, num_trans, date_trans FROM transactions WHERE date_trans BETWEEN '$fecha_inicio' AND '$fecha_termino' ");
		while($fila = $reporte->fetch_assoc())
			fputcsv($salida, array ($fila['shift'], 
									$fila['num_trans'],
									$fila['date_trans']
                                ));
	}               

?>