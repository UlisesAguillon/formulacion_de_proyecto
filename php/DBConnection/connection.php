<?php
 $db_host = "localhost";
 $db_name = "db_estandares";
 $db_user = "root";
 $db_pass = "";
 
 try{
  
  $conexion = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch(PDOException $e){
  echo $e->getMessage();
 }
?>
