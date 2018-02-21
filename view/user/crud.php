<?php
	include("../../model/connection.php");
    include("../../controller/security.php");
    
    if($id_type_user != 2){
        header("location: ../../login.php");
        exit();
    }

	$tabla="SELECT location, capacity FROM crud ";
	$resultado = $conexion->query($tabla);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Icon Coficab-->
	<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
    <!--Design General-->
    <link rel="stylesheet" href="../../css/design.css">
    <!--Menu-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Crud</title>
</head>
<body>
<nav class="bar-horizon">
    <div class="logocoficab">
        <a href="#"><img src="../../img/coficab.png" alt="20px"></a>
      
            <ul class="nav nav-pills">
                <li><a href="home.php">Home</a></li>
                <li><a href="warehousestatus.php">Warehouse Status</a></li>
                <li><a href="rackinformation.php">Information for Rack</a></li>
                <li class="active"><a href="crud.php">Crud</a></li>
                <li><a href="transactions.php">Transactions</a></li>
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
<div class="table-responsive">  
     <h2 >CRUD</h2><br />  
     <div id="datos">
     </div>                 
</div>  
</div>  
</body>  
</html>  

<script type="text/javascript" src="../../js/crudac.js"></script>