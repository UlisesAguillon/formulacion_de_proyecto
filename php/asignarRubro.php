<link href="../css/bootstrap.min.css" rel="stylesheet">

<?php
if(isset($_REQUEST['rubro']))
{

require('DBConnection/connection.php');
    try{
	$consulta = "INSERT INTO `db_estandares`.`tbl_budget_items` (`name`) 
    VALUES (:name)";	
        $pdo = $conexion->prepare($consulta);
        $pdo->bindParam(':name', ($_REQUEST['rubro']), PDO::PARAM_STR);
        $pdo->execute();

$idRubro=0;
        $consulta2 = "select * from tbl_budget_items ORDER BY id DESC limit 1";
                $pdo = $conexion->prepare($consulta2);
                $pdo->execute();
                $lista = $pdo->fetchAll();
                $count = $pdo->rowCount();
                $contador = 0;
                if($lista==null){
                    echo 'No hay registros';
                }else{
                    foreach($lista as $fila){                 
                    $idRubro=$fila['id'];             
                    }
                }

        $consulta3 = "      INSERT INTO `db_estandares`.`tbl_project_budget_items_i` ( `project_id`, `budget_item_id`, `requested_amount`, `amount_approved`, `amount_spent`) VALUES ( :projectId,:rubroId, '0', '0', '0');";
        $pdo = $conexion->prepare($consulta3);
        $pdo->bindParam(':projectId', ($_REQUEST['projectId']), PDO::PARAM_STR);
        $pdo->bindParam(':rubroId', ($idRubro), PDO::PARAM_STR);
        $pdo->execute();



        echo ' <div class="alert alert-success"><strong>Exito!</strong>Rubro agregado con exito.</div>';
          header( "refresh:3; url=../agregar_rubros.php?project=".$_REQUEST['projectId']);
    }catch(PDOException $e){
        echo $e->getMessage();
    }                
}
?>