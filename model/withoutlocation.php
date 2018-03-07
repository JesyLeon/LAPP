<?php
	//SQL SERVER
	include_once 'conn_sql.php';

		
		$yester = date('Y-m-d',time()-(60*60*24));;
		$datetime = date("Y-m-d H:i:s",time()-25200);
		$today = date("Y/m/d");
		echo $yester;
		echo "<br>";
		echo $datetime;
		echo "<br>";
		echo $today;
		
		$sql = "SELECT t_loca, COUNT(t_huid)
		FROM twhwmd530630
		WHERE t_hust='9'
		and t_idat<'$today' 
		and t_idat>'$yester' 
		and t_loca ='0000'
		GROUP BY t_loca";

		$consulta = sqlsrv_query($con,$sql);

		while($Row=sqlsrv_fetch_array($consulta))
		{

			//MYSLQ
			include 'connection.php';
			
			$wo_loca  = $Row['t_loca'];
			$n_hu = $Row[COUNT('t_huid')];
			echo '<table>';
			echo '<tr>';
			echo '<td>'.$wo_loca.'<td/>'.
				 '<td>'.$n_hu.'<td/>';
			echo '</tr>';
			echo '</table>';

			$withoutlocation = "INSERT INTO withoutlocation values ('$today', '$wo_loca', '$n_hu')";
			$result = mysqli_query($conexion,$withoutlocation)
			or die ("Error al insertar los registros");
			
			mysqli_close($conexion);
		}

?>
