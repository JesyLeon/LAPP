<?php
	//SQL SERVER
	include_once 'conn_sql.php';


		/*VARIABLES CONSULTA 1ER SHIFT*/
		$firstini = date("Y-m-d 04:01");
		$firstfin = date("Y-m-d 12:00");
		
		/*VARIABLES CONSULTA 2ND SHIFT*/
		$secondini = date("Y-m-d 12:01");
		$secondfin = date("Y-m-d 19:30");
		
		/*VARIABLES CONSULTA 3TH SHIFT*/
		$thirdini = date("Y/m/d 19:30:01",time()-25200);
		$thirdfin = date('Y/m/d 04:00:00',time()+84600);

      
        
       /*VARIABLES PARA IF 1ER SHIFT*/
		$hourfirstini = date("04:00:01");
		$hourfirstfin = date("12:00:00");
		
		/*VARIABLES PARA IF 2ND SHIFT*/
		$hoursecondini = date("12:00:01");
		$hoursecondfin = date("19:30:00");
		
		/*VARIABLES PARA IF 3TH SHIFT*/
		$hourthirdini = date("19:30:01");
		$hourthirdfin = date("04:00:00");
		
		/*VARIABLE TODAY*/
		/*$sfirstini = date("Y-m-d 13:00:001");
		$sfirstfin = date("Y-m-d 21:00:000");*/
		$today = date("Y/m/d",time()-25200);

		/*VARIABLE YESTERDAY*/
		$yesterday = date('Y-m-d',time()-(60*60*24));

		/*VARIABLE HORA ACTUAL*/
		$time = time()-25200;
		$hour = date("H:i:s", $time);

		/*VARIABLE HOY*/
		$hoy = date("Y/m/d H:i:s",$time); 

		//echo $yester;
		echo "Primer turno <br>";
		echo $firstini;
		echo "<br>";
		echo $firstfin;
		echo "<br>";
		echo "<br>";
		echo "Segundo turno <br>";
		echo $secondini;
		echo "<br>";
		echo $secondfin;
		echo "<br>";
		echo "<br>";
		echo "Tercero turno <br>";
		echo $thirdini;
		echo "<br>";
		echo $thirdfin;
		echo "<br>";
		echo "<br>";
		echo "Hoy <br>";
		echo $today;
		echo "<br>";
		echo "<br>";
		echo "Ayer <br>";
		echo $yesterday;
		echo "<br>";
		echo "<br>";
		echo "Hora <br>";
        echo $hour;
        
        
        if ($hour>= $hourfirstini && $hour<=$hourfirstfin){
			echo "<br><br> Tu Estas en Primer Turno <br>";
            /*VARIABLE OF SHIFT*/
            $id_shift = 1;
			/*QUERY FIRST SHIFT */
			$sql1 = "SELECT COUNT(t_huid) AS wol
					FROM twhwmd530630
					WHERE t_hust ='9'
					AND t_loca='0000'
					AND t_idat< '$firstfin'
					AND t_idat> '$firstini'";

			$stmt1 = sqlsrv_query( $con, $sql1 );

			if( $stmt1 === false) {
				die( print_r( sqlsrv_errors(), true) );
			}

			while( $row = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC) ) {
	  			$wol = $row['wol']."<br />";
	  			echo $wol;
				
			}
            sqlsrv_free_stmt($stmt1);
            
            /*QUERY FIRST SHIFT */
        $sql = "SELECT COUNT(t_huid) AS wl
        FROM twhwmd530630 
        WHERE t_hust='9'
        AND t_idat< '$firstfin'
        AND t_idat> '$firstini'
        AND t_loca<>'0000'
        AND t_cwar='DHBFG1'";

    $stmt = sqlsrv_query( $con, $sql );

    if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
    }

    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
          $wl = $row['wl']."<br />";
          echo $wl;
    }
    sqlsrv_free_stmt($stmt);

        /*INSERT DATA TO DB*/
		include 'connection.php';
          $insert = "INSERT INTO transactions (id_shift, wol, wl, t_vrdt) values ( '$id_shift', '$wol', '$wl', '$today')";
          $result = mysqli_query($conexion,$insert)
          or die ("Error al insertar los registros");

          mysqli_close($conexion);
        } 
         

        else if ($hour>= $hoursecondini && $hour<=$hoursecondfin){
			echo "<br><br> Tu Estas en Segundo Turno <br>";
            /*VARIABLE OF SHIFT*/
            $id_shift = 2;
			/*QUERY SECOND SHIFT */
			$sql1 = "SELECT COUNT(t_huid) AS wol
					FROM twhwmd530630
					WHERE t_hust ='9'
					AND t_loca='0000'
					AND t_idat< '$secondfin'
					AND t_idat> '$secondini'";

			$stmt1 = sqlsrv_query( $con, $sql1 );

			if( $stmt1 === false) {
				die( print_r( sqlsrv_errors(), true) );
			}

			while( $row = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC) ) {
	  			$wol = $row['wol']."<br />";
	  			echo $wol;
				
			}
            sqlsrv_free_stmt($stmt1);
            
            /*QUERY SECOND SHIFT */
        $sql = "SELECT COUNT(t_huid) AS wl
        FROM twhwmd530630 
        WHERE t_hust='9'
        AND t_idat< '$secondfin'
        AND t_idat> '$secondini'
        AND t_loca<>'0000'
        AND t_cwar='DHBFG1'";

    $stmt = sqlsrv_query( $con, $sql );

    if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
    }

    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
          $wl = $row['wl']."<br />";
          echo $wl;
    }
    sqlsrv_free_stmt($stmt);

        /*INSERT DATA TO DB*/
		include 'connection.php';
          $insert = "INSERT INTO transactions (id_shift, wol, wl, t_vrdt) values ( '$id_shift', '$wol', '$wl', '$today')";
          $result = mysqli_query($conexion,$insert)
          or die ("Error al insertar los registros");

          mysqli_close($conexion);
        } 

       else if ($hoy>= $thirdini && $hoy<=$thirdfin){
			echo "<br><br> Tu Estas en Tercero Turno <br>";
            /*VARIABLE OF SHIFT*/
            $id_shift = 3;
			/*QUERY THIRD SHIFT */
			$sql1 = "SELECT COUNT(t_huid) AS wol
					FROM twhwmd530630
					WHERE t_hust ='9'
					AND t_loca='0000'
					AND t_idat< '$thirdfin'
					AND t_idat> '$thirdini'";

			$stmt1 = sqlsrv_query( $con, $sql1 );

			if( $stmt1 === false) {
				die( print_r( sqlsrv_errors(), true) );
			}

			while( $row = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC) ) {
	  			$wol = $row['wol']."<br />";
	  			echo $wol;
				
			}
            sqlsrv_free_stmt($stmt1);
            
            /*QUERY THIRD SHIFT */
        $sql = "SELECT COUNT(t_huid) AS wl
        FROM twhwmd530630 
        WHERE t_hust='9'
        AND t_idat< '$thirdfin'
        AND t_idat> '$thirdini'
        AND t_loca<>'0000'
        AND t_cwar='DHBFG1'";

    $stmt = sqlsrv_query( $con, $sql );

    if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
    }

    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
          $wl = $row['wl']."<br />";
          echo $wl;
    }
    sqlsrv_free_stmt($stmt);

        /*INSERT DATA TO DB*/
		include 'connection.php';
          $insert = "INSERT INTO transactions (id_shift, wol, wl, t_vrdt) values ( '$id_shift', '$wol', '$wl', '$today')";
          $result = mysqli_query($conexion,$insert)
          or die ("Error al insertar los registros");

          mysqli_close($conexion);
        } 

			

        
		/*SEGUNDO TURNO PORTUGAL
		$sql = "SELECT COUNT(t_huid) AS hu
				FROM twhwmd530630 
				WHERE t_hust='9'
				AND t_idat< '2018-03-06 19:30:000'
				AND t_idat> '2018-03-06 12:00:001'
				AND t_loca<>'0000'
				AND t_cwar='DHBFG1'";

		TERCERO TURNO PORTUGAL
		$sql = "SELECT COUNT(t_huid) AS hu
				FROM twhwmd530630 
				WHERE t_hust='9'
				AND t_idat< '2018-03-07 04:00:000'
				AND t_idat> '2018-03-06 19:30:001'
				AND t_loca<>'0000'
				AND t_cwar='DHBFG1'";

		PRIMER TURNO PORTUGAL
		$sql = "SELECT COUNT(t_huid) AS hu
				FROM twhwmd530630 
				WHERE t_hust='9'
				AND t_idat< '2018-03-06 12:00:000'
				AND t_idat> '2018-03-06 04:00:001'
				AND t_loca<>'0000'
				AND t_cwar='DHBFG1'";
		*/

	/*	$sql = "SELECT COUNT(t_huid) AS hu
				FROM twhwmd530630 
				WHERE t_hust='9'
				AND t_idat< '2018-03-07 04:00:000'
				AND t_idat> '2018-03-06 19:30:001'
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
	  $withlocation = "INSERT INTO withlocation (t_vrdt, id_shift, num_loca) values ('2018/03/07', $id_shift, '$n_hu')";
			$result = mysqli_query($conexion,$withlocation)
			or die ("Error al insertar los registros");
			
			mysqli_close($conexion);
}

sqlsrv_free_stmt( $stmt);*/

?>