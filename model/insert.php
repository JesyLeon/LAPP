<?php
    $connect= mysqli_connect("localhost", "root", "", "lapp");
    $query="INSERT INTO crud (location, capacity) VALUES ('".$_POST["location"]."', '".$_POST["capacity"]."')";
    if(mysqli_query($connect, $query))  
    {  
         echo 'Data Inserted';  
    }

    ?>