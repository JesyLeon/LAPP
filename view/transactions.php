<?php
	include("../model/connection.php");

	$where = "";

	if(!empty($_POST)){
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE shift LIKE '%$valor%', num_trans LIKE '%$valor%', date_trans LIKE '%$valor%'";
			
		}
	}

	$tabla="SELECT id_trans, shift, num_trans, date_trans FROM transactions ";
	$resultado = $conexion->query($tabla);

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    

    <h3>Transactions to Warehouse</h3>  
    <div class="input-group">
        <span class="input-group-addon">Brouse</span>
        <input id="filtrar" type="text" class="form-control" placeholder="Enter the search information...">
    </div>
    <br>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Shift</th>
          <th>N°. Spools Transactions</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
          while($row= $resultado->fetch_assoc()){
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