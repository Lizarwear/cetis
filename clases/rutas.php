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
	$query="SELECT count(m.id_materia) as horas,m.materia_nombre,m.hora FROM horario_maestro as hm  INNER JOIN materias as m on hm.id_materia=m.id_materia WHERE hm.clave_presupuestal='$clave'";
	
	$r=$Main->query_row($query);


	
	echo json_encode($r);

		break;
		//case donde vere si la materia tiene ya su limite
		case 'mate':
			$info=$_POST["info"];
	
	$id_materia=$info["id_materia"];
	$clave=$info["clavep"];
	$query="SELECT COUNT(id_maestro) as veces  FROM horario_maestro WHERE id_materia=$id_materia and clave_presupuestal='$clave'";
	
	$r=$Main->query_row($query);
	$horass=$r[0][0];
	$query2="SELECT hora FROM materias WHERE id_materia=$id_materia";
	$r2=$Main->query_row($query2);
	$horas_materia=$r2[0][0];
	
	if ($horass==$horas_materia) {
		echo json_encode(1);
	}else{echo json_encode(2);}
	


	
	// echo json_encode($r);
			break;
	default:
		# code...
		break;
}



 ?>