<?php  
 $connect = mysqli_connect("localhost", "root", "", "lapp");  
 
 $location = $_POST["location"];  
 $capacity = $_POST["capacity"];  

 $sql = "UPDATE crud SET location='".$location."', capacity='".$capacity."' WHERE location='".$location."'";
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>