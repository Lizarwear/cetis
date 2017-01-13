<?php
Class Grabar extends CI_Model
{
  function __construct(){
    parent::__construct();
  }

 function grupo($datos)
 {
   $this->db->insert('grupo',$datos);
 }

 function aula($datos){
  $this->db->insert('aula',$datos);
 }

 function materia($datos){
  $this->db->insert('materia',$datos);
 }


  function area($datos){
  $this->db->insert('area',$datos);
 }


 function materias($datos){
  $this->db->insert('materia_maestro',$datos);
 }

 function horario_maestro($datos){
  $this->db->insert('horario_maestro',$datos);
 }


 function maestro($datos_generales,$datos_domicilio,$datos_profesiografico){
  $this->db->insert('maestro',$datos_generales);
  $id = $this->db->insert_id();
  //$id = $this->db->query('SELECT id_maestro FROM maestro');
  $datos_domicilio["id_maestro"] = $id;
  $datos_profesiografico["id_maestro"] = $id;
  $this->db->insert('domicilio',$datos_domicilio);
  $this->db->insert('perfil_profesiografico',$datos_profesiografico);
 }
}
?>