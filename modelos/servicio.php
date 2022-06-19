<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Servicio{ 


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar
public function insertar($idtransporte,$nombre){
	$sql="INSERT INTO servicio (idtransporte,nombre,condicion)
	 VALUES ('$idtransporte','$nombre','1')";
	return ejecutarConsulta($sql);
}

public function editar($idservicio,$idtransporte,$nombre){
	$sql="UPDATE servicio SET idtransporte='$idtransporte',nombre='$nombre' 
	WHERE idservicio='$idservicio'";
	return ejecutarConsulta($sql);
}
public function desactivar($idservicio){
	$sql="UPDATE servicio SET condicion='0' WHERE idservicio='$idservicio'";
	return ejecutarConsulta($sql);
}
public function activar($idservicio){
	$sql="UPDATE servicio SET condicion='1' WHERE idservicio='$idservicio'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idservicio){
	$sql="SELECT * FROM servicio WHERE idservicio='$idservicio'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros 
public function listar(){
	$sql="SELECT * FROM servicio";
	return ejecutarConsulta($sql);
}

//listar registros activos
public function listarActivos(){
	$sql="SELECT * FROM servicio WHERE condicion='1'";
	return ejecutarConsulta($sql);
}


/* mostrar datos generales con los iner join */
public function listar2(){
	$sql="SELECT a.nombre, a.condicion, c.tipovehiculo as transporte, a.idservicio FROM servicio as a INNER JOIN transporte as c ON c.idtransporte=a.idtransporte";
	return ejecutarConsulta($sql);
}


/*
	3 inner join
	$sql="SELECT a.nombre, a.condicion, c.tipovehiculo as transporte, a.idservicio, e.direccion FROM servicio as a INNER JOIN transporte as c ON c.idtransporte=a.idtransporte INNER JOIN extraccion as e ON e.idtrasporte=c.idtransporte";
*/

/*  
public function listarActivosVenta(){
	$sql="SELECT  a.nombre, c.tipovehiculo as transporte, a.condicion FROM servicio as a INNER JOIN transporte as c ON a.idtransporte=c.idtransporte WHERE a.condicion='1'";
	return ejecutarConsulta($sql);
}
*/
}

 ?>