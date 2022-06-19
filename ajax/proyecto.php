<?php 
require_once "../modelos/proyecto.php";

$proyecto=new proyecto();

$idproyecto=isset($_POST["idproyecto"])? limpiarCadena($_POST["idproyecto"]):"";
$idpersona=isset($_POST["idpersona"])? limpiarCadena($_POST["idpersona"]):"";
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$tipo_proyecto=isset($_POST["tipo_proyecto"])? limpiarCadena($_POST["tipo_proyecto"]):"";
$numero_comprobante=isset($_POST["numero_comprobante"])? limpiarCadena($_POST["numero_comprobante"]):"";
$fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
$impuesto=isset($_POST["impuesto"])? limpiarCadena($_POST["impuesto"]):"";
$total_proyecto=isset($_POST["total_proyecto"])? limpiarCadena($_POST["total_proyecto"]):"";


switch ($_GET["op"]) {
	case 'guardaryeditar':

	if (empty($idproyecto)) {
		$rspta=$proyecto->insertar($idpersona,$idusuario,$tipo_proyecto, $numero_comprobante,$fecha_hora,$impuesto,$total_proyecto);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$proyecto->editar($idpersona,$idusuario,$idproyecto,$tipo_proyecto,$numero_comprobante,$fecha_hora,$impuesto,$total_proyecto);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	}
		break;
	

	case 'desactivar':
		$rspta=$proyecto->desactivar($idproyecto);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;
	case 'activar':
		$rspta=$proyecto->activar($idproyecto);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
		break;
	
	case 'mostrar':
		$rspta=$proyecto->mostrar($idproyecto);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$proyecto->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>($reg->condicion)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idproyecto.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idproyecto.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idproyecto.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->idproyecto.')"><i class="fa fa-check"></i></button>',
            "1"=>$reg->tipo_proyecto,
			"2"=>$reg->persona,
			"2"=>$reg->usuario,
            "4"=>$reg->numero_comprobante,
			"5"=>$reg->fecha_hora,
			"6"=>$reg->impuesto,
			"7"=>$reg->total_proyecto,
			"8"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;


		case 'selectpersona':
			require_once "../modelos/persona.php";
			$persona=new persona();

			$rspta=$persona->select();

			while ($reg=$rspta->fetch_object()) {
				echo '<option value=' . $reg->idpersona.'>'.$reg->tipo_persona.'</option>';
			}
			break;


			case 'selectusuario':
				require_once "../modelos/usuario.php";
				$usuario=new usuario();
	
				$rspta=$usuario->select();
	
				while ($reg=$rspta->fetch_object()) {
					echo '<option value=' . $reg->idusuario.'>'.$reg->nombre.'</option>';
				}
				break;

}
 ?>