<?php 
Class mostrar extends CI_Model{

 public function  get_areas()
 {
$query= $this->db->get('area');
return $query->result_array();
 }



  public function  get_materias()
 {
$query= $this->db->get('materias');
return $query->result_array();
 }

 public  function  horario_disponible($id_maestro)
 {
 $this->db->where('id_maestro',$id_maestro);
 $query2 = $this->db->get('maestro');
$query2=$query2->row_array(0);
$si=$query2["horario_inicio"];
$sf=$query2["horario_final"];


 $this->db->select('*');
 $this->db->from('horas_clase');
 $this->db->where("hora BETWEEN '".$si."' AND '".$sf."'"); 
$query = $this->db->get();

return $query->result_array();
 }
//

 public  function  get_detalle_maestro($id_maestro)
 {
$this->db->where('id_maestro',$id_maestro);
$query = $this->db->get('maestro');
return $query->row_array(0);
 }

 public function get_nombre_maestro($id_maestro){
 	$query=$this->db->query("select CONCAT(nombre,' ',apellido_paterno,' ',apellido_materno)as nombre_completo, CONCAT(clave_presupuestal_1,' ',clave_presupuestal_2,' ',clave_presupuestal_3)as clavepresupuestal from maestro where id_maestro = ".$id_maestro);
 	return $query->result_array();
 }



 public  function  sacar_materias($id_maestro)
 {
 $this->db->select('*');
 $this->db->from('horario_maestro');
 $this->db->where('horario_maestro.id_maestro',$id_maestro);
$query = $this->db->get();
return $query->result_array();
 }


 public  function  inner_materia($id_maestro)
 {
 $this->db->select('*');
 $this->db->from('materia_maestro');
 $this->db->join('materias', 'materia_maestro.id_materia = materias.id_materia');
 $this->db->where('materia_maestro.id_maestro',$id_maestro);
$query = $this->db->get();
return $query->result_array();
 }



public  function  get_detalle_perfil($id_maestro)
 {
$this->db->where('id_maestro',$id_maestro);
$query = $this->db->get('perfil_profesiografico');
return $query->row_array(0);
 }


 public function  get_maestro()
 {
$query= $this->db->get('maestro');
return $query->result_array();
 }

 public function get_horario_maestro($id_maestro){
 	$query = $this->db->query("select M.materia_nombre as NombreMateria, HM.horario_inicio, HM.horario_final, HM.grupo, HM.dia, HM.semestre from horario_maestro HM inner join(select id_materia, materia_nombre from materias)as M on M.id_materia=HM.id_materia where id_maestro = ".$id_maestro);
 	return $query->result_array();
 }

}




 ?>