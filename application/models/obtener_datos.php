<?php
class Obtener_datos extends CI_Model {
 
    function __construct()
    {
        parent::__construct();
    }
 
    /* Devuelve la lista de alumnos que se encuentran en la tabla tblalumno */

    function nombreGrupos($semestre){
        $query = $this->db->query("select nombre from grupo");
        return $query->result();
    }

    function datosMaestros(){
    	$query = $this->db->query("select id_maestro, CONCAT(nombre,' ',apellido_paterno,' ',apellido_materno)as nombre_completo from maestro");
    	return $query->result_array();
    }
    
    function filtrado($id){

    }
}
?>