
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
        <?php 
        if($_SESSION["user"]=="admin@mail.com"){
          ?>
          <li class="nav-item">
            <a class="nav-link active" href="index_admin.php">
              <span data-feather="archive"></span>
              Solicitudes <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php
                    
        }else{
        ?>
          <li class="nav-item">
            <a class="nav-link active" href="index.php">
              <span data-feather="archive"></span>
              Proyectos <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="nuevo_proyecto.php">
              <span data-feather="file"></span>
              nuevo proyecto
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="agregar_rubros.php">
              <span data-feather="dollar-sign"></span>
              Agregar rubro.
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="agregar_tareas.php">
              <span data-feather="plus"></span>
              <span data-feather="dollar-sign"></span>
              Agregar tarea.
            </a>
          </li>
        <!--  <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li> -->
          <?php
        }
          ?>
        </ul>
      </div>
    </nav>
