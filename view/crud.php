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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
<div class="table-responsive">  
     <h2 >CRUD</h2><br />  
     <div id="datos"></div>                 
</div>  
</div>  
</body>  
</html>  

<script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"../model/select.php",  
                method:"POST",  
                success:function(data){  
                     $('#datos').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var location = $('#location').text();  
           var capacity = $('#capacity').text();  
           if(location == '')  
           {  
                alert("Enter a location");  
                return false;  
           }  
           if(capacity == '')  
           {  
                alert("Enter a capacity");  
                return false;  
           }  
           $.ajax({  
                url:"../model/insert.php",  
                method:"POST",  
                data:{location:location, capacity:capacity},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(location, capacity)  
      {  
           $.ajax({  
                url:"../model/edit.php",  
                method:"POST",  
                data:{location:location, capacity:capacity},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      
      $(document).on('blur', '.capacity', function(){  
           var location = $(this).data("id2");  
           var capacity = $(this).text();  
           edit_data(location,capacity, "capacity");  
      }); 

      $(document).on('click', '.btn_delete', function(){  
           var location=$(this).data("id3");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"../model/delete.php",  
                     method:"POST",  
                     data:{location:location},
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      }); 
    
     
 });  
 </script>