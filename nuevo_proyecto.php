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
        <h1 class="h2">Nuevo Proyecto</h1>
    </div>

      <form action="php/insertProject.php" name="registroProyecto" id="registroProyecto" method="POST"class="card p-2">
        <div class="mb-3">
          <label for="projectCode">Codigo del proyecto</label>
            <input type="text" class="form-control" id="projectCode" name="projectCode" placeholder="" value="" required>
            <div class="invalid-feedback">
            *Codigo del proyecto es requerido.
            </div>
        </div>
        <div class="mb-3">
          <label for="projectName">Nombre del proyecto</label>
            <input type="text" class="form-control" id="projectName" name="projectName" placeholder="" value="" required>
            <div class="invalid-feedback">
            *Nombre del proyecto es requerido.
            </div>
        </div>

        <div class="mb-3">
          <label for="projectObjetive">Objetivo</label>
          <input type="text" class="form-control" id="projectObjetive" name="projectObjetive" placeholder="" value="" required>
          <div class="invalid-feedback">
          *DescripObjetivoción es requerido.
          </div>
        </div>

        <div class="mb-3">
          <label for="projectDescription">Descripción</label>
          <textarea class="form-control" id="projectDescription" name="projectDescription" rows="3" required></textarea>
          <div class="invalid-feedback">
          *Descripción es requerida.
          </div>
        </div>

        <div class="mb-3">
          <label for="expectedResults">Resultados Esperados</label>
          <textarea class="form-control" id="expectedResults" name="expectedResults" rows="3" required></textarea>
          <div class="invalid-feedback">
          *Resultados Esperados es requerido.
          </div>
        </div>

        <div class="row">
        <div class="col-md-6 mb-3">
                  <label for="faculty">Facultad</label>
                  <select class="custom-select d-block w-100" id="faculty" name="faculty" required>
                      
                    <option value="">Seleccionar facultad...</option>
                      
                    <?php
                        try{
                            $consulta = "SELECT id, name FROM tbl_faculties";	
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

                    ?>
                      
                      
                    </select>
                  <div class="invalid-feedback">
                    seleccionar Facultad.
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="subject">Asiganturas involucradas</label>
                  <select class="custom-select d-block w-100" id="subject" name="subject" required>
                      <option value="">Seleccionar asignatura...</option>
                      <?php
                        try{
                            $consulta = "SELECT id, name FROM tbl_subjects";	
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

                    ?>
                      
                      
                    </select>
                  <div class="invalid-feedback">
                    *seleccionar Asiganturas involucradas.
                  </div>
                </div>
        </div>


        <div class="mb-3">
          <label for="students">Estudiantes proyectados</label>
          <input type="text" class="form-control" id="students" name="students" placeholder="" value="" required>
          <div class="invalid-feedback">
          *Estudiantes proyectados es requerido.
          </div>
        </div>

        <div class="mb-3">
          <label for="justification">Justificación</label>
          <textarea class="form-control" id="justification" name="justification" rows="2" required></textarea>
          <div class="invalid-feedback">
          *Resultados Esperados es requerido.
          </div>
        </div>

        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="startDate">Fecha de inicio</label>
            <input type="date" class="form-control" id="startDate" name="startDate" placeholder="" value="" required>
            <div class="invalid-feedback">
              *Fecha de inicio es requerida.
            </div>
            </div>
          <div class="col-md-3 mb-3">
            <!-- <label for="projectAmount">Monto</label>-->
            <input type="hidden" class="form-control" id="projectAmount" name="projectAmount" placeholder="" value="0.0" required>
            <div class="invalid-feedback">
              *Monto es requerido.
            </div>
          </div>
        </div>

        <hr class="mb-4">
        <h4 class="mb-3">Unidad Solicitante</h4>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="school">Escuela</label>
            <select class="custom-select d-block w-100" id="school"  name="school" required>
              <option value="">Seleccionar escuela...</option>
              <?php
                        try{
                            $consulta = "SELECT id, name FROM tbl_schools";	
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

                    ?>
            </select>
            <div class="invalid-feedback">
             *Seleccionar escuela .
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label for="cathedra">Cátedra</label>
            <select class="custom-select d-block w-100" id="cathedra" name="cathedra" required>
              <option value="">Seleccionar Cátedra...</option>
              <?php
                        try{
                            $consulta = "SELECT id, name FROM tbl_cathedras";	
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

                    ?>
            </select>
            <div class="invalid-feedback">
              *Seleccionar Cátedra.
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
              <label for="area">Área</label>
              <input type="text" class="form-control" id="area" name="area" placeholder="" required>
              <div class="invalid-feedback">
              *Area es requerida.
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="coordination">Coordinación</label>
              <input type="text" class="form-control" id="coordination" name="coordination" placeholder="" required>
              <div class="invalid-feedback">
              *Coordinación es requerida.
              </div>
            </div>

            <div class="col-md-4 mb-3">
             <label for="practiceCenter">Centro de practica</label>
             <input type="text" class="form-control" id="practiceCenter" name="practiceCenter"  placeholder="" required>
             <div class="invalid-feedback">
              *Centro de practica es requerido.
             </div>
            </div>

        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Registrar proyecto</button>
      </form>
    </main>
  <?php include('footer_shell.php') ?>
