<?php
      session_start();
      if(!isset($_SESSION["user"]))
      {
          header('Location: login.php');
      }
      include('header_shell.php');
      
      include('nav_shell.php');
  ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Agregar tareas</h1>
    </div>

      <form action='php/asignarTarea.php' method="POST" class="card p-2">

          <div class="mb-3">
          <label for="projectName">Nombre del proyecto</label>
          <select class="custom-select d-block w-100" id="projectId" name="projectId" required>
              <option value="">Seleccione proyecto...</option>

                    <?php
                        try{
                            $consulta = "SELECT id, name FROM tbl_projects where status= 'Nuevo' ORDER BY name ";
                            $pdo = $conexion->prepare($consulta);
                            $pdo->execute();
                            $lista = $pdo->fetchAll();
                            $count = $pdo->rowCount();
                            $contador = 0;
                            if($lista==null){
                                echo 'No hay registros';
                            }else{
                                foreach($lista as $fila){
                                    $contador++;
                                    echo '<option value="'.$fila['id'].'">'.$fila['name'].'</option>';
                                }
                            }

                        }catch(PDOException $e){
                            echo $e->getMessage();
                        }

                    ?>            </select>
            <div class="invalid-feedback">
            *Nombre del proyecto es requerido.
            </div>
        </div>


        <hr class="mb-4">
        <div class="row">
          <div id='listaDeRubros' class="col-md-4 mb-4">
            <label for="projectName">Rubro</label>
            <select class="custom-select d-block w-100" id="rubroId" name="rubroId" required>
              

            </select>
          
              <div class="invalid-feedback">
              *Nombre del proyecto es requerido.
              </div>
            </div>

       

          <div class="col-md-4 mb-4">
          <label for="projectName">Descripción</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="" value="" required>
            <div class="invalid-feedback">
            *DEscripcion es requerido.
            </div>
          </div>

            <div class="col-md-4 mb-4">
          <label for="projectName">Compra realizada</label>
            <input type="text" class="form-control" id="compra" name="compra" placeholder="" value="" required>
            <div class="invalid-feedback">
            *compra es requerido.
            </div>
          </div>

          <div class="col-md-2 mb-2">
              <label for="projectAmount">Cantidad</label>
              <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="" value="" required>
              <div class="invalid-feedback">
                *Monto es requerido.
              </div>
            </div>

            <div class="col-md-2 mb-2">
              <label for="projectAmount">Valor unitario $</label>
              <input type="number" class="form-control" id="valorUnitario" name="valorUnitario" placeholder="" value="" required>
              <div class="invalid-feedback">
                *Monto es requerido.
              </div>
            </div>
        </div>

        
      
                <button class="btn btn-primary btn-lg btn-block" type="submit">Asignar tareas a proyecto</button>

                <table class="table table-striped table-sm" id="tareasTable" name="tareasTable">
          <thead>
            <tr>
            <th>N°</th>
              <th>Descripcion</th>
              <th>Compra realizada</th>
              <th>Cantidad</th>
              <th>Precio Unitario</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
          <?php
            /*try{
              if(isset($_GET['project'])){
                $consulta = "select detail.id,detail.project_budget_item, detail.description, detail.purchase as compra, detail.quantity as cantidad, detail.unit_price as precio_unitario,
detail.total  from tbl_project_budget_items_i as item inner join tbl_budget_item_details
as detail on item.id=detail.project_budget_item where item.project_id=:idProject and item.id=:idRubro
";
                $pdo = $conexion->prepare($consulta);
                $pdo->bindParam(':idProject', ($_REQUEST['project']), PDO::PARAM_STR);
                $pdo->execute();
                $lista = $pdo->fetchAll();
                $count = $pdo->rowCount();
                $contador = 0;
                if($lista==null){
                    echo 'No hay registros';
                }else{
                    foreach($lista as $fila){
                  echo '
                  <tr>
              <td>'.++$contador.'</td>
              <td>'.$fila['name'].'</td>
              <td>'.$fila['montoSolicitado'].'</td>
              <td>'.$fila['montoAprobado'].'</td>
              <td>'.$fila['montoSpent'].'</td>
              </tr>
                          ';                    

                    }
                }
            }//end if
            }catch(PDOException $e){
                echo $e->getMessage();
            }
*/
            ?>
          </tbody>
        </table>
  </div>
    </main>
  <?php //include('footer_shell.php') ?>
  
  
  <script type="text/javascript">
$(document).ready(function(){
    $('#projectId').on('change',function(){
        var proyecto_ID = $(this).val();
        if(proyecto_ID){
            $.ajax({
                type:'POST',
                url:'php/llenarRubros.php',
                data:'id='+proyecto_ID,
                success:function(html){
                    $('#rubroId').html(html);
                    
                }
            }); 
        }else{
            $('#rubroId').html('<option value="">Primero el proyecto</option>');
        }
    });
    
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#rubroId').on('change',function(){
        var rubro_ID = $(this).val();
        if(rubro_ID){
            $.ajax({
                type:'POST',
                url:'php/cargarTareasEnTabla.php',
                data:'idRubro='+rubro_ID,
                success:function(html){
                    $('#tareasTable').html(html);
                    
                }
            }); 
        }else{
            $('#tareasTable').html('<option value="">Primero el proyecto</option>');
        }
    });
    
});
</script>