<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/fpdf/fpdf.php";
 
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class PdfM extends FPDF {
        public function __construct() {
            parent::__construct('L','mm','A4');
        }
        // El encabezado del PDF
        public function Header(){
            $cetis = utf8_decode('Centro de Estudios Tecnológicos, Industriales y de Servicios');
            $info = utf8_decode('INFORMACIÓN GENERAL DE MAESTROS');
            $this->Image('Image/logo-cetis157.png',60,8,22);
            $this->SetFont('Arial','B',13);
            $this->Cell(30);
            $this->Cell(230,10,$cetis,0,0,'C');
            $this->Ln('5');
            $this->SetFont('Arial','B',8);
            $this->Cell(30);
            $this->Cell(225,10,$info,0,0,'C');
            $this->Ln(20);
       }
       // El pie del pdf
       public function Footer(){
           $this->SetY(-15);
           $this->SetFont('Arial','I',8);
           $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
      }
    }
?>