<?php
    class Clasedb{
    private $conexion;
    public function MySQL(){
      if(!isset($this->conexion)){
      $this->conexion = (mysql_connect("localhost","root","")) or die(mysql_error());
      mysql_select_db("lapp",$this->conexion) or die(mysql_error());
      }
      }
    public function consulta($consulta){
      $resultado = mysql_query($consulta,$this->conexion);
      if(!$resultado){
      echo 'MySQL Error: ' . mysql_error();
      exit;
      }
      return $resultado;  
      }
    public function obtenerfilas($consulta){  
      return mysql_fetch_array($consulta);
      }
    public function totalfilas($consulta){  
      return mysql_num_rows($consulta);
      }
     
    } ?>
<? error_reporting(0);
    include("../model/connection.php");
    //Instaciamos la clase de base de datos
    $db = new Clasedb();
    //Llamamos a la funcion para conectar a la base de datos
    $db->MySQL();
     
    //leemos los datos enviados y los guardamos en matrices
    $location=$_POST['location'];
    $capacity=$_POST['capacity'];
   
     
    //recorremos y vamos insertando los datos en la tabla mysql
    for ($i = 0; $i < count($location); $i++) {
    $sql = "INSERT INTO `crud` ( `location` , `capacity`)
    	 VALUES( '".$location[$i]."' , '".$capacity[$i]."')";
     
    //Grabamos los datos en la tabla personal
    $consulta = $db->consulta($sql);	
    }
     
    //volvemos a la pagina inicial
    header('Location: ../view/crud.php');
    ?>