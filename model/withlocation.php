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

		$sql = "SELECT COUNT(t_huid)
		FROM twhwmd530630 
		WHERE t_hust='9'
		and t_idat<'$today' 
		and t_idat>'$yester' 
		and t_loca <>'0000'
		and t_cwar='DHBFG1'";

		$consulta = sqlsrv_query($con,$sql);

		while($Row=sqlsrv_fetch_array($consulta))
		{

			//MYSLQ
			include 'connection.php';

			$n_hu = $Row[COUNT('t_huid')];
			echo '<table>';
			echo '<tr>';
			echo '<td>'.$n_hu.'<td/>';
			echo '</tr>';
			echo '</table>';

			/*INSERCIÓN DE DATOS A TABLA CON LOCACIÓN */
			/*$withlocation = "INSERT INTO withlocation values ('$today', '$n_hu')";
			$result = mysqli_query($conexion,$withlocation)
			or die ("Error al insertar los registros");
			
			mysqli_close($conexion);*/
		}

?>