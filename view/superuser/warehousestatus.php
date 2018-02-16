<?phinclude("../../model/connection.php");
    include("../../controller/security.php");
    
    if($id_type_user != 1){
        header("location: ../../login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Icon Coficab-->
	<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
    <!--Disaing General-->
    <link rel="stylesheet" href="../../css/design.css">
    <!--Menu-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Warehouse Status</title>
</head>
<body>
<nav class="bar-horizon">
    <div class="logocoficab">
        <a href="#"><img src="../../img/coficab.png" alt="20px"></a>
        <ul class="nav nav-pills">
                <li><a href="home.php">Home</a></li>
                <li class="active"><a href="warehousestatus.php">Warehouse Status</a></li>
                <li><a href="rackinformation.php">Information for Rack</a></li>
                <li ><a href="crud.php">Crud</a></li>
                <li><a href="transactions.php">Transactions</a></li>
                <li><a href="../../loginout.php">login Out</a></li>
            </ul>
            <br>
    </div>
</nav>
    
<div class="container">
    <h2>Warehouse Status</h2>
    <br>
    <div class="iA">
    <canvas id="rA"></canvas>
    <script type="text/javascript" src="../../js/indicadores.js"></script>
<br>
 <label class="A">A</label>
</div>

<div class="iB">
    <canvas id="rB"></canvas>
    <script type="text/javascript" src="../../js/indicadores.js"></script><br>
    <label class="B">B</label>
    </div>

<div class="iC">
    <canvas id="rC"></canvas>
    <script type="text/javascript" src="../../js/indicadores.js"></script><br>
    <label class="C">C</label>
    </div>

<div class="iD">
    <canvas id="rD"></canvas>
    <script type="text/javascript" src="../../js/indicadores.js"></script><br>
    <label class="D">D</label>
    </div>
    
<div class="iE">
    <canvas id="rE"></canvas
    <script type="text/javascript" src="../../js/indicadores.js"></script><br>
    <label class="E">E</label>
    </div>

<div class="iF">
    <canvas id="rF"></canvas>
    <script type="text/javascript" src="../../js/indicadores.js"></script><br>
    <label class="F">F</label>
    </div>

<div class="iG">
    <canvas id="rG"></canvas>
    <script type="text/javascript" src="../../js/indicadores.js"></script><br>
    <label class="G">G</label>
    </div>

</div>

</body>
</html>