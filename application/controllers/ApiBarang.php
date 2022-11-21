<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH."helpers/IdGenerator.php";

use helper\IdGenerator;

class ApiBarang extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		$this->load->model('m_barang');
		$this->load->model('m_masuk');
		$this->load->model('m_keluar');
	}

	public function get($id)
	{
		$result = $this->m_barang->ambil_data_satu($id)->result(); 
		echo json_encode($result);
	}

	
}