<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH."helpers/IdGenerator.php";

use helper\IdGenerator;

class ApiMasuk extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		$this->load->model('m_masuk');
	}

	public function getdetail($id)
	{
		$result = $this->m_masuk->ambil_data_detail($id)->result(); 
		echo json_encode($result);
	}

	
}