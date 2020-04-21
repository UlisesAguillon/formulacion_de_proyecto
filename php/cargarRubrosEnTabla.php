     <?php
                   require('DBConnection/connection.php');
                        try{
                            $consulta = "select rubro.id, rubro.name, item.requested_amount as montoSolicitado, item.amount_approved as montoAprobado,
                  item.amount_spent as montoSpent, item.project_id from tbl_budget_items as rubro inner join tbl_project_budget_items_i as item on
                  rubro.id=item.budget_item_id where item.project_id=:idProject";
                             // echo($consulta);
                            $pdo = $conexion->prepare($consulta);
                            $pdo->bindParam(':idProject', ($_REQUEST['project']), PDO::PARAM_STR);
                            $pdo->execute();
                            $lista = $pdo->fetchAll();
                            $count = $pdo->rowCount();
                            $arreglo = array();
                            if($lista==null){
                                echo '<option value="">No hay registros</option>';
                            }else{
                              $contador=0;
                              echo"  <thead>
            <tr>
            <th>N°</th>
              <th>Rubro</th>
              <th>Monto Solicitado</th>
            </tr>
          </thead>";
                                foreach($lista as $fila){
                                 echo '
                  <tr>
              <td>'.++$contador.'</td>
              <td>'.$fila['name'].'</td>
              <td>$'.number_format($fila['montoSolicitado'], 2, '.', '').'</td>
              </tr>
                          ';          
                                }
                            }
                        }catch(PDOException $e){
                            echo $e->getMessage();
                        }
 ?>         

