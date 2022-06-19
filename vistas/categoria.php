<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{


require 'header.php';

if ($_SESSION['almacen']==1) {

 ?>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Material  <button class="btn btn-warning" data-toggle="modal" data-target="#categoria" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i>Agregar</button></h1>
  <div class="box-tools pull-right">
    
  </div>
</div>
<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <th>Opciones</th>
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>Estado</th>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
       <th>Opciones</th>
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>Estado</th>
    </tfoot>   
  </table>
</div>

<div class="modal fade" id="categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Materia prima</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

              <div class="panel-body" style="height: 200px;" id="formularioregistros">
                <form action="" name="formulario" id="formulario" method="POST">
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Nombre</label>
                    <input class="form-control" type="hidden" name="idcategoria" id="idcategoria">
                    <input class="form-control" type="text" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required>
                  </div>
                      <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Descripcion</label>
                    <input class="form-control" type="text" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripcion">
                  </div>
                  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>  Guardar</button>

                    <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                  </div>
                </form>
              </div>
    </div>
  </div>
</div>

<!--fin centro-->
      </div>
      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<?php 
}else{
 require 'noacceso.php'; 
}

require 'footer.php';
 ?>
 <script src="scripts/categoria.js"></script>
 <?php 
}

ob_end_flush();
  ?>

