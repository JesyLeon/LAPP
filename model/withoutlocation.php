<?php
	//SQL SERVER
	include_once 'conn_sql.php';

		
		
		/*First Turno*/
		$sfirstini = date("Y-m-d 13:00:001");
		$sfirstfin = date("Y-m-d 21:00:000");
		$today = date("Y/m/d",time()-25200);

		/*Second shift*/
		$sfirstini = date("Y-m-d 13:00:001");
		$sfirstfin = date("Y-m-d 21:00:000");
		$today = date("Y/m/d",time()-25200);

		/*Third shift*/
		$sfirstini = date("Y-m-d 13:00:001");
		$sfirstfin = date("Y-m-d 21:00:000");
		$today = date("Y/m/d",time()-25200);
		
		//echo $yester;
		echo "<br>";
		echo $sfirstini;
		echo "<br>";
		echo $sfirstfin;
		echo "<br>";
		echo $today;
		echo "<br>";
		echo "<br>";

		/*SEGUNDO TURNO PORTUGAL
		$sql = "SELECT COUNT(t_huid) AS hu
				FROM twhwmd530630
				WHERE t_hust ='9'
				AND t_loca='0000'
				AND t_idat< '2018-03-06 21:00:000'
				AND t_idat> '2018-03-06 13:00:001'";

		TERCERO TURNO PORTUGAL
		$sql = "SELECT COUNT(t_huid) AS hu
				FROM twhwmd530630
				WHERE t_hust ='9'
				AND t_loca='0000'
				AND t_idat< '2018-03-07 04:30:000'
				AND t_idat> '2018-03-06 21:00:001'";

		PRIMER TURNO PORTUGAL
		$sql = "SELECT COUNT(t_huid) AS hu
				FROM twhwmd530630
				WHERE t_hust ='9'
				AND t_loca='0000'
				AND t_idat< '2018-03-06 13:00:000'
				AND t_idat> '2018-03-06 04:30:001'";
		*/

		$sql = "SELECT COUNT(t_huid) AS hu
				FROM twhwmd530630
				WHERE t_hust ='9'
				AND t_loca='0000'
				AND t_idat< '$sfirstfin'
				AND t_idat> '$sfirstini'";

		$stmt = sqlsrv_query( $con, $sql );

		if( $stmt === false) {
    		die( print_r( sqlsrv_errors(), true) );
		}

		while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	  		$id_shift = 3;
	  		$n_hu = $row['hu']."<br />";
	  		echo $n_hu;
	  //MYSLQ

		/*include 'connection.php';
	  		$withoutlocation = "INSERT INTO withoutlocation (t_vrdt, id_shift, num_woloca) values ('$today', '$id_shift', '$n_hu')";
			$result = mysqli_query($conexion,$withoutlocation)
			or die ("Error al insertar los registros");
			
			mysqli_close($conexion);*/
}

sqlsrv_free_stmt( $stmt);
?>

         
		
		