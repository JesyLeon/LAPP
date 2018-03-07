<?php
	//SQL SERVER
	include_once 'conn_sql.php';

		
		
		/*First Turno*/
		$sfirstini = date("Y-m-d 13:00:001");
		$sfirstfin = date("Y-m-d 21:00:000");
		$today = date("Y/m/d H:m:s",time()-25200);
		//echo $yester;
		echo "<br>";
		echo $sfirstini;
		echo "<br>";
		echo $sfirstfin;
		echo "<br>";
		echo $today;
		echo "<br>";
		echo "<br>";
		
		$sql = "SELECT COUNT(t_huid) as hu
		FROM twhwmd530630
		WHERE t_hust='9'
		and t_idat<'$sfirstini'  
		and t_idat>'$sfirstfin' 
		and t_loca ='0000'";
         
		$consulta = sqlsrv_query($con,$sql);
		$Row=sqlsrv_fetch_array($consulta);
		echo ($Row);
		echo ($Row);
		echo $consulta[1];
		while($Row=sqlsrv_fetch_array($consulta))
		{

			//MYSLQ
			include 'connection.php';
			
			//$wo_loca  = $Row['t_loca'];
			$n_hu= $Row['hu'];

			//echo $wo_loca;
			echo $n_hu;
			/*echo '<table>';
			echo '<tr>';
			echo '<td>'.$wo_loca.'<td/>'.
				 '<td>'.$n_hu.'<td/>';
			echo '</tr>';
			echo '</table>';*/

			/*$withoutlocation = "INSERT INTO withoutlocation values ('$today', '$wo_loca', '$n_hu')";
			$result = mysqli_query($conexion,$withoutlocation)
			or die ("Error al insertar los registros");
			
			mysqli_close($conexion);*/
		} 

?>
