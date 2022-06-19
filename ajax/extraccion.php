<?php 
require_once "../modelos/extraccion.php";

$extraccion=new extraccion();

$idextraccion=isset($_POST["idextraccion"])? limpiarCadena($_POST["idextraccion"]):"";
$idtransporte=isset($_POST["idtransporte"])? limpiarCadena($_POST["idtransporte"]):"";
$cantidad=isset($_POST["cantidad"])? limpiarCadena($_POST["cantidad"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$encargado=isset($_POST["encargado"])? limpiarCadena($_POST["encargado"]):"";
/*  $imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";*/

switch ($_GET["op"]) {
	case 'guardaryeditar':
	/*  if (!file_exists($_FILES['imagen']['tmp_name'])|| !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
		$imagen=$_POST["imagenactual"];
	}else{
		$ext=explode(".", $_FILES["imagen"]["name"]);
		if ($_FILES['imagen']['type']=="image/jpg" || $_FILES['imagen']['type']=="image/jpeg" || $_FILES['imagen']['type']=="image/png") {
			$imagen=round(microtime(true)).'.'. end($ext);
			move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/extraccion/".$imagen);
		}
	} */
	if (empty($idextraccion)) {
		$rspta=$extraccion->insertar($idtransporte,$cantidad,$direccion, $descripcion,$encargado);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$extraccion->editar($idextraccion,$cantidad,$direccion, $descripcion,$encargado);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	}
		break;
	

	case 'desactivar':
		$rspta=$extraccion->desactivar($idextraccion);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;
	case 'activar':
		$rspta=$extraccion->activar($idextraccion);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
		break;
	
	case 'mostrar':
		$rspta=$extraccion->mostrar($idextraccion);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$extraccion->listar();
			$data=Array();
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>($reg->condicion)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idextraccion.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idextraccion.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idextraccion.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->idextraccion.')"><i class="fa fa-check"></i></button>',
			"1"=>$reg->cantidad,
			"2"=>$reg->transporte,
            "3"=>$reg->direccion,
			"4"=>$reg->descripcion,
			"5"=>$reg->encargado,
           /*   "5"=>"<img src='../files/extraccion/".$reg->imagen."' height='50px' width='50px'>", */
			"6"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;

		case 'selecttransporte':
			require_once "../modelos/transporte.php";
			$transporte=new transporte();

			$rspta=$transporte->select();

			while ($reg=$rspta->fetch_object()) {
				echo '<option value=' . $reg->idtransporte.'>'.$reg->nombre.'</option>';
			}
			break;


	





}

 ?>