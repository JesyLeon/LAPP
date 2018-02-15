<?php

	include("../model/connection.php");
	include("../controller/security.php");
	//echo $nom_user;
	//echo "<br>";
	if($id_type_user != 1){
		header("location: ../../login.php");
		exit();

	$brouse = "";

	if(!empty($_POST)){
		$value = $_POST['filter'];
		if(!empty($value)){
			$brouse = "WHERE shift LIKE '%$value%', num_trans LIKE '%$value%', date_trans LIKE '%$value%'";
			
		}
	}

	$table="SELECT id_trans, shift, num_trans, date_trans FROM transactions ";
	$result = $con->query($table);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Transactions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Icon Coficab-->
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
  <!--Disaing General-->
  <link rel="stylesheet" href="../css/design.css">
  <!--Menu-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--Table-->
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="../js/jquery.dataTables.min.js"></script>
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
</head>
<body>

<nav class="bar-horizon">
    <div class="logocoficab">
        <a href="#"><img src="../img/coficab.png" alt="20px"></a>
        
        <ul class="nav nav-pills">
            <li><a href="home.php">Home</a></li>
            <li><a href="warehousestatus.php">Warehouse Status</a></li>
            <li><a href="rackinformation.php">Information for Rack</a></li>
            <li><a href="crud.php">Crud</a></li>
            <li class="active"><a href="transactions.php">Transactions</a></li>
          </ul>
          <br>
          
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

</div>
</body>
</html>  