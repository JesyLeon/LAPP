<?php 
	include("../../../../model/connection.php"); 

	$status = $_POST['loca'];

	if(isset($_POST['genera_reporte'])){
		//Nombre del Archivo y Charset
		header('Content-Type:text/csv; charset=latin1');
		header('Content-Disposition: attachment; filename="Report of Racks for day.csv"');

		//Salida de Archivo
		$salida = fopen('php://output', 'w');

		//Encabezados
		fputcsv($salida, array('Location', 'No. spools'));//titulos de la tabla

		//Query para crear el reporte
		/*$reporte = $conexion->query("SELECT  t_loca, count(t_loca) as loca FROM racks WHERE status = '$status' group by t_loca");
		while($fila = $reporte->fetch_assoc())
			fputcsv($salida, array ($fila['t_loca'], 
									$fila['loca'],
									//$fila['status']
								));*/
								if ($status== "EMPTY"){
									$reporte = $conexion->query("SELECT t_loca, loca FROM vista_reporte WHERE loca < 6 group by t_loca");
									while($fila = $reporte->fetch_assoc())
										fputcsv($salida, array ($fila['t_loca'],
																$fila['loca'],
															
																//,
																//$fila['status']
										));}

										if ($status== "OVER"){
											$reporte = $conexion->query("SELECT t_loca, loca FROM vista_reporte WHERE loca > 6 group by t_loca");
											while($fila = $reporte->fetch_assoc())
												fputcsv($salida, array ($fila['t_loca'],
																		$fila['loca'],
																	
																		//,
																		//$fila['status']
												));}
												if ($status== "FULL"){
													$reporte = $conexion->query("SELECT t_loca, loca FROM vista_reporte WHERE loca = 6 group by t_loca");
													while($fila = $reporte->fetch_assoc())
														fputcsv($salida, array ($fila['t_loca'],
																				$fila['loca'],
																			
																				//,
																				//$fila['status']
														));}
		
		if ($status== "GENERAL"){
		$reporte = $conexion->query("SELECT t_loca, count(t_loca) as loca FROM racks  group by t_loca");
		while($fila = $reporte->fetch_assoc())
			fputcsv($salida, array ($fila['t_loca'],
									$fila['loca'],

									//,
									//$fila['status']
			));
	}
	}              

?>