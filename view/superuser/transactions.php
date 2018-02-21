<?php

include("../../model/connection.php");
include("../../controller/security.php");

if($id_type_user != 1){
    header("location: ../../login.php");
    exit();
}
	
	$brouse = "";

	if(!empty($_POST)){
		$value = $_POST['filter'];
		if(!empty($value)){
			$brouse = "SELECT shift, num_ trans, date_trans FROM transactions WHERE date_trans LIKE '%".$value."%'";
			
		}
	}

	$table="SELECT id_trans, shift, num_trans, date_trans FROM transactions ";
	$result = $conexion->query($table);
	
	/*if(isset($_POST['filter'])){
		$q = $mysli->real_escape_string($_POST['filter']);
		$table = "SELECT shift, num_ trans, date_trans FROM transactions WHERE date_trans LIKE '%".$value."%'";
			
	}*/
  
  header("Refresh: 60; URL='transactions.php'");

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Transactions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Icon Coficab-->
	<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
  <!--Desing General-->
  <link rel="stylesheet" href="../../css/design.css">
  <!--Menu-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!---Modal Window-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--Calendar--> 
  <script src="../../js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="../../css/bootstrap-datepicker.css"> 
  <!--Table-->
  <link rel="stylesheet" href="../../css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="../../js/jquery.dataTables.min.js"></script>
  <script>
  		$(document).ready(function() {
  			$('#myTable').DataTable({
  				"order":[[2, "desc"]],
  				"language":{
  				  "lengthMenu": "Show _MENU_ records per page",
  			  	"info": "Showing page _PAGE_ of _PAGES_",
  				  "infoEmpty": "There are no records available",
  				  "infoFiltered": "(Filtered from _MAX_ records)",
  				  "loadingRecords": "Loading...",
  				  "processing": "Processing...",
  				  "search": "Search",
  				  "zeroRecords": "No matching records were found",
  				  "paginate":{
  					  "next": "Next",
  					  "previous": "Previous"
  					},
  				}
  			});
  		});
  	</script>
</head>
<body>

<nav class="bar-horizon">
    <div class="logocoficab">
        <a href="#"><img src="../../img/coficab.png" alt="20px"></a>
        
        <ul class="nav nav-pills">
            <li><a href="home.php">Home</a></li>
            <li><a href="warehousestatus.php">Warehouse Status</a></li>
            <li><a href="rackinformation.php">Information for Rack</a></li>
            <li><a href="crud.php">Crud</a></li>
						<li class="active"><a href="transactions.php">Transactions</a></li>
          </ul>
		</div>
		<div class="loginout">
			<div class="centrado">
				<?php
    		       if(isset($_SESSION['name_user'])){
            echo "Welcome ".$_SESSION['name_user']." | ";
          }
       	?><a href="../../loginout.php">Login Out</a>
			</div>
		</div>
</nav>

<div class="container">
    <h2>Transactions</h2>

    <h3>Transactions to Warehouse</h3><br>  
    
    <table class="table table-striped table-bordered" id="myTable" >
      <thead>
        <tr>
          <th>Shift</th>
          <th>N°. Spools Transactions</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
          while($row= $result->fetch_assoc()){
					?>
					<tr>
						<!--<td><php echo $row['id_salida']; ?></td>-->
						<td><?php echo $row['shift']; ?></td>
						<td><?php echo $row['num_trans']; ?></td>
						<td><?php echo $row['date_trans']; ?></td>
					</tr>
          <?php
          }
          ?>
      </tbody>
    </table>
    <br>
       <!--Button for print the excel report-->
    <!--<button type="button" class="btn btn-success">Print</button>

   <script> 
    $(document).on('click', '.btn', function(){
   alert("Excel file");//prueba
    });
   </script>-->

   <div class="botones">
				<div id="izquierda">
					<form action="../../../controlador/admin/reportes/concepto_entregas/concepto_entregas_general.php" method="post" id="insert_form" accept-charset="utf-8">
						<input type="submit" name="reporte_general" id="insert" value="Report General" class="btn btn-success">
					</form>
				</div>
				<div id="centrado">
					<a class='btn btn-success' value="report_month" data-toggle="modal" href="#Reporte_Mensual">Report for Month <!--<span class="fa fa-file-excel-o"></span>--></a>
				</div>
				<div id="derecha">
					<a class='btn btn-success' value="reporte" data-toggle="modal" href="#Reporte_Diario">Report of day <!--<span class="fa fa-file-excel-o"></span>--></a>
				</div>							
			</div><br>

      <div class="modal fade" id="Reporte_Mensual">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-tittle">Report</h2>
						</div>
						<div class="modal-body">
							<form action="../../controller/superuser/reports/transactions/report_month.php" method="post" id="insert_form" accept-charset="utf-8">
								<label>Start date</label>
								<div class="input-group date calendario">
  									<input type="text" name="fecha_inicio" id="fecha_inicio" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
								</div>
								<br>
								<label>End date</label>
								<div class="input-group date calendario">
  									<input type="text" name="fecha_termino" id="fecha_termino" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
								</div>
								<br>
								<input type="submit" name="generar_reporte" id="insert" value="Print report" class="btn btn-success">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>		
			</div>

			<div class="modal fade" id="Reporte_Diario">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-tittle">Report</h2>
						</div>
						<div class="modal-body">
							<form action="../../controller/superuser/reports/transactions/report_day.php" method="post" id="insert_form" accept-charset="utf-8">
								<label>Date</label>
								<div class="input-group date calendario">
  									<input type="text" name="fecha" id="fecha" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
								</div>
								<br>
								<input type="submit" name="genera_reporte" id="insert" value="Print report" class="btn btn-success">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>		
			</div>

      <script>
		$(document).ready(function(){

				$('.calendario').datepicker({
    			format: "yyyy/mm/dd"
				});
			});
		</script>

</div>
</body>
</html>  