<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class transporte{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($nombre,$tipovehiculo,$placa){
	$sql="INSERT INTO transporte (nombre,tipovehiculo,placa,condicion)
	 VALUES ('$nombre','$tipovehiculo','$placa','1')";
	return ejecutarConsulta($sql);
}

public function editar($idtransporte,$nombre,$tipovehiculo,$placa){
	$sql="UPDATE transporte SET  nombre='$nombre',tipovehiculo='$tipovehiculo',placa='$placa' 
	WHERE idtransporte='$idtransporte'";
	return ejecutarConsulta($sql);
}
public function desactivar($idtransporte){
	$sql="UPDATE transporte SET condicion='0' WHERE idtransporte='$idtransporte'";
	return ejecutarConsulta($sql);
}
public function activar($idtransporte){
	$sql="UPDATE transporte SET condicion='1' WHERE idtransporte='$idtransporte'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idtransporte){
	$sql="SELECT * FROM transporte WHERE idtransporte='$idtransporte'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros 
public function listar(){
	$sql="SELECT * FROM transporte";
	return ejecutarConsulta($sql);
}

//listar registros activos
public function listarActivos(){
	$sql="SELECT * FROM transporte WHERE condicion='1'";
	return ejecutarConsulta($sql);
}

//listar y mostrar en selct
public function select(){
	$sql="SELECT * FROM transporte";
	return ejecutarConsulta($sql);
}


}
 ?>