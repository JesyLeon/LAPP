<?php
	//SQL SERVER
	include_once 'conn_sql.php';
    
    $sql_location = "SELECT t_huid, t_vrdt, t_hust, t_cwar, t_loca FROM twhwmd530630 WHERE t_hust ='9' AND t_cwar= 'DHBFG1' AND t_loca LIKE '01%'";
		//SELECT t_huid, t_hust, t_cwar, t_loca FROM twhwmd530630 WHERE t_hust ='9' AND t_cwar= 'DHBFG1' AND t_loca LIKE '01%'
		$consulta = sqlsrv_query($con,$sql_location);

		while($Row=sqlsrv_fetch_array($consulta))
		{
			//MYSLQ
			include 'connection.php';

			$hu = $Row['t_huid'];
			$datetm = $Row['t_vrdt']->format('Y/m/d, H:i:s');
			$status = $Row['t_hust'];
			$wh = $Row['t_cwar'];
            $locacion = $Row['t_loca'];
            
			/*INSERCIÓN DE DATOS A TABLA CON LOCACIÓN */
			$withlocation = "INSERT INTO racks values ('$hu', '$datetm', '$status', '$wh', '$locacion')";
			$result = mysqli_query($conexion,$withlocation);
			//or die ("Error al insertar los registros");
			
			mysqli_close($conexion);
        }
        
        echo "
		<html>
			<head>
				<meta http-equiv='REFRESH' content='0' ; url='rackinformation.php'>
			</head>
		</html>
			";