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
		fputcsv($salida, array('Shift', 'No. Spools Without Location', 'No. Transactions', 'Date'));

		//Query para crear el reporte
		$reporte = $conexion->query("SELECT shift.shift, withoutlocation.num_woloca AS WO, withlocation.num_loca AS W, withlocation.t_vrdt AS t_vrdt
									 FROM withoutlocation, withlocation, shift 
									 WHERE withoutlocation.t_vrdt = withlocation.t_vrdt 
									 AND withoutlocation.id_shift = shift.id_shift 
									 AND withlocation.id_shift = shift.id_shift 
									 AND withlocation.t_vrdt BETWEEN '$fecha_inicio' AND '$fecha_termino' ");
		while($fila = $reporte->fetch_assoc())
			fputcsv($salida, array ($fila['shift'], 
									$fila['WO'],
									$fila['W'],
									$fila['t_vrdt']
                                ));
	}               

?>