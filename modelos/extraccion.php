<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class extraccion{


	//implementamos nuestro constructor
public function __construct(){

}


//metodo insertar registro
public function insertar($idtransporte,$cantidad, $direccion,$descripcion,$encargado){
	$sql="INSERT INTO extraccion (idtransporte,cantidad,direccion,descripcion,encargado,condicion)
	 VALUES ('$idtransporte','$cantidad','$direccion','$descripcion','$encargado','1')";
	return ejecutarConsulta($sql);
}


public function editar($idextraccion,$idtransporte,$cantidad, $direccion,$descripcion,$encargado){
	$sql="UPDATE extraccion SET idtransporte='$idtransporte', cantidad='$cantidad', direccion='$direccion',descripcion='$descripcion',encargado='$encargado'
	WHERE idextraccion='$idextraccion'";
	return ejecutarConsulta($sql);
}

public function desactivar($idextraccion){
	$sql="UPDATE extraccion SET condicion='0' WHERE idextraccion='$idextraccion'";
	return ejecutarConsulta($sql);
}
public function activar($idextraccion){
	$sql="UPDATE extraccion SET condicion='1' WHERE idextraccion='$idextraccion'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
/*  public function mostrar($idextraccion){
	$sql="SELECT * FROM extraccion WHERE idextraccion='$idextraccion'";
	return ejecutarConsultaSimpleFila($sql); */

//listar registros 
public function select(){
	$sql="SELECT * FROM extraccion";
	return ejecutarConsulta($sql);
}

	//listar registros 
public function listar(){
	$sql="SELECT a.cantidad, a.condicion, a.idextraccion,c.nombre as transporte, a.direccion,a.descripcion,a.encargado FROM extraccion as a INNER JOIN transporte as c ON c.idtransporte=a.idtransporte;";
	return ejecutarConsulta($sql);
}

//listar registros 
/*  public function listar(){
	$sql="SELECT * FROM extraccion";
	return ejecutarConsulta($sql);*/


	//listar registros activos
public function listarActivos(){
	$sql="SELECT a.idextraccion,a.idtransporte,c.nombre as transporte, a.cantidad,a.direccion,a.descripcion,a.encargado FROM extraccion a INNER JOIN transporte c ON a.idtransporte=c.idtransporte WHERE a.condicion='1'";
	return ejecutarConsulta($sql);
}




}
 ?>