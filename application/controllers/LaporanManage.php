<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH."helpers/IdGenerator.php";

use helper\IdGenerator;

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
	

	
	
}