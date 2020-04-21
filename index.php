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
      <h1 class="h2">Dashboard</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">

        </div>
        
      </div>
    </div>


  

    <h2>Mis Proyectos</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>N°</th>
            <th>Codigo</th>
            <th>Descripción</th>
            <th>% Tareas</th>
            <th>% ejecución presupuestaria</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>


            <?php
            try{
                $consulta = "SELECT * FROM tbl_projects";
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
              <a href="verProyecto.php?id='.$fila['id'].'"><button type="button" class="btn btn-primary" >
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
  </main>
</div>
</div>






  <?php include('footer_shell.php') ?>
