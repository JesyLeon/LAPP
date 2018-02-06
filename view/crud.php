<?php
	include("../model/connection.php");

	$where = "";

	if(!empty($_POST)){
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE id_crud LIKE '%$valor%', location LIKE '%$valor%', capacity LIKE '%$valor%'";
			
		}
	}

	$tabla="SELECT id_crud, location, capacity FROM crud ";
	$resultado = $conexion->query($tabla);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Icon Coficab-->
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <!--Design General-->
    <link rel="stylesheet" href="../css/design.css">
    <!--Menu-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Crud</title>
</head>
<body>
<nav class="bar-horizon">
    <div class="logocoficab">
        <a href="#"><img src="../img/coficab.png" alt="20px"></a>
        <ul class="nav nav-pills">
                <li><a href="home.php">Home</a></li>
                <li><a href="warehousestatus.php">Warehouse Status</a></li>
                <li><a href="rackinformation.php">Information for Rack</a></li>
                <li class="active"><a href="crud.php">Crud</a></li>
                <li><a href="transactions.php">Transactions</a></li>
            </ul>
            <br>
    </div>
</nav>
    
<div class="container">
    <h2>Crud</h2>
    

    <h3>Crud</h3>    
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Location</th>
          <th>Capacity</th>
         
        </tr>
      </thead>
      <tbody>
        <?php
          while($row= $resultado->fetch_assoc()){
					?>
					<tr>
                        <!--Save data on the table-->
                        <td class="id_crud"><?php echo $row['id_crud']; ?></td>
						<td class="location"><?php echo $row['location']; ?></td>
						<td class="capacity"><?php echo $row['capacity']; ?></td>
						
					</tr>
                    <?php
                }
            ?>
            
      </tbody>
      
    </table>
    <button type="button" class="button">New</button> <input type="submit" class="button" value="Save">
   
   <?

$id_crud = $_POST['id_crud'];
$location = $_POST['location'];
$capacity = $_POST['capacity'];


$query .= "INSERT INTO crud (id_crud, location, capacity) VALUES ";

for($i=0;$i<$id_crud;$i++){

$query .= "('" . $id_crud[$i] . "','" . $location[$i] . "','" . $capacity[$i] . "')";

//$query .= ($i<$total-1) ? "," : "";

}


echo $query;

mysql_query($query) or die(mysql_error());

?> 
    <script type="text/javascript" src="../js/taba.js"></script>

   
    
  
    
</div>
    
</body>
</html>