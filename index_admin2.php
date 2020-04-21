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

            <tr>
            <td>1</td>
            <td>CT-IN-P01</td>
            <td>Renovación tecnológica de los equipos de comunicación de datos</td>
            <td>33%</td>
            <td>30%</td>
            <td>Ejecutando</td>
            <td><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  ver
</button></td>
          </tr>
        <tr>
          <td>2</td>
          <td>CT-IN-P02</td>
          <td>Autenticación de usuarios y mapeo de campus</td>
          <td>50%</td>
          <td>60%</td>
          <td>Ejecutando</td>
          <td><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  ver
</button></td>
        </tr>
        <tr>
          <td>3</td>
          <td>CT-IN-P03</td>
          <td>implementacion de paneles solares</td>
          <td>50%</td>
          <td>45%</td>
          <td>Ejecutando</td>
          <td><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  ver
</button></td>
<tr>
<td>4</td>
<td>CVD0019</td>
<td>concientizacion</td>
<td>0%</td>
<td>0%</td>
<td>Aprovado</td>
<td><!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    ver
  </button>
</td>
</tr>


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
