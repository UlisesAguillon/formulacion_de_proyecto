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

    <h2>Solicitudes de Proyectos</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>N°</th>
            <th>Codigo</th>
            <th>Descripción</th>
            <th>% de Avance</th>
            <th>% de ejecución presupuestaria</th>
            <th>Estado</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

           <?php
            try{
                $consulta = "SELECT * FROM tbl_projects where status='Nuevo' OR status='Esperando Aprobacion'";
                $pdo = $conexion->prepare($consulta);
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
              <td>'.$fila['code'].'</td>
              <td>'.$fila['name'].'</td>
              <td>'.$fila['porcent_avance'].'%</td>
              <td>'.$fila['porcent_presupuestario'].'%</td>
              <td>'.$fila['status'].'</td>
              <td><!-- Button trigger modal -->
              <a href="verProyectoA.php?id='.$fila['id'].'"><button type="button" class="btn btn-primary" >
              ver
              </button></td>
              </tr>
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

    <hr>
    <h2>Proyectos Aprobados</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>N°</th>
            <th>Codigo</th>
            <th>Descripción</th>
            <th>% de Avance</th>
            <th>% de ejecución presupuestaria</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
 <?php
            try{
                $consulta = "SELECT * FROM tbl_projects where status<>'Nuevo' AND status<>'Esperando Aprobacion'";
                $pdo = $conexion->prepare($consulta);
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
              <td>'.$fila['code'].'</td>
              <td>'.$fila['name'].'</td>
              <td>'.$fila['porcent_avance'].'%</td>
              <td>'.$fila['porcent_presupuestario'].'%</td>
              <td>'.$fila['status'].'</td>
              <td><!-- Button trigger modal -->
              <a href="verProyectoA2.php?id='.$fila['id'].'"><button type="button" class="btn btn-primary" >
              ver
              </button></td>
              </tr>
                          ';                    

                    }
                }

            }catch(PDOException $e){
                echo $e->getMessage();
            }

            ?>
        </tbody>
      </table>
  </main>
</div>
</div>

<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal"tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Proyecto: CVD0019 concientizacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<!-- ___________________________________________________________________-->
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">Nombre del proyecto</th>
      <td scope="col"> concientizacion</td>
    </tr>
  </thead>
  <tbody>
    <tr>

      <td></td>
      <td></td>
      <th scope="row">Descripcion</th>
      <td>Concientizar a las personas de la importancia de esta en su casa</td>
    </tr>
    <tr>
      <th scope="row">Facultad</th>
      <td colspan="3">Facultad de Ingenieria y Ciencias Aplicadas</td>

    </tr>
    <tr>
      <th scope="row">Unidad Solicitante</th>
      <td colspan="3">Informatica.</td>
    </tr>
    <tr>
      <th scope="row">Fecha de inicio</th>
      <td colspan="3">Lunes 23 de Marzo del 2020</td>
    </tr>
    <tr>
      <th scope="row">Objetivo</th>
      <td colspan="3">Concientizar a los estudiantes de quedarse en su casa</td>
    </tr>

    <tr>
      <th scope="row">Resultado Esperado</th>
      <td colspan="3">que los estudiantes se queden en su casa</td>
    </tr>
    <tr>
      <th scope="row">Asignaturas involucradas</th>
      <td colspan="3">Estandares de programacion</td>
    </tr>
    <tr>
      <th scope="row">Estudiantes Proyectados</th>
      <td colspan="3">Estudiantes de la Universidad Tecnologica de El Salvador</td>
    </tr>

    <tr>
      <th scope="row">Justificación</th>
      <td colspan="3">Pandemia</td>
    </tr>

    <tr>
      <th scope="row">Monto Solicitado</th>
      <td colspan="3">$2000.00</td>
    </tr>
    <tr>
      <th scope="row">Monto Aprobado</th>
      <td colspan="3"><input type="text"></td>
    </tr>
  </tbody>
</table>




<!-- ___________________________________________________________________-->


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
        <a href="aproved.php"> <button type="button" class="btn btn-primary">Aprobar</button></a>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
  Detalle
</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL  2 -->
<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal2"tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Proyecto:CVD0019 concientizacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<!-- ___________________________________________________________________-->

<!-- ___________________________________________________________________-->

<h2>Presupuesto</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Descripcion</th>
            <th>cantidad</th>
            <th>monto unitario</th>

            <th>Total</th>
          </tr>
        </thead>
        <tbody>

<tr>
<td>Pago de Salario a empleados</td>
<td>10</td>
<td>$100.00</td>
<td>$100.00</td>
<td><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
editar
</button></td>
</tr>

<tr>
<td>Pago de Salario a empleados</td>
<td>10</td>
<td>$100.00</td>
<td>$100.00</td>
<td><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
editar
</button></td>
</tr>

        </tbody>
            </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
        <button type="button" class="btn btn-primary">Listo</button>
      </div>
    </div>
  </div>
</div>




  <?php include('footer_shell.php') ?>
