<?php 

require('../clases/MySQL.class.php');
$Main= new MySQL();

$action=$_POST["action"];


switch ($action) {
	case 'select':
	
	$info=$_POST["info"];
	$id=	$info["id"];
	$query="SELECT m.clave_presupuestal_1,m.clave_presupuestal_2,m.clave_presupuestal_3 FROM maestro as m WHERE m.id_maestro=$id";
$r=$Main->query_row($query);

	echo json_encode($r);



		break;
	case 'clave':
	//echo "entroo case 2";
	$info=$_POST["info"];
	
	$clave=$info["clave"];
	$query="SELECT m.id_materia,m.materia_nombre,SUM(m.hora) FROM horario_maestro as hm  INNER JOIN materias as m on hm.id_materia=m.id_materia WHERE hm.clave_presupuestal='$clave'";
	$r=$Main->query_row($query);
	
	echo json_encode($r);

		break;
	default:
		# code...
		break;
}



 ?>