<?php
      session_start();
      if(!isset($_SESSION["user"]))
      {
          header('Location: login.php');
      }
      include('header_shell.php');
      include('nav_shell.php');
  ?>

<?php
$nombreDelProyecto='';
            try{
                $consulta = "SELECT p.id id, p.code code, p.name name, p.description description, "
                        . " f.name facultad, sc.name school , p.start_date, p.objetive, "
                        . " p.description, p.expected_result, s.name subject, p.projected_students,"
                        . " p.justification, p.amount "
                        . " FROM tbl_projects p "
                        . " INNER JOIN tbl_faculties f ON f.id = p.faculty_id "
                        . " LEFT JOIN tbl_subjects s ON s.id = p.subject "
                        . " LEFT JOIN tbl_schools sc ON sc.id = p.school "

                        . " WHERE p.id = :id";
                $pdo = $conexion->prepare($consulta);
                $pdo->bindParam(':id', ($_GET['id']), PDO::PARAM_STR);
                $pdo->execute();
                $lista = $pdo->fetchAll();
                $response = array();
                if($lista==null){
                    echo 'No hay registros';
                }else{
                    foreach($lista as $fila){
$nombreDelProyecto=$fila['code'].' '.$fila['name'];
                        echo  '

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<form action="php/aprobarSolicitud.php">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Codigo del Proyecto</th>
            <th scope="col">'.$fila['code'].'</th>
          </tr>
         <tr>
            <th scope="col">Nombre del proyecto</th>
            <td scope="col"> '.$fila['name'].'</td>
          </tr>
        </thead>
        <tbody>
          <tr>

            <th scope="row">Descripcion</th>
            <td  >'.$fila['description'].'</td>
          </tr>
          <tr>
            <th scope="row">Facultad</th>
            <td  >'.$fila['facultad'].'</td>

          </tr>
          <tr>
            <th scope="row">Unidad Solicitante</th>
            <td  >'.$fila['school'].'</td>
          </tr>
          <tr>
            <th scope="row">Fecha de inicio</th>
            <td  >'.$fila['start_date'].'</td>
          </tr>
          <tr>
            <th scope="row">Objetivo</th>
            <td  >'.$fila['objetive'].'</td>
          </tr>
          <tr>
            <th scope="row">descripción</th>
            <td  >'.$fila['description'].'</td>
          </tr>
          <tr>
            <th scope="row">Resultado Esperado</th>
            <td  >'.$fila['expected_result'].'</td>
          </tr>
          <tr>
            <th scope="row">Asignaturas involucradas</th>
            <td  >'.$fila['subject'].'</td>
          </tr>
          <tr>
            <th scope="row">Estudiantes Proyectados</th>
            <td  >'.$fila['projected_students'].'</td>
          </tr>

          <tr>
            <th scope="row">Justificación</th>
            <td  >'.$fila['justification'].'</td>
          </tr>
          <tr>
            <th scope="row">Monto solicitado </th>
            <td  >$'.$fila['amount'].'</td>
          </tr>
          <tr>
            <td  ><input type="hidden" name="project" value="'.$fila['id'].'"></td>
          </tr>
          <tr>
      <th scope="row">Proyecto Aprobado</th>
      
    </tr>
        </tbody>
      </table>
      <!-- ___________________________________________________________________-->


            </div>
            <div class="modal-footer">


              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal23">Ver Detalle</button>
            </div>
          </div>
        </div>
      </div>
      </form>

      <!-- MODAL  2 -->
      <!-- Large modal -->
      <div class="modal fade bd-example-modal-lg" id="exampleModal23"tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel23" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Proyecto: '.$nombreDelProyecto.' </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

      <!-- ___________________________________________________________________-->

      <h2>Presupuesto</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Descripción</th>
                  <th>Compra Realizada</th>
                  <th>Cantidad </th>
                  <th>Precio unitario</th>
                  <th>Total</th>

                </tr>
              </thead>
              <tbody>

                     ';
                    }
                }


                $consulta2 = "select detail.id,detail.project_budget_item, detail.description, detail.purchase as compra, detail.quantity as cantidad, detail.unit_price as precio_unitario,
detail.total, detail.status  from tbl_project_budget_items_i as item inner join tbl_budget_item_details
as detail on item.id=detail.project_budget_item where item.project_id=:id";
                $pdo = $conexion->prepare($consulta2);
                $pdo->bindParam(':id', ($_GET['id']), PDO::PARAM_STR);
                $pdo->execute();
                $lista2 = $pdo->fetchAll();
                $response = array();
                if($lista2==null){
                    echo 'No hay registros';
                }else{
                    foreach($lista2 as $fila2){

                        echo  '
                  <tr>
                  <td>'.$fila2['description'].'</td>
                  <td>'.$fila2['compra'].'</td>
                  <td>'.$fila2['cantidad'].'</td>
                  <td>$'.$fila2['precio_unitario'].'</td>
                  <td>$'.$fila2['total'].'</td>
                  
                  <td><!-- Button trigger modal -->
      </td>
               ';
                    }
                }

            }catch(PDOException $e){
                echo $e->getMessage();
            }

            ?>
            </tbody>
            </table>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
            
            </div>
          </div>
        </div>
      </div>

      <!-- MODAL  3 detalle de presupuesto -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </main>
                     

  <?php include('footer_shell.php') ?>
