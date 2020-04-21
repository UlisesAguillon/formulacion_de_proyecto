     <?php
                   require('DBConnection/connection.php');
                        try{
                            $consulta = "select detail.id,detail.project_budget_item, detail.description, detail.purchase as compra, detail.quantity as cantidad, detail.unit_price as precio_unitario,
detail.total  from tbl_project_budget_items_i as item inner join tbl_budget_item_details
as detail on item.id=detail.project_budget_item where  item.id=:id_rubro";
                             // echo($consulta);
                            $pdo = $conexion->prepare($consulta);
                            $pdo->bindParam(':id_rubro', ($_REQUEST['idRubro']), PDO::PARAM_STR);
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
              <th>Descripción</th>
              <th>Compra realizada</th>
              <th>Cantidad</th>
              <th>Precio Unitario</th>
              <th>Total</th>
            </tr>
          </thead>";
                                foreach($lista as $fila){
                                 echo '
                  <tr>
              <td>'.++$contador.'</td>
              <td>'.$fila['description'].'</td>
              <td>'.$fila['compra'].'</td>
              <td>'.$fila['cantidad'].'</td>
              <td>$'.number_format($fila['precio_unitario'], 2, '.', '').'</td>
              <td>$'.number_format($fila['total'], 2, '.', '').'</td>
              </tr>
                          ';          
                                }
                            }
                        }catch(PDOException $e){
                            echo $e->getMessage();
                        }
 ?>         

