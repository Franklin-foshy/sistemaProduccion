<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class proceso{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar registro
public function insertar($idarticulo,$idextraccion,$cantidad,$precio_compra,$precio_venta){
	$sql="INSERT INTO proceso (idarticulo,idextraccion,cantidad,precio_compra,precio_venta)
	 VALUES ('$idarticulo','$idextraccion','$cantidad','$precio_compra','$precio_venta'";
	return ejecutarConsulta($sql);
}

public function editar($idproceso,$idarticulo,$idextraccion, $cantidad,$precio_compra, $precio_venta){
	$sql="UPDATE proceso SET $idarticulo='$idarticulo', $idextraccion='$idextraccion',cantidad='$cantidad',precio_compra='$precio_compra',precio_venta='$precio_venta' 
	WHERE idproceso='$idproceso'";
	return ejecutarConsulta($sql);
}

public function desactivar($idproceso){
	$sql="UPDATE proceso SET condicion='0' WHERE idproceso='$idproceso'";
	return ejecutarConsulta($sql);
}
public function activar($idproceso){
	$sql="UPDATE proceso SET condicion='1' WHERE idproceso='$idproceso'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idproceso){
	$sql="SELECT * FROM proceso WHERE idproceso='$idproceso'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros 
public function listar(){
	$sql="SELECT * FROM proceso";
	return ejecutarConsulta($sql);
}

//listar registros activos
public function listarActivos(){
	$sql="SELECT * FROM proceso WHERE condicion='1'";
	return ejecutarConsulta($sql);
}


}
 ?>