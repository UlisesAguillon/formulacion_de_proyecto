<link href="../css/bootstrap.min.css" rel="stylesheet">

<?php
if(isset($_REQUEST['project']))
{

require('DBConnection/connection.php');
    try{
    $consulta = "UPDATE `db_estandares`.`tbl_projects` SET `status` = 'Aprobado', `approved_amount` = :montoAprobado WHERE (`id` = :idProject);"; 
        $pdo = $conexion->prepare($consulta);
        $pdo->bindParam(':idProject', ($_REQUEST['project']), PDO::PARAM_STR);
         $pdo->bindParam(':montoAprobado', ($_REQUEST['montoAprobado']), PDO::PARAM_STR);
        $pdo->execute();
        echo ' <div class="alert alert-success"><strong>Exito!</strong><br>Solicitud Aprobada con exito.</div>';
          header( "refresh:3; url=../index_admin.php" );
    }catch(PDOException $e){
        echo $e->getMessage();
    }                
}
?>