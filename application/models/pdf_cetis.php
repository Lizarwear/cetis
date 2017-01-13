<?php
class Pdf_cetis extends CI_Model {
 
    function __construct()
    {
        parent::__construct();
    }
 
    /* Devuelve la lista de alumnos que se encuentran en la tabla tblalumno */

    function obtenerListaMaestros()
    {
      //$this->load->database();
        $query = $this->db->query("select CONCAT(M.nombre,' ',M.apellido_paterno,' ',M.apellido_materno)as nombre_completo,M.rfc,M.disponibilidad,M.clave_presupuestal_1,M.clave_presupuestal_2,M.clave_presupuestal_3,M.sexo,M.curp,M.email,M.telefono from maestro M");
        return $query->result();
    }

    function obtenerListaMaestrosDomicilio()
    {
      //$this->load->database();
        $query = $this->db->query("select M.nombre_completo, D.calle, D.numero, D.colonia, D.localidad, D.estado from domicilio D inner join(select id_maestro, CONCAT(nombre,' ',apellido_paterno,' ',apellido_materno)as nombre_completo from maestro)as M on M.id_maestro=D.id_maestro");
        return $query->result();
    }
//

  function MaestrosyMaterias()
    {
      //$this->load->database();
        $query = $this->db->query("SELECT
  id_maestro,
  nombre,
  apellido_paterno,
  apellido_materno,
  
  clave_presupuestal_1,
  clave_presupuestal_2,
  clave_presupuestal_3,
  disponibilidad,
  funcion,
  hora,
  horario_inicio,
  horario_final
FROM
  maestro  M");
        return $query->result();

    }

//

    function obtenerListaMaestrosFuncion(){
        $query = $this->db->query("select CONCAT(nombre,' ',apellido_paterno,' ',apellido_materno)as nombre_completo, funcion, tipo, horario_inicio, horario_final from maestro");
        return $query->result();
    }

    function obtenerListaMaestrosPerfil(){
        $query = $this->db->query("select M.nombre_completo, nivel_academico, carrera, especialidad, materias from perfil_profesiografico PF inner join(select id_maestro, CONCAT(nombre,' ',apellido_paterno,' ',apellido_materno)as nombre_completo from maestro)as M on M.id_maestro = PF.id_maestro");
        return $query->result();
    }

    function obtenerListaGrupos(){
        $query = $this->db->query("select nombre, cantidad_alumno, carrera, ciclo_escolar, periodo from grupo");
        return $query->result();
    }

    function obtenerListaAulas(){
        $query = $this->db->query("select nombre, capacidad, tipo from aula");
        return $query->result();
    }

    function obtenerListaMaterias(){
        $query = $this->db->query("select nombre, hora, tipo from materia");
        return $query->result();
    }
}
?>