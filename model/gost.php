<?php
	//SQL SERVER
	include_once 'conn_sql.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>REGISTRO</title>
</head>
<body>
	<h1>PRUEBA DB</h1>
	<?php
		$sql = "SELECT t_huid, t_vrtd, t_hust, t_cwar, t_loca FROM twhwmd530630 WHERE t_hust ='9' AND t_cwar= 'DHBFG1' AND t_loca='0000'";
		$consulta = sqlsrv_query($con,$sql);

		while($Row=sqlsrv_fetch_array($consulta))
		{
			//MYSLQ
			include 'connection.php';

			$hu = $Row['t_huid'];
			$datetm = $Row['t_vrdt']->format('Y/m/d, H:i:s');
			$status = $Row['t_hust'];
			$wh = $Row['t_cwar'];
			$locacion = $Row['t_loca'];

			echo '<table>';
			echo '<tr>';
			echo '<td>'.$hu.'<td/>'.
				 '<td>'.$datetm.'<td/>'.
				 '<td>'.$status.'<td/>'.
				 '<td>'.$wh.'<td/>'.
				 '<td>'.$locacion.'<td/><br>';
			echo '</tr>';
			echo '</table>';

			/*$sentencia = "INSERT INTO twhwmd530630 values ('$hu', '$status', '$wh', '$locacion')";
			$result = mysqli_query($conexion,$sentencia)
			or die ("Error al insertar los registros");*/
			
			/*INSERCIÓN DE DATOS A TABLA SIN LOCACIÓN */
			$withoutlocation = "INSERT INTO withoutlocation values ('$hu', '$datetm', '$status', '$wh', '$locacion')";
			$res = mysqli_query($conexion,$withoutlocation)
			or die ("Error al insertar los registros");

			mysqli_close($conexion);
		}

		
	?>
</body>
</html>