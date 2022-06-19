<?php 
require_once "../modelos/servicio.php";

$servicio=new servicio();

$idservicio=isset($_POST["idservicio"])? limpiarCadena($_POST["idservicio"]):"";
$idtransporte=isset($_POST["idtransporte"])? limpiarCadena($_POST["idtransporte"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";


switch ($_GET["op"]) {
	case 'guardaryeditar':

	if (empty($idservicio)) {
		$rspta=$servicio->insertar($idtransporte,$nombre);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$servicio->editar($idservicio,$idtransporte,$nombre);
		echo $rspta ? "Regitro actualizados corectamente" : "No se pudo actualizar los datos";
	}
		break;
	

		case 'desactivar':
			$rspta=$servicio->desactivar($idservicio);
			echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
			break;
		case 'activar':
			$rspta=$servicio->activar($idservicio);
			echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
			break;
	
	case 'mostrar':
		$rspta=$servicio->mostrar($idservicio);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$servicio->listar2();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>($reg->condicion)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idservicio.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idservicio.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idservicio.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->idservicio.')"><i class="fa fa-check"></i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->transporte,
				"3"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
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
				echo '<option value=' . $reg->idtransporte.'>'.$reg->tipovehiculo.'</option>';
			}
			break;

}
 ?>