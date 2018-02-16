<?php
    include("../../model/connection.php");
    include("../../controller/security.php");
    
    if($id_type_user != 1){
        header("location: ../../login.php");
        exit();
    }


	$table="SELECT id_racks, location, spools, status FROM racks ";
	$result = $conexion->query($table);

    header("Refresh: 60; URL='rackinformation.php'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Icon Coficab-->
	<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
    <!--Desing General-->
    <link rel="stylesheet" href="../../css/design.css">
    <!--Menu-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
  				"order":[[0, "asc"]],
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
    <title>Information for Rack</title>
</head>
<body>
<nav class="bar-horizon">
    <div class="logocoficab">
        <a href="#"><img src="../../img/coficab.png" alt="20px"></a>
        <ul class="nav nav-pills">
                <li><a href="home.php">Home</a></li>
                <li><a href="warehousestatus.php">Warehouse Status</a></li>
                <li class="active"><a href="rackinformation.php">Information for Rack</a></li>
                <li><a href="crud.php">Crud</a></li>
                <li><a href="transactions.php">Transactions</a></li>
                <li><a href="../../loginout.php">login Out</a></li>
            </ul>
            <br>
    </div>
</nav>
    
<div class="container">
    <h2>Information for Rack</h2>
  

    <h3>Information for Rack</h3><br>
        
    <table class="table table-striped table-bordered" id="myTable" >
      <thead>
        <tr>
          <th>Location</th>
          <th>No. spools</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
      <?php
      while($row= $result->fetch_array()){
                ?>
                <tr>
                    <!--<td><php echo $row['id_salida']; ?></td>-->
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['spools']; ?></td>
                    <?php 

switch($row['status']){
  case 'EMPTY':
    echo "<td bgcolor='#ebe407'>$row[status]</td>";
    break;
  case 'FULL':
    echo "<td bgcolor='#19d306'>$row[status]</td>";
    break;
    case 'OVER':
    echo "<td bgcolor='#eb3713'>$row[status]</td>";
    break;
  default:
    echo "<td>$row[status]</td>";
    break;
}
?>
                   <!-- <td><?php echo $row['status']; ?></td>-->
                </tr>
                <?php
            }
        ?>
      </tbody>
    </table>

    <?php
$fecha_time = date("d/m/Y, H:i:s");  
?>
    Last Update: <input type="text" id="fecha" value="<?php echo $fecha_time; ?>">
    <br>

       <!--Button for print the excel report
    <button type="button" class="btn btn-success">Print</button>

   <script> 
    $(document).on('click', '.btn', function(){
   alert("Excel file");//prueba
    });
   </script>-->
<div class="botones">
					<a class='btn btn-success' value="reporte" data-toggle="modal" href="#Reporte_Diario">Print report <!--<span class="fa fa-file-excel-o"></span>--></a>
			<div class="modal fade" id="Reporte_Diario">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-tittle">Report</h2>
						</div>
						<div class="modal-body">
							<form action="../../controller/superuser/reports/racks/report_status.php" method="post" id="insert_form" accept-charset="utf-8">
								<label>Status</label><!--combo-->
                                    <select name="status" id="options" class="form-control">
                                        <option value="EMPTY">EMPTY</option>
                                        <option value="FULL">FULL</option>
                                        <option value="OVER">OVER</option>
                                    </select><br>
								<input type="submit" name="genera_reporte" id="insert" value="Excel report" class="btn btn-success">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>		
			</div>

</div> 
</body>
</html>