<?php 
require_once('clases/MySQL.class.php');
$Main= new MySQL();
$info=$_POST["info"];

switch ($action) {
	case 'claves':
		$query="SELECT clave_presupuestal_1, clave_presupuestal_2, clave_presupuestal_3 FROM maestro WHERE id_maestro=$info["id"] ";
		echo $query;
		exit();
		break;
	case 'clave':
	$clave=$info["clave"];
	$query="SELECT id_materia FROM materia_maestro WHERE clave_presupuestal=$clave";
		
		break;
	default:
		# code...
		break;
}



 ?>