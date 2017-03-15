<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/fpdf/fpdf.php";
 
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Pdf extends FPDF {

        public function __construct() {
            parent::__construct('L','mm','A4');
        } 
        // El encabezado del PDF
        public function Header(){
            $cetis = utf8_decode('Secretaría de Educación Pública');
            $cetis2 = utf8_decode('Subsecretaría de Educación Media Superior');
            $cetis3 = utf8_decode('Dirección General de Educación Tecnológica Industrial');
            $cetis4 = utf8_decode('Oficinas Auxiliares de la DGETI en el Estado de Colima');
            $cetis5 = utf8_decode('CETIs No. 157 "Leona Vicario Fernández de San Salvador"');
            $this->Image('Image/SEP.png',10,8,72);
            $this->SetFont('Arial','B',9);
            $this->Cell(20);
            $this->Cell(460,0,$cetis,0,0,'C');
            $this->Ln('4');
            $this->Cell(483,0,$cetis2,0,0,'C');
            $this->Ln('4');
            $this->Cell(466,0,$cetis3,0,0,'C');
            $this->Ln('4');
            $this->SetFont('Arial','',9);
            $this->Cell(471,0,$cetis4,0,0,'C');
            $this->Ln('4');
            $this->Cell(465,0,$cetis5,0,0,'C');
            $this->Ln(5);
       }
       // El pie del pdf
       public function Footer(){
           $this->SetY(-15);
           $this->SetX(-530);
           $this->SetFont('Times','',7.5);
           $this->Cell(0,10,'',0,0,'C');
           //$this->Ln('1');
           $this->SetY(-10);
           $this->SetX(-530);
           $this->Cell(0,10,'DOCENTE',0,0,'C');
           $this->SetY(-15);
           $this->SetX(-417);
           $this->Cell(0,10,utf8_decode('LIC. MARTÍN ALONSO ARMENTA ACOSTA'),0,0,'C');
           $this->SetY(-10);
           $this->SetX(-417);
           $this->Cell(0,10,utf8_decode('JEFE DE SERVICIOS DOCENTES'),0,0,'C');
           $this->SetY(-15);
           $this->SetX(-295);
           $this->Cell(0,10,utf8_decode('MC. CÉSAR OCTAVIO MORENO ZUÑIGA'),0,0,'C');
           $this->SetY(-10);
           $this->SetX(-295);
           $this->Cell(0,10,utf8_decode('DIRECTOR DEL PLANTEL'),0,0,'C');
           $this->SetY(-15);
           $this->SetX(-180);
           $this->Cell(0,10,utf8_decode('LICDA. ALICIA MONRROY AYALA'),0,0,'C');
           $this->SetY(-10);
           $this->SetX(-180);
           $this->Cell(0,10,utf8_decode('SUBDIRECTORA ACADÉMICA'),0,0,'C');
           $this->SetY(-15);
           $this->SetX(-65);
           $this->Cell(0,10,utf8_decode('ING. JOSÉ ROMÁN ALCARAZ OROZCO'),0,0,'C');
           $this->SetY(-10);
           $this->SetX(-65);
           $this->Cell(0,10,utf8_decode('SUBDIRECTOR DE ADMINISTRACIÓN'),0,0,'C');
      }
    }
?>