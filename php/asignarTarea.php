<link href="../css/bootstrap.min.css" rel="stylesheet">

<?php
if(isset($_REQUEST['rubroId']))
{

require('DBConnection/connection.php');
    try{
        $totalTarea=$_REQUEST['cantidad']*$_REQUEST['valorUnitario'];
        //echo($totalTarea);
	$consulta = "INSERT INTO `db_estandares`.`tbl_budget_item_details` (`project_budget_item`, `description`, `purchase`, `quantity`, `unit_price`, `total`) VALUES (:rubro, :descripcion , :compra , :cantidad , :precioUnitario, :total)";	
        $pdo = $conexion->prepare($consulta);
        $pdo->bindParam(':rubro', ($_REQUEST['rubroId']), PDO::PARAM_STR);
        $pdo->bindParam(':descripcion', ($_REQUEST['description']), PDO::PARAM_STR);
        $pdo->bindParam(':compra', ($_REQUEST['compra']), PDO::PARAM_STR);
        $pdo->bindParam(':cantidad', ($_REQUEST['cantidad']), PDO::PARAM_STR);
        $pdo->bindParam(':precioUnitario', ($_REQUEST['valorUnitario']), PDO::PARAM_STR);
        $pdo->bindParam(':total', ($totalTarea), PDO::PARAM_STR);
        $pdo->execute();



        $totalRubro=0;
        $totalActualRubro=0;
        $consulta2 = "SELECT * FROM tbl_project_budget_items_i WHERE id=:rubro;";
                $pdo = $conexion->prepare($consulta2);
                $pdo->bindParam(':rubro', ($_REQUEST['rubroId']), PDO::PARAM_STR);
                $pdo->execute();
                $lista = $pdo->fetchAll();
                $count = $pdo->rowCount();
                $contador = 0;
                if($lista==null){
                    echo 'No hay registros';
                }else{
                    foreach($lista as $fila){                 
                    $totalActualRubro=$fila['requested_amount'];             
                    }
                }

$totalRubro=$totalActualRubro+$totalTarea;
        $consulta3 = "UPDATE `db_estandares`.`tbl_project_budget_items_i` SET `requested_amount` = :amount WHERE (`id` = :rubroId);";
        $pdo = $conexion->prepare($consulta3);
        $pdo->bindParam(':amount', ($totalRubro), PDO::PARAM_STR);
        $pdo->bindParam(':rubroId', ($_REQUEST['rubroId']), PDO::PARAM_STR);
        $pdo->execute();



//para actualizar las tareas
        $t_asignadas=0;
        $p_id=0;
        $amountRequest=0;
         $consulta4 = "select p.id,p.amount, p.code,p.cant_tareas_asignadas,p.cant_tareas_realizadas, p.cant_tareas_realizadas, p.monto_ejecutado from tbl_project_budget_items_i as r inner join 
tbl_projects as p on r.project_id=p.id where r.id=:rubro;";
                $pdo = $conexion->prepare($consulta4);
                $pdo->bindParam(':rubro', ($_REQUEST['rubroId']), PDO::PARAM_STR);
                $pdo->execute();
                $lista = $pdo->fetchAll();
                $count = $pdo->rowCount();
                $contador = 0;
                if($lista==null){
                    echo 'No hay registros';
                }else{
                    foreach($lista as $fila){                 
                    $t_asignadas=$fila['cant_tareas_asignadas'];
                    $p_id=$fila['id'];
                    $amountRequest=$fila['amount'];             
                    }
                }

$t_asignadas++;
$nuevoMonto=$amountRequest+$totalTarea;
        $consulta5 = "UPDATE `db_estandares`.`tbl_projects` SET `cant_tareas_asignadas` = :cant, amount=:monto WHERE (`id` =:projectId);";
        $pdo = $conexion->prepare($consulta5);
        $pdo->bindParam(':cant', ($t_asignadas), PDO::PARAM_STR);
        $pdo->bindParam(':monto', ($nuevoMonto), PDO::PARAM_STR);
        $pdo->bindParam(':projectId', ($_REQUEST['projectId']), PDO::PARAM_STR);        
        $pdo->execute();


    echo ' <div class="alert alert-success"><strong>Exito!</strong>Tarea agregada con exito.</div>';
          header( "refresh:3; url=../agregar_tareas.php?project=".$_REQUEST['projectId']);
    }catch(PDOException $e){
        echo $e->getMessage();
    }                
}
?>