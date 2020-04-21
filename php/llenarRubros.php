     <?php
                   require('DBConnection/connection.php');
                        try{
                            $consulta = " select  item.id, rubro.name from tbl_project_budget_items_i as item inner join tbl_budget_items as rubro on 
                              item.budget_item_id=rubro.id where item.project_id=:projectId";
                              echo($consulta);
                            $pdo = $conexion->prepare($consulta);
                            $pdo->bindParam(':projectId', ($_REQUEST['id']), PDO::PARAM_STR);

                            $pdo->execute();
                            $lista = $pdo->fetchAll();
                            $count = $pdo->rowCount();
                            $arreglo = array();
                            if($lista==null){
                                echo '<option value="">No hay registros</option>';
                            }else{
                                foreach($lista as $fila){
                                 echo '<option value="'.$fila['id'].'">'.$fila['name'].'</option>';
                                }
                            }
                        }catch(PDOException $e){
                            echo $e->getMessage();
                        }
 ?>         

