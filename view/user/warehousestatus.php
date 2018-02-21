<?php
	include("../../model/connection.php");
    include("../../controller/security.php");
    
    if($id_type_user != 2){
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
    <script type="text/javascript" src="../../js/Chart.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
            var datos={//DATOS A MOSTRAR EN EL CHART
                 //LABELS EN EJE X
                labels:[
                    <?php
                        $sql="SELECT location,spools FROM racks";
                        $result= mysqli_query($conexion,$sql);
                        while($registros=mysqli_fetch_array($result))
                        {
                          ?>
                        '<?php echo $registros["location"]?>',
                        <?php
                        }
                    ?>
                ],
                datasets:[{//DATOS QUE MUESTRAN LAS CANTIDADES DE LA COLUMNA
                    label: "Racks",
                    backgroundColor: "rgba( 40, 180, 99 ,0.5)",
                    data:<?php
                        $sql="SELECT * FROM racks";
                        $result=mysqli_query($conexion, $sql);
                        ?>
                       [ <?php while ($registros=mysqli_fetch_array($result)){?><?php echo $registros["spools"] ?>,
                    <?php }?>]
                    
                }]
            };

            //PROPIEDADES DEL CHART
            var canvas=document.getElementById("chart").getContext('2d');
            window.bar=new Chart(canvas,{
                type:"bar",
                data:datos,
                options:{
                    elements: {
                        rectangle:{
                            boderWidth:1,
                            borderColor:"rgb(0,255,0)",
                            borderSkipped: "bottom"
                        }
                    },
                    responsive: true,
                    title:{
                        display:true,
                        text: "Warehouse status"
                    }
                }
            });  
        
    });
    </script>
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
    <h2>Warehouse Status</h2>
    <br>
    <div id="canvas-container" style="width:50%;">
        <canvas id="chart" width="500" height="350"></canvas>
    </div>


</div>

</body>
</html>