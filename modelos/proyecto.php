<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class proyecto{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($tipo_proyecto,$numero_comprobante,$fecha_hora,$impuesto,$total_proyecto){
	$sql="INSERT INTO proyecto (tipo_proyecto,numero_comprobante,fecha_hora,impuesto,total_proyecto,condicion)
	 VALUES ('$tipo_proyecto','$numero_comprobante','$fecha_hora','$impuesto','$total_proyecto','1')";
	return ejecutarConsulta($sql);
}

public function editar($idproyecto,$tipo_proyecto, $numero_comprobante,$fecha_hora,$impuesto,$total_proyecto){
	$sql="UPDATE proyecto SET  tipo_proyecto='$tipo_proyecto', numero_comprobante='$numero_comprobante',fecha_hora='$fecha_hora',impuesto='$impuesto',total_proyecto='$total_proyecto' 
	WHERE idproyecto='$idproyecto'";
	return ejecutarConsulta($sql);
}
public function desactivar($idproyecto){
	$sql="UPDATE proyecto SET condicion='0' WHERE idproyecto='$idproyecto'";
	return ejecutarConsulta($sql);
}
public function activar($idproyecto){
	$sql="UPDATE proyecto SET condicion='1' WHERE idproyecto='$idproyecto'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idproyecto){
	$sql="SELECT * FROM proyecto WHERE idproyecto='$idproyecto'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros 
public function listar(){
	$sql="SELECT * FROM proyecto";
	return ejecutarConsulta($sql);
}

//listar registros activos
public function listarActivos(){
	$sql="SELECT * FROM proyecto WHERE condicion='1'";
	return ejecutarConsulta($sql);
}
}
 ?>