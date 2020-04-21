<link href="../css/bootstrap.min.css" rel="stylesheet">

<?php
if(isset($_REQUEST['idp']))
{
try{
require('DBConnection/connection.php');
    //para actualizar las tareas
        $t_asignadas=0;
        $t_realizadas=0;
        $m_ejcutado=0;
        $m_aprobado=0;
         $consulta4 = "select p.id,p.amount, p.code,p.cant_tareas_asignadas,p.cant_tareas_realizadas, p.monto_ejecutado, p.monto_ejecutado,p.approved_amount from tbl_project_budget_items_i as r inner join tbl_projects as p on r.project_id=p.id where p.id=:idp;";
                $pdo = $conexion->prepare($consulta4);
                $pdo->bindParam(':idp', ($_REQUEST['idp']), PDO::PARAM_STR);
                $pdo->execute();
                $lista = $pdo->fetchAll();
                $count = $pdo->rowCount();
                $contador = 0;
                if($lista==null){
                    echo 'No hay registros';
                }else{
                    foreach($lista as $fila){   
                    $m_aprobado=$fila['approved_amount'];    
                    $t_asignadas=$fila['cant_tareas_asignadas'];          
                    $t_realizadas=$fila['cant_tareas_realizadas'];
                    $m_ejcutado=$fila['monto_ejecutado'];           
                    }
                }

$t_realizadas++;
$m_ejcutado=$m_ejcutado+$_REQUEST['t'];

$porcentajeMonto=0;
$porcentajeTareas=0;

$porcentajeTareas=(100*$t_realizadas)/$t_asignadas;

$porcentajeMonto=(100*$m_ejcutado)/$m_aprobado;

echo($m_aprobado);
echo"t asignada";

        $consulta5 = "UPDATE `db_estandares`.`tbl_projects` SET `cant_tareas_realizadas` = :cant, monto_ejecutado=:monto, porcent_avance=:pt , porcent_presupuestario=:pmA WHERE (`id` =:projectId);";
        $pdo = $conexion->prepare($consulta5);
        $pdo->bindParam(':cant', ($t_realizadas), PDO::PARAM_STR);
        $pdo->bindParam(':monto', ($nuevoMonto), PDO::PARAM_STR);
        $pdo->bindParam(':pt', ($porcentajeTareas), PDO::PARAM_STR);
         $pdo->bindParam(':pmA', ($porcentajeMonto), PDO::PARAM_STR);
         $pdo->bindParam(':projectId', ($_REQUEST['idp']), PDO::PARAM_STR);        
        $pdo->execute();


    echo ' <div class="alert alert-success"><strong>Exito!</strong>Tarea agregada con exito.</div>';
          header( "refresh:3; url=../index.php?");
    }catch(PDOException $e){
        echo $e->getMessage();
    }      
}
?> 