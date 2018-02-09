<? error_reporting(0);
    include("../model/connection.php");
     
    //leemos los datos enviados y los guardamos en matrices
    $location=$_POST['location'];
    $capacity=$_POST['capacity'];
   
     
    //recorremos y vamos insertando los datos en la tabla mysql
    for ($i = 0; $i < count($location); $i++) {
    $sql = "INSERT INTO `crud` ( `location` , `capacity`)
    	 VALUES( '".$location[$i]."' , '".$capacity[$i]."')";
     
    //Grabamos los datos en la tabla personal
    $resultado = $conexion->query($sql);	
    }
     
    //volvemos a la pagina inicial
    header('Location: crud.php');
    ?>