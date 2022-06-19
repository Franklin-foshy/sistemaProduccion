 <?php 
if (strlen(session_id())<1) 
  session_start();

  ?>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Empresa TransPort </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <!-- Font Awesome -->

  <link rel="stylesheet" href="../public/css/font-awesome.min.css">

  <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../public/css/_all-skins.min.css">
  <!-- Morris chart --><!-- Daterange picker -->
 <link rel="stylesheet" href="img/apple-touch-ico.png">
 <link rel="stylesheet" href="../public/img/favicon.ico">
<!-- DATATABLES-->
<link rel="stylesheet" href="../public/datatables/jquery.dataTables.min.css">
<link rel="stylesheet" href="../public/datatables/buttons.dataTables.min.css">
<link rel="stylesheet" href="../public/datatables/responsive.dataTables.min.css">
<link rel="stylesheet" href="../public/css/bootstrap-select.min.css">

</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="inicio.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>TRANS</b> PORT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>TRANS</b> PORT</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">NAVEGACIÓM</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" alt="User Image">
              </li>
              <p>
                 Franklin Auriano Oxlaj
                  <small>2022</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
</header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

      
      <?php 
            if ($_SESSION['inicio']==1)
            {
              echo '<li>
              <a href="inicio.php">
                <i class="fa fa-tasks"></i> <span>Escritorio</span>
              </a>
            </li>';
            }
      ?>

    

    <?php 

if ($_SESSION['almacen']==1) {
  echo ' <li class="treeview">
          <a href="#">
            <i class="fa fa-caret-square-o-up"></i> <span>Materia prima  </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <i class="fa-solid fa-store"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="categoria.php"><i class="fa fa-shopping-cart"></i>Materia Prima</a></li>
            <li><a href="articulo.php"><i class="fa fa-circle-o"></i> Materia Producto</a></li>
          </ul>
        </li>';
}





        ?>
               <?php 

if ($_SESSION['compras']==1) {
  echo ' <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Proceso</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="proceso.php"><i class="fa fa-circle-o"></i> proceso</a></li>
          </ul>
        </li>';
}
        ?>



<?php 
if ($_SESSION['almacen']==1) {
  echo ' <li class="treeview">
          <a href="#">
          <i class="fa fa-calculator"></i><span>Extraccion</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="transporte.php"><i class="fa fa-circle-o"></i> transporte</a></li>
            <li><a href="extraccion.php"><i class="fa fa-circle-o"></i> extraccion</a></li>
          </ul>
        </li>';
}

?>     

               <?php 

if ($_SESSION['compras']==1) {
  echo ' <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Compras</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="ingreso.php"><i class="fa fa-circle-o"></i> Ingresos</a></li>
            <li><a href="proveedor.php"><i class="fa fa-circle-o"></i> Proveedores</a></li>
          </ul>
        </li>';
}
        ?>
        
               <?php
if ($_SESSION['ventas']==1) {
  echo '<li class="treeview">
          <a href="#">
            <i class="	fa fa-shopping-basket"></i> <span>ventas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="venta.php"><i class="fa fa-circle-o"></i> Produccion</a></li>
             <li><a href="servicio.php"><i class="fa fa-circle-o"></i> Servicio</a></li>
            <li><a href="cliente.php"><i class="fa fa-circle-o"></i> clientes</a></li>
          </ul>
        </li>';
}
        ?>
          <?php


          if ($_SESSION['compras'] == 1) {
              echo ' <li class="treeview">
          <a href="#">
          <i class="fa fa-car"></i><span>Transporte</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="transporte.php"><i class="fa fa-circle-o"></i> Transporte</a></li>
          </ul>
          <ul class="treeview-menu">
            <li><a href="transporte.php"><i class="fa fa-circle-o"></i> Transporte</a></li>
          </ul>
        </li>';
          }

          ?>
          <?php
          

          if ($_SESSION['compras'] == 1) {
            echo ' <li class="treeview">
        <a href="#">
          <i class="fa fa-building"></i> <span>Proyectos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="proyecto.php"><i class="fa fa-circle-o"></i> Proyectos</a></li>
        </ul>
        <ul class="treeview-menu">
          <li><a href="proyecto.php"><i class="fa fa-circle-o"></i> Proyectos</a></li>
        </ul>
      </li>';
        }

        ?>
        <?php

          if ($_SESSION['acceso']==1) {
  echo '  <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Personal Administrativo</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="usuario.php"><i class="fa fa-address-book"></i> Usuarios</a></li>
            <li><a href="permiso.php"><i class="fa fa-group"></i> Permisos</a></li>
          </ul>
        </li>';
}
        ?>  
          <?php


          if ($_SESSION['consultac']==1) {
  echo '     <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart"></i> <span>Consulta Compras</span>
            <span class="pull-right-container">
              <i class="fa fa-clone-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="comprasfecha.php"><i class="fa fa-circle-o"></i>Compras por fechas</a></li>
          </ul>
        </li>';
}
        ?>  
              
                                                <?php 
if ($_SESSION['consultav']==1) {
  echo '<li class="treeview">
          <a href="#">
            <i class="fa fa-server"></i> <span>Consulta Ventas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="ventasfechacliente.php"><i class="fa fa-circle-o"></i> Consulta Ventas</a></li>

          </ul>
        </li>';
}
        ?>     
            
        
       <!--  <li><a href="#"><i class="fa fa-question-circle"></i> <span>Ayuda</span><small class="label pull-right bg-yellow">PDF</small></a></li>
        <li><a href="#"><i class="fa  fa-exclamation-circle"></i> <span>Ayuda</span><small class="label pull-right bg-yellow">IT</small></a></li>
      </ul>
 /section>
    <!-- /.sidebar -->
  </aside>