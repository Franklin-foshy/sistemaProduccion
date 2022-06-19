<?php
///// CONEXION A LA BASE DE DATOS /////////
$usuario='root';
$contraseña='';
$host='localhost';
$base='proyecto2022';

try {
   		$conexion = new PDO('mysql:host='.$host.';dbname='.$base, $usuario, $contraseña);
	} 
	catch (PDOException $e) 
	{
	    print "¡Error!: " . $e->getMessage() . "<br/>";
	    die();
	}
?>

<html lang="es">
	<head> 
		<title>Reportes</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="../public/info/css/estilos.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h3>Servicio de envio</h3>
			</div>
		</header>

		<section>
			<table class="col-md-12">
				<tr class="bg-primary">
					<th class="pad-basic">Nombre del servicio</th>
					<th class="pad-basic">Descripcion</th>
					<th class="pad-basic">vehiculo</th>
					<th class="pad-basic">Ruta de entrega </th>
				
				<tr>

				<?php

				$query="SELECT servicio.nombre,  servicio.descripcion, transporte.vehiculo, transporte.direccion
                        FROM servicio INNER JOIN transporte
                        ON servicio.idservicio = transporte.idtransporte";

				$consulta=$conexion->query($query);
				while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
					{
						echo'
					     <tr>
						<td>'.$fila['nombre'].'</td>
						<td>'.$fila['descripcion'].'</td>
						<td>'.$fila['vehiculo'].'</td>
						<td>'.$fila['direccion'].'</td>
						</tr>
						';
					}


				?>

			</table>
		</section>
</body>
</html>

