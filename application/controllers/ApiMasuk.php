<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH."helpers/IdGenerator.php";

use helper\IdGenerator;

class ApiMasuk extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		$this->load->model('m_barang');
		$this->load->model('m_masuk');
		$this->load->model('m_keluar');
	}

	public function getdetail($id)
	{
		$result = $this->m_masuk->ambil_data_detail($id)->result(); 
		// echo $this->m_masuk->ambil_data_detail($id);
		echo json_encode($result);
	}

	
}