<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('grabar');
   $this->load->model('pdf_cetis');
   $this->load->model('deleteDatos');
   $this->load->model('obtener_datos');
   $this->load->model('mostrar');
 }

 function index()
 {
  session_start(); //we need to call PHP's session object to access it through CI
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     print_r($data);die();
     $this->load->view('home_view_inicio', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

 function inicio()
 {
  $this->load->view('home_view_inicio'); 
 }



//
 function altas(){
  $this->load->view('home_view_altas');
 }

 function asigna_horario($id_maestro){
  $q["nombre"]=$this->mostrar->get_nombre_maestro($id_maestro);
  $q["materias"]=$this->mostrar->inner_materia($id_maestro);
  $q["hora"]=$this->mostrar->horario_disponible($id_maestro);
  $q["id_maestro"]=$id_maestro;
  $q["horario_maestro"]=$this->mostrar->get_horario_maestro($id_maestro);
 // $q["restantes"]=$this->mostrar->get_horas_res($id_maestro);
  $q["claves"]=$this->mostrar->get_claves_horas($id_maestro);



  
$this->load->view('home_view_asigna_horario',$q);
 }


//horario agregar horas restantes
 function addHorario_maestra($id_maestro){
//
  $id_maestro=$id_maestro;
  $datos["id_maestro"] = $id_maestro;
   $datos["id_materia"] = $this->input->post('id_materia');
   $datos["horario_inicio"] = $this->input->post('horario_inicio');
    $datos["grupo"] = $this->input->post('grupo');
     $datos["dia"] = $this->input->post('dia');
      $datos["semestre"] = $this->input->post('semestre');
      $datos["clave_presupuestal"] = $this->input->post('clave_horas_');
      $punto=strpos($datos["clave_presupuestal"],'.');
      $final=strlen($datos["clave_presupuestal"]);
      $oi=  substr($datos["clave_presupuestal"], $punto+1, $final); 
    
      //total de horas que puede dar con esa clave presupuestal
     
    
$ww=$this->input->post('horario_inicio');

$w='00:50:00';
//
$r=$this->sumar($ww, $w);

   $datos["horario_final"] = $r;
   //

$this->db->select('*');
$this->db->from('horario_maestro as H');
$this->db->where('H.horario_inicio',$datos["horario_inicio"]);
$this->db->where('H.dia',$datos["dia"]);
$this->db->where('H.grupo',$datos["grupo"]);

 
$query1 = $this->db->get();
$resultado = $query1->result();

$popo=count($resultado);
   
// $query=$query->row_array(0);
// $di=$datos["horario_inicio"];
if ($datos['id_materia']!='') {
  


if ($resultado) {
echo '<script language="javascript">alert("Horario ocupado");</script>'; 
$this->asigna_horario($id_maestro);

}else{
     $this->grabar->horario_maestro($datos);
     echo '<script language="javascript">alert("Horario asignado");</script>'; 
       $this->asigna_horario($id_maestro);
}

}



     // $this->asigna_horario($id_maestro);

//comparacion solo por hora ocupada :'v

  //$this->load->view('home_view_altas');
 } 
//
 function sumar($hora1, $hora2){
    $a = new DateTime($hora1); //Creo un objeto DateTime
    $b = new DateInterval(
        (new DateTime($hora2))->format('\P\TH\Hi\Ms\S')
    ); //Creo un objeto DateInterval
    $a->add($b); //Sumo las horas
    return $a->format('h:i:s'); //Imprimo las horas
}
//

  function vermaestro(){
     $q["maestro"]=$this->mostrar->get_maestro();
  $this->load->view('home_view_vermaestro',$q);///////
 }

 function ver_detalle_maestro(){
     $q["maestro"]=$this->mostrar->get_maestro();
  $this->load->view('home_view_vermaestro',$q);///////
 }

function ver_maestro($id_maestro){
$q["detalle"]=$this->mostrar->get_detalle_maestro($id_maestro);

$q["perfil"]=$this->mostrar->get_detalle_perfil($id_maestro);
$q["materias"]=$this->mostrar->inner_materia($id_maestro);
// die(var_dump($q["materias"]));
  $this->load->view('home_view_ver_maestro',$q);///////

 }

  function area(){
  $this->load->view('home_view_areas');
 }


// problema 1
 //asignar materias a clave presupuestal
 function asignar_materia(){
  $q["materias"]=$this->mostrar->get_materias();
  $q["maestro"]=$this->mostrar->get_maestro();
  $this->load->view('home_view_asignar_materia_a_maestro',$q);
 }
 //



  function materias(){
  //$this->load->view('home_view_altas_materias');
  $q["area"]=$this->mostrar->get_areas();
  $this->load->view('home_view_altas_materias',$q);

  
 }


 function bajas(){
  $this->load->view('home_view_bajas');
 }

 function maestro()
 {
  $this->load->view('home_view_altas_maestro');
 }

 public function maestro_generales_pdf(){
  //Se carga la libreria fpdf
  $this->load->library('pdfM');
  //Se obtiene los datos generales de todos los maestros
  $maestros = $this->pdf_cetis->obtenerListaMaestros();
  //Creación del PDF
  $this->pdf = new pdfM();
  //Agregamos una página
  $this->pdf->AddPage();
  //Define el alias para el número de página que se imprimirá en el pie
  $this->pdf->AliasNbPages();
  //Se define el titulo y márgenes
  $this->pdf->SetTitle("Lista de los datos generales de los maestros");
  $this->pdf->SetLeftMargin(15);
  $this->pdf->SetRightMargin(15);
  $this->pdf->SetFillColor(0,0,0);
  $this->pdf->SetTextColor(255,255,255);
  //Se define el formato de fuente
  $this->pdf->SetFont('Arial','B',9);
  //Titulos de las columnas
  $this->pdf->Cell(10,7,'NUM','TBL',0,'C','1');
  $this->pdf->Cell(52,7,'NOMBRE','TB',0,'C','1');
  $this->pdf->Cell(27,7,'RFC','TB',0,'C','1');
  $this->pdf->Cell(30,7,'DISPONIBILIDAD','TB',0,'C','1');
  $this->pdf->Cell(30,7,'CLAVE','TB',0,'C','1');
  $this->pdf->Cell(20,7,'SEXO','TB',0,'C','1');
  $this->pdf->Cell(37,7,'CURP','TB',0,'C','1');
  $this->pdf->Cell(42,7,'EMAIL','TB',0,'C','1');
  $this->pdf->Cell(22,7,utf8_decode('TELÉFONO'),'TBR',0,'C','1');
  $this->pdf->Ln(7);
  //Se define el formato defuente
  $this->pdf->SetFont('Arial','',9);
  //Color gris tenue de fondo
  $this->pdf->SetFillColor(229,229,229);
  //Color de texto negro
  $this->pdf->SetTextColor(3,3,3);
  //Variable bandera para alterar el relleno gris tenue
  $bandera = false;
  // La variable $x se utiliza para mostrar un número consecutivo
    $x = 1;
    $n = 0;
    foreach ($maestros as $maestro) {
      if(empty($maestro->clave_presupuestal_2)){
        $clave = $maestro->clave_presupuestal_1;
        $n = 5;
      }else{
        if(empty($maestro->clave_presupuestal_3)){
          $clave = $maestro->clave_presupuestal_1 . $maestro->clave_presupuestal_2;
          $n = 10;
        }else{
          $clave = $maestro->clave_presupuestal_1 . $maestro->clave_presupuestal_2 . $maestro->clave_presupuestal_3;
          $n = 15;
        }
      }
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      $this->pdf->Cell(10,$n,$x++,'BL',0,'C',$bandera);
      // Se imprimen los datos de cada maestro
      $this->pdf->Cell(52,$n,utf8_decode($maestro->nombre_completo),'B',0,'C',$bandera);
      $this->pdf->Cell(27,$n,$maestro->rfc,'B',0,'C',$bandera);
      $this->pdf->Cell(30,$n,$maestro->disponibilidad,'B',0,'C',$bandera);
      $y = $this->pdf->GetY();
      $this->pdf->MultiCell(30,5,$clave,'B','C',$bandera);
      $this->pdf->SetXY(164,$y);
      $this->pdf->Cell(20,$n,$maestro->sexo,'B',0,'C',$bandera);
      $this->pdf->Cell(37,$n,$maestro->curp,'B',0,'C',$bandera);
      $this->pdf->Cell(42,$n,$maestro->email,'B',0,'C',$bandera);
      $this->pdf->Cell(22,$n,$maestro->telefono,'BR',0,'C',$bandera);
      //Se agrega un salto de linea
      $this->pdf->Ln();
      //Alteramos el valor de la variable bandera
      $bandera = !$bandera;
    }
    /*
     * Se manda el pdf al navegador
     *
     * $this->pdf->Output(nombredelarchivo, destino);
     *
     * I = Muestra el pdf en el navegador
     * D = Envia el pdf para descarga
     *
     */
    $this->pdf->Output("Lista_general_de_maestros.pdf", 'I');
 }

 public function maestro_domicilio_pdf(){
  //Se carga la libreria fpdf
  $this->load->library('pdfMD');
  //Se obtiene los datos generales de todos los maestros
  $maestros = $this->pdf_cetis->obtenerListaMaestrosDomicilio();
  //Creación del PDF
  $this->pdf = new pdfMD();
  //Agregamos una página
  $this->pdf->AddPage();
  //Define el alias para el número de página que se imprimirá en el pie
  $this->pdf->AliasNbPages();
  //Se define el titulo y márgenes
  $this->pdf->SetTitle("Lista del domicilio de los maestros");
  $this->pdf->SetLeftMargin(15);
  $this->pdf->SetRightMargin(15);
  $this->pdf->SetFillColor(0,0,0);
  $this->pdf->SetTextColor(255,255,255);
  //Se define el formato de fuente
  $this->pdf->SetFont('Arial','B',8);
  //Titulos de las columnas
  $this->pdf->Cell(9,6,'NUM','TBL',0,'C','1');
  $this->pdf->Cell(43,6,'NOMBRE','TB',0,'C','1');
  $this->pdf->Cell(40,6,'CALLE','TB',0,'C','1');
  $this->pdf->Cell(10,6,'#','TB',0,'C','1');
  $this->pdf->Cell(30,6,'COLONIA','TB',0,'C','1');
  $this->pdf->Cell(20,6,'LOCALIDAD','TB',0,'C','1');
  $this->pdf->Cell(25,6,'ESTADO','TBR',0,'C','1');
  $this->pdf->Ln(7);
  //Se define el formato defuente
  $this->pdf->SetFont('Arial','',8);
  //Color gris tenue de fondo
  $this->pdf->SetFillColor(229,229,229);
  //Color de texto negro
  $this->pdf->SetTextColor(3,3,3);
  //Variable bandera para alterar el relleno gris tenue
  $bandera = false;
  // La variable $x se utiliza para mostrar un número consecutivo
    $x = 1;
    foreach ($maestros as $maestro) {
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      $this->pdf->Cell(9,6,$x++,'BL',0,'C',$bandera);
      // Se imprimen los datos de cada maestro
      $this->pdf->Cell(43,6,utf8_decode($maestro->nombre_completo),'B',0,'C',$bandera);
      $this->pdf->Cell(40,6,utf8_decode($maestro->calle),'B',0,'C',$bandera);
      $this->pdf->Cell(10,6,$maestro->numero,'B',0,'C',$bandera);
      $this->pdf->Cell(30,6,utf8_decode($maestro->colonia),'B',0,'C',$bandera);
      $this->pdf->Cell(20,6,utf8_decode($maestro->localidad),'B',0,'C',$bandera);
      $this->pdf->Cell(25,6,utf8_decode($maestro->estado),'BR',0,'C',$bandera);
      //Se agrega un salto de linea
      $this->pdf->Ln();
      //Alteramos el valor de la variable bandera
      $bandera = !$bandera;
    }
    /*
     * Se manda el pdf al navegador
     *
     * $this->pdf->Output(nombredelarchivo, destino);
     *
     * I = Muestra el pdf en el navegador
     * D = Envia el pdf para descarga
     *
     */
    $this->pdf->Output("Lista_domicilio_de_maestros.pdf", 'I');
 }

 public function maestro_funcion_pdf(){
  //Se carga la libreria fpdf
  $this->load->library('pdfMF');
  //Se obtiene los datos generales de todos los maestros
  $maestros = $this->pdf_cetis->obtenerListaMaestrosFuncion();
  //Creación del PDF
  $this->pdf = new pdfMF();
  //Agregamos una página
  $this->pdf->AddPage();
  //Define el alias para el número de página que se imprimirá en el pie
  $this->pdf->AliasNbPages();
  $titulo = utf8_decode("Lista de la función institucional de los maestros");
  //Se define el titulo y márgenes
  $this->pdf->SetTitle($titulo);
  $this->pdf->SetLeftMargin(15);
  $this->pdf->SetRightMargin(15);
  $this->pdf->SetFillColor(0,0,0);
  $this->pdf->SetTextColor(255,255,255);
  //Se define el formato de fuente
  $this->pdf->SetFont('Arial','B',8);
  //Titulos de las columnas
  $this->pdf->Cell(9,6,'NUM','TBL',0,'C','1');
  $this->pdf->Cell(43,6,'NOMBRE','TB',0,'C','1');
  //$this->pdf->Cell(25,7,'A PATERNO','TB',0,'C','1');
  //$this->pdf->Cell(25,7,'A MATERNO','TB',0,'C','1');
  $this->pdf->Cell(40,6,utf8_decode('FUNCIÓN'),'TB',0,'C','1');
  $this->pdf->Cell(20,6,'TIPO','TB',0,'C','1');
  $this->pdf->Cell(27,6,'ENTRADA','TB',0,'C','1');
  $this->pdf->Cell(27,6,'SALIDA','TBR',0,'C','1');
  $this->pdf->Ln(7);
  //Se define el formato defuente
  $this->pdf->SetFont('Arial','',8);
  //Color gris tenue de fondo
  $this->pdf->SetFillColor(229,229,229);
  //Color de texto negro
  $this->pdf->SetTextColor(3,3,3);
  //Variable bandera para alterar el relleno gris tenue
  $bandera = false;
  // La variable $x se utiliza para mostrar un número consecutivo
    $x = 1;
    foreach ($maestros as $maestro) {
      if($maestro->horario_inicio == '06:00:00' || $maestro->horario_inicio == '07:00:00' || $maestro->horario_inicio == '08:00:00' || $maestro->horario_inicio == '09:00:00' || $maestro->horario_inicio == '10:00:00' || $maestro->horario_inicio == '11:00:00'){
        $hora_entrada = $maestro->horario_inicio . ' AM';
      }else{
        $hora_entrada = $maestro->horario_inicio . ' PM';
      }
      if($maestro->horario_final == '06:00:00' || $maestro->horario_final == '07:00:00' || $maestro->horario_final == '08:00:00' || $maestro->horario_final == '09:00:00' || $maestro->horario_final == '10:00:00' || $maestro->horario_final == '11:00:00'){
        $hora_salida = $maestro->horario_final . ' AM';
      }else{
        $hora_salida = $maestro->horario_final . ' PM';
      }
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      $this->pdf->Cell(9,6,$x++,'BL',0,'C',$bandera);
      // Se imprimen los datos de cada maestro
      $this->pdf->Cell(43,6,utf8_decode($maestro->nombre_completo),'B',0,'C',$bandera);
      $this->pdf->Cell(40,6,utf8_decode($maestro->funcion),'B',0,'C',$bandera);
      $this->pdf->Cell(20,6,$maestro->tipo,'B',0,'C',$bandera);
      $this->pdf->Cell(27,6,$hora_entrada,'B',0,'C',$bandera);
      $this->pdf->Cell(27,6,$hora_salida,'BR',0,'C',$bandera);
      //Se agrega un salto de linea
      $this->pdf->Ln();
      //Alteramos el valor de la variable bandera
      $bandera = !$bandera;
    }
    /*
     * Se manda el pdf al navegador
     *
     * $this->pdf->Output(nombredelarchivo, destino);
     *
     * I = Muestra el pdf en el navegador
     * D = Envia el pdf para descarga
     *
     */
    $this->pdf->Output("Lista_funcion_de_maestros.pdf", 'I');
 }

 public function maestro_perfil_pdf(){
  //Se carga la libreria fpdf
  $this->load->library('pdfMP');
  //Se obtiene los datos generales de todos los maestros
  $maestros = $this->pdf_cetis->obtenerListaMaestrosPerfil();
  //Creación del PDF
  $this->pdf = new pdfMP();
  //Agregamos una página
  $this->pdf->AddPage();
  //Define el alias para el número de página que se imprimirá en el pie
  $this->pdf->AliasNbPages();
  $titulo = utf8_decode("Lista del perfil profesiográfico de los maestros");
  //Se define el titulo y márgenes
  $this->pdf->SetTitle($titulo);
  $this->pdf->SetLeftMargin(15);
  $this->pdf->SetRightMargin(15);
  $this->pdf->SetFillColor(0,0,0);
  $this->pdf->SetTextColor(255,255,255);
  //Se define el formato de fuente
  $this->pdf->SetFont('Arial','B',8);
  //Titulos de las columnas
  $this->pdf->Cell(9,6,'NUM','TBL',0,'C','1');
  $this->pdf->Cell(43,6,'NOMBRE','TB',0,'C','1');
  //$this->pdf->Cell(25,7,'A PATERNO','TB',0,'C','1');
  //$this->pdf->Cell(25,7,'A MATERNO','TB',0,'C','1');
  $this->pdf->Cell(28,6,utf8_decode('NIVEL ACADÉMICO'),'TB',0,'C','1');
  $this->pdf->Cell(50,6,'CARRERA','TB',0,'C','1');
  $this->pdf->Cell(40,6,'ESPECIALIDAD','TBR',0,'C','1');
  $this->pdf->Ln(7);
  //Se define el formato defuente
  $this->pdf->SetFont('Arial','',8);
  //Color gris tenue de fondo
  $this->pdf->SetFillColor(229,229,229);
  //Color de texto negro
  $this->pdf->SetTextColor(3,3,3);
  //Variable bandera para alterar el relleno gris tenue
  $bandera = false;
  // La variable $x se utiliza para mostrar un número consecutivo
    $x = 1;
    foreach ($maestros as $maestro) {
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      $this->pdf->Cell(9,6,$x++,'BL',0,'C',$bandera);
      // Se imprimen los datos de cada maestro
      $this->pdf->Cell(43,6,utf8_decode($maestro->nombre_completo),'B',0,'L',$bandera);
      $this->pdf->Cell(28,6,utf8_decode($maestro->nivel_academico),'B',0,'C',$bandera);
      $this->pdf->Cell(50,6,utf8_decode($maestro->carrera),'B',0,'C',$bandera);
      $this->pdf->Cell(40,6,utf8_decode($maestro->especialidad),'BR',0,'C',$bandera);
      //Se agrega un salto de linea
      $this->pdf->Ln();
      //Alteramos el valor de la variable bandera
      $bandera = !$bandera;
    }
    /*
     * Se manda el pdf al navegador
     *
     * $this->pdf->Output(nombredelarchivo, destino);
     *
     * I = Muestra el pdf en el navegador
     * D = Envia el pdf para descarga
     *
     */
    $this->pdf->Output("Lista_perfil_profesiografico_maestros.pdf", 'I');
 }

 function grupo(){
  $this->load->view('home_view_altas_grupo');
 }

 function grupo_pdf(){
  //Se carga la libreria fpdf
  $this->load->library('pdfG');
  //Se obtiene los datos generales de todos los maestros
  $grupos = $this->pdf_cetis->obtenerListaGrupos();
  //Creación del PDF
  $this->pdf = new pdfG();
  //Agregamos una página
  $this->pdf->AddPage();
  //Define el alias para el número de página que se imprimirá en el pie
  $this->pdf->AliasNbPages();
  //Se define el titulo y márgenes
  $this->pdf->SetTitle("Lista de los Grupos");
  $this->pdf->SetLeftMargin(15);
  $this->pdf->SetRightMargin(15);
  $this->pdf->SetFillColor(0,0,0);
  $this->pdf->SetTextColor(255,255,255);
  //Se define el formato de fuente
  $this->pdf->SetFont('Arial','B',9);
  //Titulos de las columnas
  $this->pdf->Cell(10,7,'NUM','TBL',0,'C','1');
  $this->pdf->Cell(25,7,'GRUPO','TB',0,'C','1');
  $this->pdf->Cell(18,7,'ALUMNOS','TB',0,'C','1');
  $this->pdf->Cell(25,7,'CARRERA','TB',0,'C','1');
  $this->pdf->Cell(30,7,'CICLO ESCOLAR','TB',0,'C','1');
  $this->pdf->Cell(20,7,'PERIODO','TBR',0,'C','1');
  $this->pdf->Ln(7);
  //Se define el formato defuente
  $this->pdf->SetFont('Arial','',9);
  //Color gris tenue de fondo
  $this->pdf->SetFillColor(229,229,229);
  //Color de texto negro
  $this->pdf->SetTextColor(3,3,3);
  //Variable bandera para alterar el relleno gris tenue
  $bandera = false;
  // La variable $x se utiliza para mostrar un número consecutivo
    $x = 1;
    foreach ($grupos as $grupo) {
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      $this->pdf->Cell(10,5,$x++,'BL',0,'C',$bandera);
      // Se imprimen los datos de cada alumno
      $this->pdf->Cell(25,5,$grupo->nombre,'B',0,'C',$bandera);
      $this->pdf->Cell(18,5,$grupo->cantidad_alumno,'B',0,'C',$bandera);
      $this->pdf->Cell(25,5,$grupo->carrera,'B',0,'C',$bandera);
      $this->pdf->Cell(30,5,$grupo->ciclo_escolar,'B',0,'C',$bandera);
      $this->pdf->Cell(20,5,$grupo->periodo,'BR',0,'C',$bandera);
      //Se agrega un salto de linea
      $this->pdf->Ln();
      //Alteramos el valor de la variable bandera
      $bandera = !$bandera;
    }
    /*
     * Se manda el pdf al navegador
     *
     * $this->pdf->Output(nombredelarchivo, destino);
     *
     * I = Muestra el pdf en el navegador
     * D = Envia el pdf para descarga
     *
     */
    $this->pdf->Output("Lista_de_grupos.pdf", 'I');
 }

 function aula(){
  $this->load->view('home_view_altas_aula');
 }

 function aula_pdf(){
  //Se carga la libreria fpdf
  $this->load->library('pdfA');
  //Se obtiene los datos generales de todos los maestros
  $aulas = $this->pdf_cetis->obtenerListaAulas();
  //Creación del PDF
  $this->pdf = new pdfA();
  //Agregamos una página
  $this->pdf->AddPage();
  //Define el alias para el número de página que se imprimirá en el pie
  $this->pdf->AliasNbPages();
  //Se define el titulo y márgenes
  $this->pdf->SetTitle("Lista de las Aulas");
  $this->pdf->SetLeftMargin(15);
  $this->pdf->SetRightMargin(15);
  $this->pdf->SetFillColor(0,0,0);
  $this->pdf->SetTextColor(255,255,255);
  //Se define el formato de fuente
  $this->pdf->SetFont('Arial','B',9);
  //Titulos de las columnas
  $this->pdf->Cell(10,7,'NUM','TBL',0,'C','1');
  $this->pdf->Cell(30,7,'AULA','TB',0,'C','1');
  $this->pdf->Cell(20,7,'CAPACIDAD','TB',0,'C','1');
  $this->pdf->Cell(25,7,'TIPO','TBR',0,'C','1');
  $this->pdf->Ln(7);
  //Se define el formato defuente
  $this->pdf->SetFont('Arial','',9);
  //Color gris tenue de fondo
  $this->pdf->SetFillColor(229,229,229);
  //Color de texto negro
  $this->pdf->SetTextColor(3,3,3);
  //Variable bandera para alterar el relleno gris tenue
  $bandera = false;
  // La variable $x se utiliza para mostrar un número consecutivo
    $x = 1;
    foreach ($aulas as $aula) {
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      $this->pdf->Cell(10,5,$x++,'BL',0,'C',$bandera);
      // Se imprimen los datos de cada alumno
      $this->pdf->Cell(30,5,utf8_decode($aula->nombre),'B',0,'C',$bandera);
      $this->pdf->Cell(20,5,$aula->capacidad,'B',0,'C',$bandera);
      $this->pdf->Cell(25,5,utf8_decode($aula->tipo),'BR',0,'C',$bandera);
      //Se agrega un salto de linea
      $this->pdf->Ln();
      //Alteramos el valor de la variable bandera
      $bandera = !$bandera;
    }
    /*
     * Se manda el pdf al navegador
     *
     * $this->pdf->Output(nombredelarchivo, destino);
     *
     * I = Muestra el pdf en el navegador
     * D = Envia el pdf para descarga
     *
     */
    $this->pdf->Output("Lista_de_aulas.pdf", 'I');
 }

 function materia(){
  $this->load->view('home_view_altas_materia');
 }

 function materia_pdf(){
    //Se carga la libreria fpdf
  $this->load->library('pdfMA');
  //Se obtiene los datos generales de todos los maestros
  $materias = $this->pdf_cetis->obtenerListaMaterias();
  //Creación del PDF
  $this->pdf = new pdfMA();
  //Agregamos una página
  $this->pdf->AddPage();
  //Define el alias para el número de página que se imprimirá en el pie
  $this->pdf->AliasNbPages();
  //Se define el titulo y márgenes
  $this->pdf->SetTitle("Lista de las Materias");
  $this->pdf->SetLeftMargin(15);
  $this->pdf->SetRightMargin(15);
  $this->pdf->SetFillColor(0,0,0);
  $this->pdf->SetTextColor(255,255,255);
  //Se define el formato de fuente
  $this->pdf->SetFont('Arial','B',9);
  //Titulos de las columnas
  $this->pdf->Cell(10,7,'NUM','TBL',0,'C','1');
  $this->pdf->Cell(30,7,'MATERIA','TB',0,'C','1');
  $this->pdf->Cell(15,7,'HORA','TB',0,'C','1');
  $this->pdf->Cell(25,7,'TIPO','TBR',0,'C','1');
  $this->pdf->Ln(7);
  //Se define el formato defuente
  $this->pdf->SetFont('Arial','',9);
  //Color gris tenue de fondo
  $this->pdf->SetFillColor(229,229,229); 
  //Color de texto negro
  $this->pdf->SetTextColor(3,3,3);
  //Variable bandera para alterar el relleno gris tenue
  $bandera = false;
  // La variable $x se utiliza para mostrar un número consecutivo
    $x = 1;
    foreach ($materias as $materia) {
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      $this->pdf->Cell(10,5,$x++,'BL',0,'C',$bandera);
      // Se imprimen los datos de cada alumno
      $this->pdf->Cell(30,5,$materia->nombre,'B',0,'C',$bandera);
      $this->pdf->Cell(15,5,$materia->hora,'B',0,'C',$bandera);
      $this->pdf->Cell(25,5,$materia->tipo,'BR',0,'C',$bandera);
      //Se agrega un salto de linea
      $this->pdf->Ln();
      //Alteramos el valor de la variable bandera
      $bandera = !$bandera;
    }
    /*
     * Se manda el pdf al navegador
     *
     * $this->pdf->Output(nombredelarchivo, destino);
     *
     * I = Muestra el pdf en el navegador
     * D = Envia el pdf para descarga
     *
     */
    $this->pdf->Output("Lista_de_aulas.pdf", 'I');
 }

 function addGrupo(){
    $datos["semestre"] = $_POST['semestre_grupo'];
    $datos["nombre"] = $_POST('nombre_grupo');
    $datos["cantidad_alumno"] = $this->input->post('cantidad_grupo');
    $datos["carrera"] = $_POST['carrera_grupo'];
    $datos["ciclo_escolar"] = $this->input->post('ciclo_escolar');
    $datos["periodo"] = $_POST['periodo'];
    $this->grabar->grupo($datos);
    ?>
        <script type="text/javascript">
          alert("Se ha agregado un nuevo grupo");
        </script>
    <?php
        $this->load->view('home_view_altas_grupo');
 }

 function addAula(){
    $datos["nombre"] = $this->input->post('nombre_aula');
    $datos["capacidad"] = $this->input->post('capacidad_aula');
    $datos["tipo"] = $_POST['tipo_aula'];

    $this->grabar->aula($datos);
    ?>
        <script type="text/javascript">
          alert("Se ha agregado una nueva aula");
        </script>
    <?php
        $this->load->view('home_view_altas_aula');
 }

 function addMaterias(){
    $datos["materia_nombre"] = $this->input->post('nombre');
    $datos["hora"] = $this->input->post('horas');
    $datos["semestre"] = $this->input->post('semestre');
    $datos["id_area"] = $this->input->post('id_area');

    $this->grabar->materiaaa($datos);
    ?>
        <script type="text/javascript">
          alert("Se ha agregado una nueva materia");
        </script>
    <?php
        $this->asignar_materia();
 }



 function addMateria(){
  $datos["nombre"] = $this->input->post('nombre_materia');
    $datos["hora"] = $this->input->post('horas_materia');
    $datos["tipo"] = $_POST['tipo_materia'];

    $this->grabar->materia($datos);
    ?>
        <script type="text/javascript">
          alert("Se ha agregado una nueva materia");
        </script>
    <?php
        $this->load->view('home_view_altas_materia');
 }

  function addArea(){
  $datos["nombre"] = $this->input->post('area');
   


    $this->grabar->area($datos);
    ?>
        <script type="text/javascript">
          alert("Se ha agregado una nueva area");
        </script>
    <?php
        $this->load->view('home_view_areas');
 }


  function addMaestro_materia(){
     $datos["id_materia"] = $this->input->post('materia');
  $datos["id_maestro"] = $this->input->post('maestros');
   $datos["clave_presupuestal"] = $this->input->post('clave_presupuestal');
 
   


    $this->grabar->materia($datos);
    ?>
        <script type="text/javascript">
          alert("Se ha asignado una materia al maestro");
        </script>
    <?php

  $q["materias"]=$this->mostrar->get_materias();
  $q["maestro"]=$this->mostrar->get_maestro();
  $this->load->view('home_view_asignar_materia_a_maestro',$q);
       

 }


 function addMaestro(){
  $datos_generales["nombre"] = $this->input->post('nombre_maestro');
  $datos_generales["apellido_paterno"] = $this->input->post('apellido_paterno');
  $datos_generales["apellido_materno"] = $this->input->post('apellido_materno');
  $datos_generales["rfc"] = $this->input->post('rfc_maestro');
  $datos_generales["disponibilidad"] = $_POST['disponibilidad_trabajo'];
  if($_POST['disponibilidad_trabajo'] == 'Por hora'){
    $datos_generales["hora"] = $this->input->post('hora');
  }else{
    $datos_generales["asignatura"] = $_POST['asignatura'];
  }
  if($_POST['clave_presupuestal'] == '1'){
    $datos_generales["clave_presupuestal_1"] = $this->input->post('clave1_1');
  }else{
    if($_POST['clave_presupuestal'] == '2'){
      $clave1 = $this->input->post('clave1_2');
      $clave2 = $this->input->post('clave2_2');
      $datos_generales["clave_presupuestal_1"] = $clave1;
      $datos_generales["clave_presupuestal_2"] = $clave2;
    }else{
      if($_POST['clave_presupuestal'] == '3'){
        $clave1 = $this->input->post('clave1_3');
        $clave2 = $this->input->post('clave2_3');
        $clave3 = $this->input->post('clave3_3');
        $datos_generales["clave_presupuestal_1"] = $clave1;
        $datos_generales["clave_presupuestal_2"] = $clave2;
        $datos_generales["clave_presupuestal_3"] = $clave3;
      }else{
        $datos_generales["clave_presupuestal_1"] = ('Sin clave presupuestal');
      }
    }
  }
  $datos_generales["sexo"] = $_POST['sexo_maestro'];
  $datos_generales["curp"] = $this->input->post('curp_maestro');
  $datos_generales["email"] = $this->input->post('email_maestro');
  $datos_generales["telefono"] = $this->input->post('telefono_maestro');

  $datos_domicilio["calle"] = $this->input->post('calle_maestro');
  $datos_domicilio["numero"] = $this->input->post('numero_calle_maestro');
  $datos_domicilio["colonia"] = $this->input->post('colonia_maestro');
  $datos_domicilio["localidad"] = $this->input->post('localidad_maestro');
  $datos_domicilio["estado"] = $this->input->post('estado_maestro');
  if($_POST['funcion_maestro'] == 'Administrativo'){
    $administrativo = $_POST['funcion_maestro'];
    $tipo_administrativo = $_POST['tipo_administrativo'];
    $datos_generales["funcion"] = ($administrativo . ' -> ' . $tipo_administrativo);
  }else{
    $datos_generales["funcion"] = $this->input->post('funcion_maestro');
  }
  $datos_generales["tipo"] = $_POST['tipo_maestro'];
  $datos_generales["horario_inicio"] = $_POST['hora_inicio'];
  $datos_generales["horario_final"] = $_POST['hora_final'];
  $nivel_academico = $_POST['nivel_academico'];
  $carrera = $_POST['carrera_academico'];
  $datos_profesiograficos["nivel_academico"] = ($nivel_academico);
  $datos_profesiograficos["carrera"] = ($carrera);
  $datos_profesiograficos["especialidad"] = $this->input->post('especialidad');

  $this->grabar->maestro($datos_generales,$datos_domicilio,$datos_profesiograficos);
    ?>
        <script type="text/javascript">
          alert("Se ha agregado un nuevo maestro");
        </script>
    <?php
        $this->load->view('home_view_altas_maestro');
 }

 function bajaMaestro(){
  $maestros = $this->deleteDatos->dataMaestros();
  
  $data['maestros'] = $maestros;
  $this->load->view('home_view_bajas_maestro',$data);
 }

 function bajaGrupo(){
  $grupos = $this->deleteDatos->dataGrupo();

  $data['grupos'] = $grupos;
  $this->load->view('home_view_bajas_grupo',$data);
 }

 function bajaAula(){
  $aulas = $this->deleteDatos->dataAula();

  $data['aulas'] = $aulas;
  $this->load->view('home_view_bajas_aula',$data);
 }

 function bajaMateria(){
  $materias = $this->deleteDatos->dataMateria();

  $data['materias'] = $materias;
  $this->load->view('home_view_bajas_materia',$data);
 }

 function deleteMaestro($id){
  $this->deleteDatos->deleteMaestro($id);
  ?>
  <script type="text/javascript">
    alert("Se ha eliminado correctamente");
  </script>
  <?php
  $this->bajaMaestro();
 }

 function deleteGrupo($id){
  $this->deleteDatos->deleteGrupo($id);
  ?>
  <script type="text/javascript">
    alert("Se ha eliminado correctamente");
  </script>
  <?php
  $this->bajaGrupo();
 }

 function deleteAula($id){
  $this->deleteDatos->deleteAula($id);
  ?>
  <script type="text/javascript">
    alert("Se ha eliminado correctamente");
  </script>
  <?php
  $this->bajaAula();
 }

 function deleteMateria($id){
  $this->deleteDatos->deleteMateria($id);
  ?>
  <script type="text/javascript">
    alert("Se ha eliminado correctamente");
  </script>
  <?php
  $this->bajaMateria();
 }

 function editar(){
  
 }

 function inicioHorarios(){
  $this->load->view('home_view_horarios_inicio');
 }

 function verHorarios(){
  $this->load->view('home_view_horarios_ver');
 }

 function horarioXmaestro(){
  $maestros = $this->obtener_datos->datosMaestros();
  $data['maestros'] = $maestros;
  $this->load->view('home_view_horarios_ver_maestro', $data);
 }

 function maestro_horario_simulacion($id){
  //$this->obtener_datos->
 }

 function maestrohorario($id){
  $horario_pdf=$this->mostrar->get_horario_maestro2($id);
  $mtro=$this->mostrar->get_detalle_maestro($id);
  $nom = $mtro["nombre"].' '.$mtro["apellido_paterno"].' '.$mtro["apellido_materno"];
  $cla = $mtro["clave_presupuestal_1"].' '.$mtro["clave_presupuestal_2"].' '.$mtro["clave_presupuestal_3"];
  //print_r($horario_pdf);die();
  $this->load->library('pdf');
  //$datosMaestro = $this->obtener_datos->filtrado($id);
  //Creación del PDF
  $this->pdf = new pdf();
  //Agregamos una página
  $this->pdf->AddPage();
  //Define el alias para el número de página que se imprimirá en el pie
  $this->pdf->AliasNbPages();
  //Se define el titulo y márgenes
  $this->pdf->SetTitle("Horario del maestro");
  $this->pdf->SetLeftMargin(10);
  $this->pdf->SetRightMargin(10);
  //$this->pdf->SetFillColor(0,0,0);
  //$this->pdf->SetTextColor(255,255,255);
  //Se define el formato de fuente
  $this->pdf->SetFont('Arial','',8);
  //Titulos de las columnas
  $y = $this->pdf->GetY();
  $this->pdf->MultiCell(25,4,'DOCENTE: CLAVE:',1,'C','0');
  $this->pdf->SetXY(35,$y);
  $this->pdf->Cell(250,8,'',1,'C','0');
  $this->pdf->SetXY(-460,-179);
  $this->pdf->Cell(0,5,utf8_decode($nom),0,0,'C');
  $this->pdf->SetXY(-456,-176);
  $this->pdf->Cell(0,5,$cla,0,0,'C');
  $this->pdf->SetXY(-70,-176);
  $this->pdf->Cell(0,5,'AGOSTO 2016 - ENERO 2017',0,0,'C');
  $this->pdf->SetXY(-287,-167);
  $this->pdf->Cell(25,5,'',1,'C','0');
  $this->pdf->Cell(50,5,'LUNES',1,'C','C');
  $this->pdf->Cell(50,5,'MARTES',1,'C','C');
  $this->pdf->Cell(50,5,utf8_decode('MIÉRCOLES'),1,'C','C');
  $this->pdf->Cell(50,5,'JUEVES',1,'C','C');
  $this->pdf->Cell(50,5,'VIERNES',1,'C','C');
  $this->pdf->SetXY(-287,-162);
  $this->pdf->Cell(25,5,'AULA',1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'LUNES' && $value->horario_inicio == '07:30:00' && $value->horario_final == '08:20:00'){
      $aulaL1 = $value->semestre.$value->grupo;
      $aulaL2 = '';break;        
    }else{
      $aulaL1 = '';
      $aulaL2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaL1.$aulaL2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MARTES' && $value->horario_inicio == '07:30:00' && $value->horario_final == '08:20:00'){
      $aulaMa1 = $value->semestre.$value->grupo;
      $aulaMa2 = '';break;        
    }else{
      $aulaMa1 = '';
      $aulaMa2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaMa1.$aulaMa2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MIERCOLES' && $value->horario_inicio == '07:30:00' && $value->horario_final == '08:20:00'){
      $aulaMi1 = $value->semestre.$value->grupo;
      $aulaMi2 = '';break;        
    }else{
      $aulaMi1 = '';
      $aulaMi2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaMi1.$aulaMi2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'JUEVES' && $value->horario_inicio == '07:30:00' && $value->horario_final == '08:20:00'){
      $aulaJu1 = $value->semestre.$value->grupo;
      $aulaJu2 = '';break;       
    }else{
      $aulaJu1 = '';
      $aulaJu2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaJu1.$aulaJu2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'VIERNES' && $value->horario_inicio == '07:30:00' && $value->horario_final == '08:20:00'){
      $aulaVi1 = $value->semestre.$value->grupo;
      $aulaVi2 = '';break;       
    }else{
      $aulaVi1 = '';
      $aulaVi2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaVi1.$aulaVi2),1,'C','C');
  $this->pdf->SetXY(-287,-157);
  $this->pdf->Cell(25,9,'',1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'LUNES' && $value->horario_inicio == '07:30:00' && $value->horario_final == '08:20:00'){
      $materiaL1 = $value->NombreMateria;
      $materiaL2 = '';break;       
    }else{
      $materiaL1 = '';
      $materiaL2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaL1.$materiaL2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MARTES' && $value->horario_inicio == '07:30:00' && $value->horario_final == '08:20:00'){
      $materiaMa1 = $value->NombreMateria;
      $materiaMa2 = '';break;       
    }else{
      $materiaMa1 = '';
      $materiaMa2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaMa1.$materiaMa2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MIERCOLES' && $value->horario_inicio == '07:30:00' && $value->horario_final == '08:20:00'){
      $materiaMi1 = $value->NombreMateria;
      $materiaMi2 = '';break;       
    }else{
      $materiaMi1 = '';
      $materiaMi2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaMi1.$materiaMi2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'JUEVES' && $value->horario_inicio == '07:30:00' && $value->horario_final == '08:20:00'){
      $materiaJu1 = $value->NombreMateria;
      $materiaJu2 = '';break;       
    }else{
      $materiaJu1 = '';
      $materiaJu2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaJu1.$materiaJu2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'VIERNES' && $value->horario_inicio == '07:30:00' && $value->horario_final == '08:20:00'){
      $materiaVi1 = $value->NombreMateria;
      $materiaVi2 = '';break;       
    }else{
      $materiaVi1 = '';
      $materiaVi2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaVi1.$materiaVi2),1,'C','C');
  $this->pdf->SetXY(-537.5,-158.5);
  $this->pdf->Cell(0,9,'7:30',0,0,'C');
  $this->pdf->SetXY(-537.5,-155);
  $this->pdf->Cell(0,9,'8:20',0,0,'C');
  $this->pdf->SetXY(-287,-148);
  $this->pdf->Cell(25,5,'AULA',1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'LUNES' && $value->horario_inicio == '08:20:00' && $value->horario_final == '09:10:00'){
      $aulaL1 = $value->semestre.$value->grupo;
      $aulaL2 = '';break;        
    }else{
      $aulaL1 = '';
      $aulaL2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaL1.$aulaL2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MARTES' && $value->horario_inicio == '08:20:00' && $value->horario_final == '09:10:00'){
      $aulaMa1 = $value->semestre.$value->grupo;
      $aulaMa2 = '';break;        
    }else{
      $aulaMa1 = '';
      $aulaMa2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaMa1.$aulaMa2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MIERCOLES' && $value->horario_inicio == '08:20:00' && $value->horario_final == '09:10:00'){
      $aulaMi1 = $value->semestre.$value->grupo;
      $aulaMi2 = '';break;        
    }else{
      $aulaMi1 = '';
      $aulaMi2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaMi1.$aulaMi2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'JUEVES' && $value->horario_inicio == '08:20:00' && $value->horario_final == '09:10:00'){
      $aulaJu1 = $value->semestre.$value->grupo;
      $aulaJu2 = '';break;       
    }else{
      $aulaJu1 = '';
      $aulaJu2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaJu1.$aulaJu2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'VIERNES' && $value->horario_inicio == '08:20:00' && $value->horario_final == '09:10:00'){
      $aulaVi1 = $value->semestre.$value->grupo;
      $aulaVi2 = '';break;       
    }else{
      $aulaVi1 = '';
      $aulaVi2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaVi1.$aulaVi2),1,'C','C');
  $this->pdf->SetXY(-287,-143);
  $this->pdf->Cell(25,9,'',1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'LUNES' && $value->horario_inicio == '08:20:00' && $value->horario_final == '09:10:00'){
      $materiaL1 = $value->NombreMateria;
      $materiaL2 = '';break;       
    }else{
      $materiaL1 = '';
      $materiaL2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaL1.$materiaL2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MARTES' && $value->horario_inicio == '08:20:00' && $value->horario_final == '09:10:00'){
      $materiaMa1 = $value->NombreMateria;
      $materiaMa2 = '';break;       
    }else{
      $materiaMa1 = '';
      $materiaMa2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaMa1.$materiaMa2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MIERCOLES' && $value->horario_inicio == '08:20:00' && $value->horario_final == '09:10:00'){
      $materiaMi1 = $value->NombreMateria;
      $materiaMi2 = '';break;       
    }else{
      $materiaMi1 = '';
      $materiaMi2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaMi1.$materiaMi2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'JUEVES' && $value->horario_inicio == '08:20:00' && $value->horario_final == '09:10:00'){
      $materiaJu1 = $value->NombreMateria;
      $materiaJu2 = '';break;       
    }else{
      $materiaJu1 = '';
      $materiaJu2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaJu1.$materiaJu2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'VIERNES' && $value->horario_inicio == '08:20:00' && $value->horario_final == '09:10:00'){
      $materiaVi1 = $value->NombreMateria;
      $materiaVi2 = '';break;       
    }else{
      $materiaVi1 = '';
      $materiaVi2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaVi1.$materiaVi2),1,'C','C');
  $this->pdf->SetXY(-537.5,-144.5);
  $this->pdf->Cell(0,9,'8:20',0,0,'C');
  $this->pdf->SetXY(-537.5,-141);
  $this->pdf->Cell(0,9,'9:10',0,0,'C');
  $this->pdf->SetXY(-287,-134);
  $this->pdf->Cell(25,5,'AULA',1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'LUNES' && $value->horario_inicio == '09:10:00' && $value->horario_final == '10:00:00'){
      $aulaL1 = $value->semestre.$value->grupo;
      $aulaL2 = '';break;        
    }else{
      $aulaL1 = '';
      $aulaL2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaL1.$aulaL2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MARTES' && $value->horario_inicio == '09:10:00' && $value->horario_final == '10:00:00'){
      $aulaMa1 = $value->semestre.$value->grupo;
      $aulaMa2 = '';break;        
    }else{
      $aulaMa1 = '';
      $aulaMa2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaMa1.$aulaMa2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MIERCOLES' && $value->horario_inicio == '09:10:00' && $value->horario_final == '10:00:00'){
      $aulaMi1 = $value->semestre.$value->grupo;
      $aulaMi2 = '';break;        
    }else{
      $aulaMi1 = '';
      $aulaMi2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaMi1.$aulaMi2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'JUEVES' && $value->horario_inicio == '09:10:00' && $value->horario_final == '10:00:00'){
      $aulaJu1 = $value->semestre.$value->grupo;
      $aulaJu2 = '';break;       
    }else{
      $aulaJu1 = '';
      $aulaJu2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaJu1.$aulaJu2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'VIERNES' && $value->horario_inicio == '09:10:00' && $value->horario_final == '10:00:00'){
      $aulaVi1 = $value->semestre.$value->grupo;
      $aulaVi2 = '';break;       
    }else{
      $aulaVi1 = '';
      $aulaVi2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaVi1.$aulaVi2),1,'C','C');
  $this->pdf->SetXY(-287,-129);
  $this->pdf->Cell(25,9,'',1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'LUNES' && $value->horario_inicio == '09:10:00' && $value->horario_final == '10:00:00'){
      $materiaL1 = $value->NombreMateria;
      $materiaL2 = '';break;       
    }else{
      $materiaL1 = '';
      $materiaL2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaL1.$materiaL2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MARTES' && $value->horario_inicio == '09:10:00' && $value->horario_final == '10:00:00'){
      $materiaMa1 = $value->NombreMateria;
      $materiaMa2 = '';break;       
    }else{
      $materiaMa1 = '';
      $materiaMa2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaMa1.$materiaMa2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MIERCOLES' && $value->horario_inicio == '09:10:00' && $value->horario_final == '10:00:00'){
      $materiaMi1 = $value->NombreMateria;
      $materiaMi2 = '';break;       
    }else{
      $materiaMi1 = '';
      $materiaMi2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaMi1.$materiaMi2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'JUEVES' && $value->horario_inicio == '09:10:00' && $value->horario_final == '10:00:00'){
      $materiaJu1 = $value->NombreMateria;
      $materiaJu2 = '';break;       
    }else{
      $materiaJu1 = '';
      $materiaJu2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaJu1.$materiaJu2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'VIERNES' && $value->horario_inicio == '09:10:00' && $value->horario_final == '10:00:00'){
      $materiaVi1 = $value->NombreMateria;
      $materiaVi2 = '';break;       
    }else{
      $materiaVi1 = '';
      $materiaVi2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaVi1.$materiaVi2),1,'C','C');
  $this->pdf->SetXY(-537.5,-130.5);
  $this->pdf->Cell(0,9,'9:10',0,0,'C');
  $this->pdf->SetXY(-537.5,-127);
  $this->pdf->Cell(0,9,'10:00',0,0,'C');
  $this->pdf->SetXY(-287,-120);
  $this->pdf->Cell(25,5,'AULA',1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'LUNES' && $value->horario_inicio == '10:30:00' && $value->horario_final == '11:20:00'){
      $aulaL1 = $value->semestre.$value->grupo;
      $aulaL2 = '';break;        
    }else{
      $aulaL1 = '';
      $aulaL2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaL1.$aulaL2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MARTES' && $value->horario_inicio == '10:30:00' && $value->horario_final == '11:20:00'){
      $aulaMa1 = $value->semestre.$value->grupo;
      $aulaMa2 = '';break;        
    }else{
      $aulaMa1 = '';
      $aulaMa2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaMa1.$aulaMa2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MIERCOLES' && $value->horario_inicio == '10:30:00' && $value->horario_final == '11:20:00'){
      $aulaMi1 = $value->semestre.$value->grupo;
      $aulaMi2 = '';break;        
    }else{
      $aulaMi1 = '';
      $aulaMi2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaMi1.$aulaMi2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'JUEVES' && $value->horario_inicio == '10:30:00' && $value->horario_final == '11:20:00'){
      $aulaJu1 = $value->semestre.$value->grupo;
      $aulaJu2 = '';break;       
    }else{
      $aulaJu1 = '';
      $aulaJu2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaJu1.$aulaJu2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'VIERNES' && $value->horario_inicio == '10:30:00' && $value->horario_final == '11:20:00'){
      $aulaVi1 = $value->semestre.$value->grupo;
      $aulaVi2 = '';break;       
    }else{
      $aulaVi1 = '';
      $aulaVi2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaVi1.$aulaVi2),1,'C','C');
  $this->pdf->SetXY(-287,-115);
  $this->pdf->Cell(25,9,'',1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'LUNES' && $value->horario_inicio == '10:30:00' && $value->horario_final == '11:20:00'){
      $materiaL1 = $value->NombreMateria;
      $materiaL2 = '';break;       
    }else{
      $materiaL1 = '';
      $materiaL2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaL1.$materiaL2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MARTES' && $value->horario_inicio == '10:30:00' && $value->horario_final == '11:20:00'){
      $materiaMa1 = $value->NombreMateria;
      $materiaMa2 = '';break;       
    }else{
      $materiaMa1 = '';
      $materiaMa2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaMa1.$materiaMa2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MIERCOLES' && $value->horario_inicio == '10:30:00' && $value->horario_final == '11:20:00'){
      $materiaMi1 = $value->NombreMateria;
      $materiaMi2 = '';break;       
    }else{
      $materiaMi1 = '';
      $materiaMi2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaMi1.$materiaMi2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'JUEVES' && $value->horario_inicio == '10:30:00' && $value->horario_final == '11:20:00'){
      $materiaJu1 = $value->NombreMateria;
      $materiaJu2 = '';break;       
    }else{
      $materiaJu1 = '';
      $materiaJu2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaJu1.$materiaJu2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'VIERNES' && $value->horario_inicio == '10:30:00' && $value->horario_final == '11:20:00'){
      $materiaVi1 = $value->NombreMateria;
      $materiaVi2 = '';break;       
    }else{
      $materiaVi1 = '';
      $materiaVi2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaVi1.$materiaVi2),1,'C','C');
  $this->pdf->SetXY(-537.5,-116.5);
  $this->pdf->Cell(0,9,'10:30',0,0,'C');
  $this->pdf->SetXY(-537.5,-113);
  $this->pdf->Cell(0,9,'11:20',0,0,'C');
  $this->pdf->SetXY(-287,-106);
  $this->pdf->Cell(25,5,'AULA',1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'LUNES' && $value->horario_inicio == '11:20:00' && $value->horario_final == '12:10:00'){
      $aulaL1 = $value->semestre.$value->grupo;
      $aulaL2 = '';break;        
    }else{
      $aulaL1 = '';
      $aulaL2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaL1.$aulaL2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MARTES' && $value->horario_inicio == '11:20:00' && $value->horario_final == '12:10:00'){
      $aulaMa1 = $value->semestre.$value->grupo;
      $aulaMa2 = '';break;        
    }else{
      $aulaMa1 = '';
      $aulaMa2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaMa1.$aulaMa2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MIERCOLES' && $value->horario_inicio == '11:20:00' && $value->horario_final == '12:10:00'){
      $aulaMi1 = $value->semestre.$value->grupo;
      $aulaMi2 = '';break;        
    }else{
      $aulaMi1 = '';
      $aulaMi2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaMi1.$aulaMi2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'JUEVES' && $value->horario_inicio == '11:20:00' && $value->horario_final == '12:10:00'){
      $aulaJu1 = $value->semestre.$value->grupo;
      $aulaJu2 = '';break;       
    }else{
      $aulaJu1 = '';
      $aulaJu2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaJu1.$aulaJu2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'VIERNES' && $value->horario_inicio == '11:20:00' && $value->horario_final == '12:10:00'){
      $aulaVi1 = $value->semestre.$value->grupo;
      $aulaVi2 = '';break;       
    }else{
      $aulaVi1 = '';
      $aulaVi2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaVi1.$aulaVi2),1,'C','C');
  $this->pdf->SetXY(-287,-101);
  $this->pdf->Cell(25,9,'',1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'LUNES' && $value->horario_inicio == '11:20:00' && $value->horario_final == '12:10:00'){
      $materiaL1 = $value->NombreMateria;
      $materiaL2 = '';break;       
    }else{
      $materiaL1 = '';
      $materiaL2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaL1.$materiaL2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MARTES' && $value->horario_inicio == '11:20:00' && $value->horario_final == '12:10:00'){
      $materiaMa1 = $value->NombreMateria;
      $materiaMa2 = '';break;       
    }else{
      $materiaMa1 = '';
      $materiaMa2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaMa1.$materiaMa2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MIERCOLES' && $value->horario_inicio == '11:20:00' && $value->horario_final == '12:10:00'){
      $materiaMi1 = $value->NombreMateria;
      $materiaMi2 = '';break;       
    }else{
      $materiaMi1 = '';
      $materiaMi2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaMi1.$materiaMi2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'JUEVES' && $value->horario_inicio == '11:20:00' && $value->horario_final == '12:10:00'){
      $materiaJu1 = $value->NombreMateria;
      $materiaJu2 = '';break;       
    }else{
      $materiaJu1 = '';
      $materiaJu2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaJu1.$materiaJu2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'VIERNES' && $value->horario_inicio == '11:20:00' && $value->horario_final == '12:10:00'){
      $materiaVi1 = $value->NombreMateria;
      $materiaVi2 = '';break;       
    }else{
      $materiaVi1 = '';
      $materiaVi2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaVi1.$materiaVi2),1,'C','C');
  $this->pdf->SetXY(-537.5,-102.5);
  $this->pdf->Cell(0,9,'11:20',0,0,'C');
  $this->pdf->SetXY(-537.5,-99);
  $this->pdf->Cell(0,9,'12:10',0,0,'C');
  $this->pdf->SetXY(-287,-92);
  $this->pdf->Cell(25,5,'AULA',1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'LUNES' && $value->horario_inicio == '12:10:00' && $value->horario_final == '01:00:00'){
      $aulaL1 = $value->semestre.$value->grupo;
      $aulaL2 = '';break;        
    }else{
      $aulaL1 = '';
      $aulaL2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaL1.$aulaL2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MARTES' && $value->horario_inicio == '12:10:00' && $value->horario_final == '01:00:00'){
      $aulaMa1 = $value->semestre.$value->grupo;
      $aulaMa2 = '';break;        
    }else{
      $aulaMa1 = '';
      $aulaMa2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaMa1.$aulaMa2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MIERCOLES' && $value->horario_inicio == '12:10:00' && $value->horario_final == '01:00:00'){
      $aulaMi1 = $value->semestre.$value->grupo;
      $aulaMi2 = '';break;        
    }else{
      $aulaMi1 = '';
      $aulaMi2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaMi1.$aulaMi2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'JUEVES' && $value->horario_inicio == '12:10:00' && $value->horario_final == '01:00:00'){
      $aulaJu1 = $value->semestre.$value->grupo;
      $aulaJu2 = '';break;       
    }else{
      $aulaJu1 = '';
      $aulaJu2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaJu1.$aulaJu2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'VIERNES' && $value->horario_inicio == '12:10:00' && $value->horario_final == '01:00:00'){
      $aulaVi1 = $value->semestre.$value->grupo;
      $aulaVi2 = '';break;       
    }else{
      $aulaVi1 = '';
      $aulaVi2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaVi1.$aulaVi2),1,'C','C');
  $this->pdf->SetXY(-287,-87);
  $this->pdf->Cell(25,9,'',1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'LUNES' && $value->horario_inicio == '12:10:00' && $value->horario_final == '01:00:00'){
      $materiaL1 = $value->NombreMateria;
      $materiaL2 = '';break;       
    }else{
      $materiaL1 = '';
      $materiaL2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaL1.$materiaL2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MARTES' && $value->horario_inicio == '12:10:00' && $value->horario_final == '01:00:00'){
      $materiaMa1 = $value->NombreMateria;
      $materiaMa2 = '';break;       
    }else{
      $materiaMa1 = '';
      $materiaMa2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaMa1.$materiaMa2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MIERCOLES' && $value->horario_inicio == '12:10:00' && $value->horario_final == '01:00:00'){
      $materiaMi1 = $value->NombreMateria;
      $materiaMi2 = '';break;       
    }else{
      $materiaMi1 = '';
      $materiaMi2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaMi1.$materiaMi2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'JUEVES' && $value->horario_inicio == '12:10:00' && $value->horario_final == '01:00:00'){
      $materiaJu1 = $value->NombreMateria;
      $materiaJu2 = '';break;       
    }else{
      $materiaJu1 = '';
      $materiaJu2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaJu1.$materiaJu2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'VIERNES' && $value->horario_inicio == '12:10:00' && $value->horario_final == '01:00:00'){
      $materiaVi1 = $value->NombreMateria;
      $materiaVi2 = '';break;       
    }else{
      $materiaVi1 = '';
      $materiaVi2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaVi1.$materiaVi2),1,'C','C');
  $this->pdf->SetXY(-537.5,-88.5);
  $this->pdf->Cell(0,9,'12:10',0,0,'C');
  $this->pdf->SetXY(-537.5,-85);
  $this->pdf->Cell(0,9,'13:00',0,0,'C');
  $this->pdf->SetXY(-287,-78);
  $this->pdf->Cell(25,5,'AULA',1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'LUNES' && $value->horario_inicio == '01:00:00' && $value->horario_final == '01:50:00'){
      $aulaL1 = $value->semestre.$value->grupo;
      $aulaL2 = '';break;        
    }else{
      $aulaL1 = '';
      $aulaL2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaL1.$aulaL2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MARTES' && $value->horario_inicio == '01:00:00' && $value->horario_final == '01:50:00'){
      $aulaMa1 = $value->semestre.$value->grupo;
      $aulaMa2 = '';break;        
    }else{
      $aulaMa1 = '';
      $aulaMa2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaMa1.$aulaMa2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MIERCOLES' && $value->horario_inicio == '01:00:00' && $value->horario_final == '01:50:00'){
      $aulaMi1 = $value->semestre.$value->grupo;
      $aulaMi2 = '';break;        
    }else{
      $aulaMi1 = '';
      $aulaMi2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaMi1.$aulaMi2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'JUEVES' && $value->horario_inicio == '01:00:00' && $value->horario_final == '01:50:00'){
      $aulaJu1 = $value->semestre.$value->grupo;
      $aulaJu2 = '';break;       
    }else{
      $aulaJu1 = '';
      $aulaJu2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaJu1.$aulaJu2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'VIERNES' && $value->horario_inicio == '01:00:00' && $value->horario_final == '01:50:00'){
      $aulaVi1 = $value->semestre.$value->grupo;
      $aulaVi2 = '';break;       
    }else{
      $aulaVi1 = '';
      $aulaVi2 = '';
    }
  }
  $this->pdf->Cell(50,5,utf8_decode($aulaVi1.$aulaVi2),1,'C','C');
  $this->pdf->SetXY(-287,-73);
  $this->pdf->Cell(25,9,'',1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'LUNES' && $value->horario_inicio == '01:00:00' && $value->horario_final == '01:50:00'){
      $materiaL1 = $value->NombreMateria;
      $materiaL2 = '';break;       
    }else{
      $materiaL1 = '';
      $materiaL2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaL1.$materiaL2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MARTES' && $value->horario_inicio == '01:00:00' && $value->horario_final == '01:50:00'){
      $materiaMa1 = $value->NombreMateria;
      $materiaMa2 = '';break;       
    }else{
      $materiaMa1 = '';
      $materiaMa2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaMa1.$materiaMa2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'MIERCOLES' && $value->horario_inicio == '01:00:00' && $value->horario_final == '01:50:00'){
      $materiaMi1 = $value->NombreMateria;
      $materiaMi2 = '';break;       
    }else{
      $materiaMi1 = '';
      $materiaMi2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaMi1.$materiaMi2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'JUEVES' && $value->horario_inicio == '01:00:00' && $value->horario_final == '01:50:00'){
      $materiaJu1 = $value->NombreMateria;
      $materiaJu2 = '';break;       
    }else{
      $materiaJu1 = '';
      $materiaJu2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaJu1.$materiaJu2),1,'C','C');
  foreach ($horario_pdf as $value) {
    if($value->dia == 'VIERNES' && $value->horario_inicio == '01:00:00' && $value->horario_final == '01:50:00'){
      $materiaVi1 = $value->NombreMateria;
      $materiaVi2 = '';break;       
    }else{
      $materiaVi1 = '';
      $materiaVi2 = '';
    }
  }
  $this->pdf->Cell(50,9,utf8_decode($materiaVi1.$materiaVi2),1,'C','C');
  $this->pdf->SetXY(-537.5,-74.5);
  $this->pdf->Cell(0,9,'13:00',0,0,'C');
  $this->pdf->SetXY(-537.5,-71);
  $this->pdf->Cell(0,9,'13:50',0,0,'C');
  $this->pdf->Ln(10);
  $this->pdf->SetFont('Arial','B',7);
  $this->pdf->Cell(75,5,'HORAS NOMBRAMIENTO',1,'C','C');
  $this->pdf->Cell(25,5,'20',1,'C','C');
  $this->pdf->Ln(5);
  $this->pdf->Cell(75,8,'HORAS REGLAMENTARIAS',1,'C','C');
  $this->pdf->Cell(25,8,'20',1,'C','C');
  $this->pdf->Ln(8);
  $this->pdf->Cell(75,8,'HORAS FRENTE A GRUPO',1,'C','C');
  $this->pdf->Cell(25,8,'20',1,'C','C');
  $this->pdf->Ln(8);
  $this->pdf->Cell(75,8,'HORAS DE FORTALECIMIENTO',1,'C','C');
  $this->pdf->Cell(25,8,'0',1,'C','C');
  $this->pdf->Ln(8);
  $this->pdf->Cell(75,5,'TOTAL',1,'C','R');
  $this->pdf->Cell(25,5,'20',1,'C','C');
  $this->pdf->SetXY(-167.5,-61);
  $this->pdf->Cell(20,5,'GRUPO',1,'C','C');
  $this->pdf->Cell(116,5,'MATERIAS',1,'C','C');
  $this->pdf->Cell(20,5,'HORAS',1,'C','C');
  $this->pdf->SetXY(-167.5,-56);
  $this->pdf->Cell(20,8,utf8_decode('3° A'),1,'C','C');
  $this->pdf->MultiCell(116,4,'REALIZAR MANTENIMIENTO PREVENTIVO Y CORRECTIVO AL MOTOR DE GASOLINA Y DE DIESEL',1,'L');
  $this->pdf->SetXY(-31.5,-56);
  $this->pdf->Cell(20,8,'8',1,'C','C');
  $this->pdf->SetXY(-167.5,-48);
  $this->pdf->Cell(20,8,utf8_decode('3° F'),1,'C','C');
  $this->pdf->MultiCell(116,4,utf8_decode('ELABORAR MANTENIMIENTO PREVENTIVO Y CORRECTIVO A LA CALEFACCIÓN Y AIRE ACONDICIONADO DEL AUTOMÓVIL'),1,'L');
  $this->pdf->SetXY(-31.5,-48);
  $this->pdf->Cell(20,8,'4',1,'C','C');
  $this->pdf->SetXY(-167.5,-40);
  $this->pdf->Cell(20,8,utf8_decode('3° F'),1,'C','C');
  $this->pdf->MultiCell(116,4,utf8_decode('REALIZA MANTENIMIENTO PREVENTIVO Y CORRECTIVO AL MOTOR DE GASOLINA Y DE DIESEL'),1,'L');
  $this->pdf->SetXY(-31.5,-40);
  $this->pdf->Cell(20,8,'8',1,'C','C');
    /*
     * Se manda el pdf al navegador
     *
     * $this->pdf->Output(nombredelarchivo, destino);
     *
     * I = Muestra el pdf en el navegador
     * D = Envia el pdf para descarga
     *
     */
    $this->pdf->Output("Lista_de_aulas.pdf", 'I');
 }
}

?>