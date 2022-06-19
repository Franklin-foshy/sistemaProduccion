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
  <h1 class="box-title">Proyecto <button class="btn btn-secondary" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i>Agregar</button> <a target="_blank" href="../reportes/rptarticulos.php"><button class="btn btn-info">Reporte</button></a></h1>
  <div class="box-tools pull-right">
    
  </div>
</div>
<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <th>Opciones</th>
      <th>tipo proyecto</th>
      <th>persona</th>
      <th>usuario</th>
      <th>numero de comprobante</th>
      <th>fecha y hora</th>
      <th>impuesto</th>
      <th>total proyecto</th>
      <th>Estado</th>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    <th>Opciones</th>
      <th>tipo proyecto</th>
      <th>persona</th>
      <th>usuario</th>
      <th>numero de comprobante</th>
      <th>fecha y hora</th>
      <th>impuesto</th>
      <th>total proyecto</th>
      <th>Estado</th>
    </tfoot>   
  </table>
</div>

<div class="panel-body" id="formularioregistros">
  <form action="" name="formulario" id="formulario" method="POST">
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Tipo de proyecto(*):</label>
      <input class="form-control" type="hidden" name="idproyecto" id="idproyecto">
      <input class="form-control" type="text" name="tipo_proyecto" id="tipo_proyecto" maxlength="100" placeholder="Tipo de proyecto" required>
    </div>

     <!-- para filtrar informacion -->
     <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">cliente(*):</label>
      <select name="idpersona" id="idpersona" class="form-control selectpicker" data-Live-search="true" required>
      
      </select>
    </div>

       <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Numero de comprobante</label>
      <input class="form-control" type="text" name="numero_comprobante" id="numero_comprobante" maxlength="256" placeholder="No. comprobante">
    </div>

    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Fecha</label>
      <input class="form-control" type="date" name="fecha_hora" id="fecha_hora" placeholder="fecha" required> </div>

      <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Impuesto</label>
      <input class="form-control" type="text" name="impuesto" id="impuesto" placeholder="Impuesto" required> </div>
      <!-- para filtrar informacion -->
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">usuario(*):</label>
      <select name="idusuario" id="idusuario" class="form-control selectpicker" data-Live-search="true" required>
      
      </select>
    </div>

      <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Total proyecto</label>
      <input class="form-control" type="text" name="total_proyecto" id="total_proyecto" placeholder="total proyecto" required> </div>

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
 <script src="scripts/proyecto.js"></script>

 <?php 
}

ob_end_flush();
  ?>