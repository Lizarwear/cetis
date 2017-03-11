<?php  

	require('MySQL.class.php');

	Class Cita extends MySQL{


		public function cancelar($info){
			
			$consult = "UPDATE citas SET asistio = 2 WHERE nafiliacion = $info";

			return $this->query($consult);
		}

		public function confirmar($info){

			$query = "UPDATE citas set asistio = '1' WHERE id = $info";
			return $this->query($query);
		}

		public function eliminar($info){

			$query = "DELETE FROM citas WHERE id = $info";
			// echo $query;exit;
			return $this->query($query);
		}
	}

?>