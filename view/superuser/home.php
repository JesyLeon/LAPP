<?php

include_once("../../model/connection.php");
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
    <script type="text/javascript" src="../../js/Chart.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--Grafics-->
    <script type="text/javascript">
    $(document).ready(function(){
        //GRAFICA 1
            <?php
                $sql="SELECT * FROM vista_gral ";
                $result=mysqli_query($conexion, $sql);
            ?>
         
        //GUARDAR LOS REGISTROS
            var dtos = [<?php while ($registros=mysqli_fetch_array($result)){?><?php echo $registros["A"] ?>,<?php echo $registros["B"] ?>,<?php echo $registros["C"]?>,
            <?php echo $registros["D"]?>,<?php echo $registros["E"]?>,<?php echo $registros["F"]?>,<?php echo $registros["G"]?>,<?php echo $registros["H"]?>,<?php echo $registros["I"]?>,<?php echo $registros["J"]?>,<?php echo $registros["K"]?>,<?php echo $registros["L"]?>,<?php echo $registros["M"]?>,<?php echo $registros["N"]?>,<?php echo $registros["O"]?>,<?php echo $registros["P"]?>,<?php echo $registros["Q"]?>,<?php echo $registros["R"]?>,<?php echo $registros["S"]?>,<?php echo $registros["T"]?>,<?php echo $registros["U"]?>,<?php echo $registros["V"]?>,<?php echo $registros["W"]?>,<?php echo $registros["X"]?>,<?php echo $registros["Y"]?>,<?php echo $registros["Z"]?>,
                    <?php }?>];
       
        //RETORNAR COLOR DEPENDIENDO DE LOS VALORES GUARDADOS EN dtos
            const colours = dtos.map((value) =>  {if (value > 1000) return 'red'; else if (value < 1000) return 'yellow'; else return 'green';});
            var datos={//DATOS A MOSTRAR EN EL CHART
                 //LABELS EN EJE X
                labels:[
                    'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'
                ],

                datasets:[{//DATOS QUE MUESTRAN LAS CANTIDADES DE LA COLUMNA
                   label: "racks",
                    //LOS DATOS SERAN IGUALES A LA VARIABLE dtos
                    data: dtos,
                    //El color será igual a lo que retorne colours
                    backgroundColor: colours,
                    //backgroundColor: ['blue','red','yellow'],
                    borderWidth: 1,   
                                   
                }],
               
            };

            //GRAFICA 2
           

            //GRAFICA 3
            <?php
                $sql1="SELECT * FROM vista_gral";
                $result1=mysqli_query($conexion, $sql1);
            ?>
            var dto = [<?php while ($registros1=mysqli_fetch_array($result1)){?><?php echo $registros1["A"] ?>,<?php echo $registros1["B"] ?>,<?php echo $registros1["G"] ?>,
                    <?php }?>];
            const colour = dto.map((value) =>  {if (value > 1000) return 'red'; else if (value < 1000) return 'yellow'; else return 'green';});
            var datos2= {
                type:"pie",
                data:{
                    datasets:[{
                    backgroundColor: colour,
                    data:<?php
                        $sql="SELECT * FROM vista_gral";
                        $result=mysqli_query($conexion, $sql);
                        ?>
                       [ <?php while ($registros=mysqli_fetch_array($result)){?><?php echo $registros["A"] ?>,<?php echo $registros["B"] ?>,<?php echo $registros["G"] ?>,
                    <?php }?>]  
                }],
                labels:[
                    'EMPTY','OVER','FULL'
                ]
               
                },
                options:{
                    responsive: true,
                    title:{
                        display:true,
                        text: "WAREHOUSE STATUS",
                    }
                }
            };

             //GRAFICA 4
             <?php
                $sql2="SELECT shift_trans,SUM(`num_trans`) as suma FROM `transactions` GROUP BY `shift_trans`";;
                $result2=mysqli_query($conexion, $sql2);
            ?>
            var dt = [<?php while ($registros2=mysqli_fetch_array($result2)){?><?php echo $registros2["suma"] ?>,
                    <?php }?>];
            const col = dt.map((value) =>  {if (value > 6) return 'red'; else if (value < 6) return 'yellow'; else return 'green';});
             var datos3= {
                type:"line",
                data:{
                    datasets:[{
                    fill: true,
                    fillColor: "rgba(151,249,190,0.5)",
                    borderColor:"rgb(127, 179, 213)",
                    pointBackgroundColor: col,
                    pointBorderColor: col,
                    pointBorderWidth: 6,
                   data:<?php
                        $sql="SELECT shift_trans,SUM(`num_trans`) as suma FROM `transactions` GROUP BY `shift_trans`";
                        $result=mysqli_query($conexion, $sql);
                        ?>
                       [ <?php while ($registros=mysqli_fetch_array($result)){?><?php echo $registros["suma"] ?>,
                    <?php }?>]  
                }],
                labels:[
                    <?php
                        $sql="SELECT shift_trans, num_trans FROM transactions GROUP BY shift_trans";
                        $result= mysqli_query($conexion,$sql);
                        while($registros=mysqli_fetch_array($result))
                        {
                          ?>
                        '<?php echo $registros["shift_trans"]?>',
                        <?php
                        }
                    ?>
                ]
               
                },
                options:{
                    responsive: true,
                    title:{
                        display:true,
                        text: "Transactions to WHS"
                    }
                }
            };

            //PROPIEDADES DEL CHART1
            var canvas=document.getElementById("chart").getContext('2d');
            window.bar=new Chart(canvas,{
                type:"bar",
                data:datos,
                options:{
                    scales: {
                          yAxes: [{
                               ticks: {
                                beginAtZero: true,                           
                                          }
                             }]
                    },
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
                        text: "RACKS STATUS"
                    }
                }
            });  
             //PROPIEDADES DEL CHART2
             
             //PROPIEDADES DEL CHART3
            var canvas=document.getElementById("chart2").getContext('2d');
            window.pie=new Chart(canvas,datos2);

             //PROPIEDADES DEL CHART4
             var canvas=document.getElementById("chart3").getContext('2d');
            window.line=new Chart(canvas,datos3);
     
        
    });
    </script>

    <title>Home</title>
</head>
<body>
<nav class="bar-horizon">
    <div class="logocoficab">
        <a href="#"><img src="../../img/coficab.png" alt="20px"></a>
      
            <ul class="nav nav-pills">
                <li class="active"><a href="home.php">Home</a></li>
                <li><a href="warehousestatus.php">Warehouse Status</a></li>
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
    <h2>Home</h2>
    <div id="canvas-container" style="width:30%;">
        <canvas id="chart" width="200" height="150"></canvas>
    </div>

    <div id="canvas-container" style="width:30%;">
        <canvas id="chart2" width="200" height="150"></canvas>
    </div>
    <div id="canvas-container" style="width:30%;">
        <canvas id="chart3" width="200" height="150"></canvas>
    </div>

    </div>
    




    


</body>
</html>