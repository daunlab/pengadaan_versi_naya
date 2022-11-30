<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH."helpers/IdGenerator.php";
include_once BASEPATH."helpers/fpdf.php";

use helper\IdGenerator;

class PDF extends FPDF
{

  public $title;

  // Page header
  function Header()
  {
      // Logo
      $this->Image(__DIR__.'/../../logo.png',10,6,30);
      // Arial bold 15
      $this->SetFont('Arial','B',15);
      // Move to the right
      $this->Cell(50);
      // Title
      $this->Cell(100,10,'Laporan '.$this->title,1,0,'C');
      // Line break
      $this->Ln(20);
  }
  
  // Page footer
  function Footer()
  {
      // Position at 1.5 cm from bottom
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial','I',8);
      // Page number
      $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
  
    // Load data
  function LoadData($file)
  {
      // Read file lines
      $lines = file($file);
      $data = array();
      foreach($lines as $line)
          $data[] = explode(';',trim($line));
      return $data;
  }
  
  // Simple table
  function BasicTable($header, $data)
  {
      // Header
      foreach($header as $col)
          $this->Cell(40,7,$col,1);
      $this->Ln();
      // Data
      foreach($data as $row)
      {
          foreach($row as $col)
              $this->Cell(40,6,$col,1);
          $this->Ln();
      }
  }
  
  // Better table
  function ImprovedTable($header, $data)
  {
      // Column widths
      $w = array(30, 35, 20, 15, 35, 20);
      // Header
      // var_dump($header[4]);
      for($i=0;$i<count($header);$i++){
          $this->Cell($w[$i],7,$header[$i],1,0,'C');
      }
      $this->Ln();
      // Data
      foreach($data as $row)
      {
          $this->Cell($w[0],6,$row[0],'LR');
          $this->Cell($w[1],6,$row[1],'LR');
          $this->Cell($w[2],6,$row[2],'LR',0,'R');
          $this->Cell($w[3],6,$row[3],'LR',0,'R');
          $this->Cell($w[4],6,$row[4],'LR',0,'R');
          $this->Cell($w[5],6,$row[5],'LR',0,'R');
          $this->Ln();
      }
      // Closing line
      $this->Cell(array_sum($w),0,'','T');
  }
  
  // Colored table
  function FancyTable($header, $data)
  {
      // Colors, line width and bold font
      $this->SetFillColor(255,0,0);
      $this->SetTextColor(255);
      $this->SetDrawColor(128,0,0);
      $this->SetLineWidth(.3);
      $this->SetFont('','B');
      // Header
      $w = array(30, 35, 20, 15, 35, 20);
      for($i=0;$i<count($header);$i++)
          $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
      $this->Ln();
      // Color and font restoration
      $this->SetFillColor(224,235,255);
      $this->SetTextColor(0);
      $this->SetFont('');
      // Data
      $fill = false;
      foreach($data as $row)
      {
          $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
          $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
          $this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
          $this->Cell($w[3],6,$row[3],'LR',0,'R',$fill);
          $this->Cell($w[4],6,$row[4],'LR',0,'R',$fill);
          $this->Cell($w[5],6,$row[5],'LR',0,'R',$fill);
          $this->Ln();
          $fill = !$fill;
      }
      // Closing line
      $this->Cell(array_sum($w),0,'','T');
  }
}

class LaporanManage extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		$this->load->model('m_barang');
		$this->load->model('m_masuk');
		$this->load->model('m_keluar');
	}

	public function index()
	{
		// $data['barang'] = $this->m_barang->ambil_data()->result(); 
		// $this->load->view('laporan/laporan', $data);
		$this->load->view('laporan/laporan');
	}
	
	function generateFileForTable($filename = "files.txt", $keys= array(), $data = array() ){
	
    $myfile = fopen("files/generated/".$filename, "w") or die("Unable to open file!");
    
    $txt = "";
    foreach ($data as $key => $value) {
      $txt = "";
      $first = true;
      foreach ($keys as $k => $v) {
        # code...
        $divider = ";";
        if($first) {
          $divider= "";
          $first = false;
        }
        $txt.= "$divider".$value[$v]."";
      }
      $txt.="\n";
      fwrite($myfile, $txt);
    }
    
    fclose($myfile);
    
  }
	
	public function doCetakBarang(){
    
    $tableFilesBarang = "list_barang_for_pdf.txt";
    
    /**
     * Generate File For Table
     */
    $barang = $this->m_barang->ambil_data()->result(); 
    $tableHeader = array_keys(get_object_vars($barang[0]));
    
    $barang_json = json_decode(json_encode($barang), true);
    
    $this->generateFileForTable($tableFilesBarang, $tableHeader, $barang_json);
    
    

    /**
     * show file pdf
     */
    $pdf = new PDF();
    $pdf->title = "Barang";
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);
    $pdf->Cell(0,10,'Daftar Barang ',0,2);
    // for($i=1;$i<=40;$i++)
    //     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
    
    // $tableHeader = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)', "some");
    // Data loading
    $data = $pdf->LoadData(__DIR__.'/../../files/generated/'.$tableFilesBarang);

    // $pdf->AddPage();
    $pdf->FancyTable($tableHeader,$data);
    $pdf->Output();
	}
	
	public function doCetakBarang2(){
        global $JENISBARANG;
        $data['barang'] = $this->m_barang->ambil_data()->result(); 
        $data['jenisbarang'] = $JENISBARANG; 
        $this->load->view('laporan/cetakhtml', $data);
	}
	

    public function doCetakMasuk(){
    
        $tableFilesMasuk = "list_masuk_for_pdf.txt";
        
        /**
         * Generate File For Table
         */
        $masuk = $this->m_masuk->ambil_data()->result(); 
        $tableHeader = array_keys(get_object_vars($masuk[0]));
        
        $masuk_json = json_decode(json_encode($masuk), true);
        
        $this->generateFileForTable($tableFilesMasuk, $tableHeader, $masuk_json);
        
    
        /**
         * show file pdf
         */
        $pdf = new PDF();
        $pdf->title = "Masuk";
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);
        $pdf->Cell(0,10,'Daftar Barang Masuk ',0,1);
        // for($i=1;$i<=40;$i++)
        //     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
        
        // $tableHeader = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)', "some");
        // Data loading
        $data = $pdf->LoadData(__DIR__.'/../../files/generated/'.$tableFilesMasuk);
    
        // $pdf->AddPage();
        $pdf->FancyTable($tableHeader,$data);
        $pdf->Output();
        }
        
}