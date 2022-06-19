<?php 
require_once "../modelos/proceso.php";

$proceso=new proceso();
$idproceso=isset($_POST["idproceso"])? limpiarCadena($_POST["idproceso"]):"";
$idarticulo=isset($_POST["idarticulo"])? limpiarCadena($_POST["idarticulo"]):"";
$idextraccion=isset($_POST["idextraccion"])? limpiarCadena($_POST["idextraccion"]):"";
$cantidad=isset($_POST["cantidad"])? limpiarCadena($_POST["cantidad"]):"";
$precio_compra=isset($_POST["precio_compra"])? limpiarCadena($_POST["precio_compra"]):"";
$precio_venta=isset($_POST["precio_venta"])? limpiarCadena($_POST["precio_venta"]):"";


switch ($_GET["op"]) {
	case 'guardaryeditar':
	/*  if (!file_exists($_FILES['imagen']['tmp_name'])|| !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
		$imagen=$_POST["imagenactual"];
	}else{
		$ext=explode(".", $_FILES["imagen"]["name"]);
		if ($_FILES['imagen']['type']=="image/jpg" || $_FILES['imagen']['type']=="image/jpeg" || $_FILES['imagen']['type']=="image/png") {
			$imagen=round(microtime(true)).'.'. end($ext);
			move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/transporte/".$imagen);
		}
	}*/
	if (empty($idproceso)) {
		$rspta=$proceso->insertar($idarticulo,$idextraccion, $cantidad, $precio_compra,$precio_venta);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$proceso->editar($idproceso,$idarticulo,$idextraccion,$cantidad,$precio_compra,$precio_venta);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	}
		break;
	

	case 'desactivar':
		$rspta=$proceso->desactivar($idproceso);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;
	case 'activar':
		$rspta=$proceso->activar($idproceso);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
		break;
	
	case 'mostrar':
		$rspta=$proceso->mostrar($idproceso);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$proceso->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>($reg->condicion)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idproceso.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idproceso.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idproceso.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->idproceso.')"><i class="fa fa-check"></i></button>',
            "1"=>$reg->cantidad,
			"2"=>$reg->articulo,
            "3"=>$reg->precio_compra,
			"4"=>$reg->precio_venta,
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;


		case 'selectarticulo':
			require_once "../modelos/Articulo.php";
			$articulo=new Articulo();

			$rspta=$articulo->select();

			while ($reg=$rspta->fetch_object()) {
				echo '<option value=' . $reg->idarticulo.'>'.$reg->nombre.'</option>';
			}
			break;


        case 'selectextraccion':
		require_once "../modelos/extraccion.php";
	    $extraccion=new extraccion();

	    $rspta=$extraccion->select();

	    while ($reg=$rspta->fetch_object()) {
		echo '<option value=' . $reg->idextraccion.'>'.$reg->descripcion.'</option>';
	}
	break;
}






 ?>