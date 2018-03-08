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
		echo "<br>";
		echo "<br>";

		/*SEGUNDO TURNO PORTUGAL
		$sql = "SELECT COUNT(t_huid) AS hu
				FROM twhwmd530630 
				WHERE t_hust='9'
				AND t_idat< '2018-03-06 21:00:000'
				AND t_idat> '2018-03-06 13:00:001'
				AND t_loca<>'0000'
				AND t_cwar='DHBFG1'";

		TERCERO TURNO PORTUGAL
		$sql = "SELECT COUNT(t_huid) AS hu
				FROM twhwmd530630 
				WHERE t_hust='9'
				AND t_idat< '2018-03-07 04:30:000'
				AND t_idat> '2018-03-06 21:00:001'
				AND t_loca<>'0000'
				AND t_cwar='DHBFG1'";

		PRIMER TURNO PORTUGAL
		SELECT COUNT(t_huid) AS hu
				FROM twhwmd530630 
				WHERE t_hust='9'
				AND t_idat< '2018-03-06 21:00:000'
				AND t_idat> '2018-03-06 13:00:001'
				AND t_loca<>'0000'
				AND t_cwar='DHBFG1'";
		*/

		$sql = "SELECT COUNT(t_huid) AS hu
				FROM twhwmd530630 
				WHERE t_hust='9'
				AND t_idat< '2018-03-07 04:30:000'
				AND t_idat> '2018-03-06 21:00:001'
				AND t_loca<>'0000'
				AND t_cwar='DHBFG1'";

$stmt = sqlsrv_query( $con, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	  $id_shift = 3;
	  $n_hu = $row['hu']."<br />";
	  echo $n_hu;
	  //MYSLQ

	  include 'connection.php';
	  $withlocation = "INSERT INTO withlocation (t_vrdt, id_shift, num_loca) values ('$today', $id_shift, '$n_hu')";
			$result = mysqli_query($conexion,$withlocation)
			or die ("Error al insertar los registros");
			
			mysqli_close($conexion);
}

sqlsrv_free_stmt( $stmt);

?>