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
  <h1 class="box-title">extraccion <button class="btn btn-secondary" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i>Agregar</button> <a target="_blank" href="../reportes/rptarticulos.php"><button class="btn btn-info">Reporte</button></a></h1>
  <div class="box-tools pull-right">
    
  </div>
</div>
<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <th>Opciones</th>
      <th>Cantidad</th>
      <th>Nombre del piloto</th>
      <th>Direccion</th>
      <th>Descripcion</th>
      <th>Encargado</th>
      <th>Estado</th>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    <th>Opciones</th>
    <th>cantidad</th>
    <th>nombre del piloto</th>
    <th>Direccion</th>
    <th>Descripcion</th>
    <th>Encargado</th>
    <th>Estado</th>
    </tfoot>   
  </table>
</div>

<div class="panel-body" id="formularioregistros">
  <form action="" name="formulario" id="formulario" method="POST">
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">cantidad:</label>
      <input class="form-control" type="hidden" name="idextraccion" id="idextraccion">
      <input class="form-control" type="text" name="cantidad" id="cantidad" maxlength="100" placeholder="cantidad" required>
    </div>


    
    <!-- para filtrar informacion -->
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">transporte(*):</label>
      <select name="idtransporte" id="idtransporte" class="form-control selectpicker" data-Live-search="true" required>
      
      </select>
    </div>


       <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">direccion</label>
      <input class="form-control" type="text" name="direccion" id="direccion" maxlength="256" placeholder="direccion">
    </div>

    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">material que se extrae</label>
      <input class="form-control" type="text" name="descripcion" id="descripcion" maxlength="256" placeholder="Material que se extrae">
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Encargado:</label>
      <input class="form-control" type="text" name="encargado" id="encargado" placeholder="Nombre del encargado" required> 

      <p>
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
 <script src="scripts/extraccion.js"></script>

 <?php 
}

ob_end_flush();
  ?>