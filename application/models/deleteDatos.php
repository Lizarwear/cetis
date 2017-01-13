<?php
Class DeleteDatos extends CI_Model
{
  function __construct(){
    parent::__construct();
  }

 function dataMaestros()
 {
   $query = $this->db->query("SELECT id_maestro, CONCAT(nombre,' ',apellido_paterno,' ',apellido_materno)as nombre_completo FROM maestro");
   //print_r($query->result());die();
   return $query->result_array();
 }

 function dataGrupo(){
 	$query = $this->db->query("SELECT id_grupo, nombre FROM grupo");
   //print_r($query->result());die();
   return $query->result_array();
 }

 function dataAula(){
 	$query = $this->db->query("SELECT id_aula, nombre FROM aula");
   //print_r($query->result());die();
   return $query->result_array();
 }

 function dataMateria(){
 	$query = $this->db->query("SELECT id_materia, nombre FROM materia");
   //print_r($query->result());die();
   return $query->result_array();
 }

 function deleteMaestro($id){
 	$this->db->where('id_maestro',$id);
 	return $this->db->delete('maestro');
 }

 function deleteGrupo($id){
 	$this->db->where('id_grupo',$id);
 	return $this->db->delete('grupo');
 }

 function deleteAula($id){
 	$this->db->where('id_aula',$id);
 	return $this->db->delete('aula');
 }

 function deleteMateria($id){
 	$this->db->where('id_materia',$id);
 	return $this->db->delete('materia');
 }

}
?>