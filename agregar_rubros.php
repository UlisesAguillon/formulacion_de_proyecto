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
        <h1 class="h2">Asignar rubros</h1>
    </div>

      <form action='php/asignarRubro.php' method="POST" class="card p-2">

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
      <div class="col-md-9 mb-3">
          <label for="projectName">Rubro</label>
            <input type="text" class="form-control" id="rubro" name="rubro" placeholder="" required>
            <div class="invalid-feedback">
            *Rubro requerido.
            </div>
        </div>

        <div class="col-md-3 mb-3">
        <label for=""></label>
        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Asignar rubro"></input>

        </div>

      </div>


            <hr class="mb-4">

            <table class="table table-striped table-sm" id="rubroId" name="rubroId">
          <thead>
            <tr>
            <th>N°</th>
              <th>Rubro</th>
              <th>Monto Solicitado</th>

            </tr>
          </thead>
          <tbody>
          <?php
            try{
              if(isset($_GET['project'])){
                $consulta = "select rubro.id, rubro.name, item.requested_amount as montoSolicitado, item.amount_approved as montoAprobado,
                  item.amount_spent as montoSpent, item.project_id from tbl_budget_items as rubro inner join tbl_project_budget_items_i as item on
                  rubro.id=item.budget_item_id where item.project_id=:idProject";
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
              <td>$'.number_format($fila['montoSolicitado'], 2, '.', '').'</td>

              </tr>
                          ';                    

                    }
                }
            }//end if
            }catch(PDOException $e){
                echo $e->getMessage();
            }

            ?>




          </tbody>
        </table>

    </main>
  <?php //include('footer_shell.php') ?>
  <script type="text/javascript">
$(document).ready(function(){
    $('#projectId').on('change',function(){
        var proyecto_ID = $(this).val();
        if(proyecto_ID){
            $.ajax({
                type:'POST',
                url:'php/cargarRubrosEnTabla.php',
                data:'project='+proyecto_ID,
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