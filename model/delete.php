<?php  
 $connect = mysqli_connect("localhost", "root", "", "lapp");  
 $sql = "DELETE FROM crud WHERE location = '".$_POST["location"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>