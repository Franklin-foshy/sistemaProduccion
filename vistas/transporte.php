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
  <h1 class="box-title">Transporte <button class="btn btn-secondary" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i>Agregar</button> <a target="_blank" href="../reportes/rptarticulos.php"><button class="btn btn-info">Reporte</button></a></h1>
  <div class="box-tools pull-right">
    
  </div>
</div>
<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <th>Opciones</th>
      <th>Nombre </th>
      <th>tipo vehiculo</th>
      <th>placa</th>
      <th>estado</th>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
       <th>Opciones</th>
      <th>Nombre </th>
      <th>Tipo de vehiculo</th>
      <th>placa</th>
      <th>estado</th>
    </tfoot>   
  </table>
</div>

<div class="panel-body" id="formularioregistros">
  <form action="" name="formulario" id="formulario" method="POST">
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Nombre Piloto(*):</label>
      <input class="form-control" type="hidden" name="idtransporte" id="idtransporte">
      <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
    </div>
  <!--  <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Categoria(*):</label>
      <select name="idcategoria" id="idcategoria" class="form-control selectpicker" data-Live-search="true" required></select>
    </div>
       <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Stock</label>
      <input class="form-control" type="number" name="stock" id="stock"  required>
    </div>-->

    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Tipo de vehiculo</label>
      <input class="form-control" type="text" name="tipovehiculo" id="tipovehiculo" maxlength="256" placeholder="vehiculo">
    </div>

      <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">placa</label>
      <input class="form-control" type="text" name="placa" id="placa" maxlength="256" placeholder="numero de placa">
      </div>


    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>  Guardar</button>

      <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
    </div>
  </form>
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
require 'footer.php'
 ?>
 <script src="../public/js/JsBarcode.all.min.js"></script>
 <script src="../public/js/jquery.PrintArea.js"></script>
 <script src="scripts/transporte.js"></script>

 <?php 
}

ob_end_flush();
  ?>