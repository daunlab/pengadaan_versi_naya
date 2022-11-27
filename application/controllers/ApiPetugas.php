<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH."helpers/IdGenerator.php";

use helper\IdGenerator;

class ApiPetugas extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		$this->load->model('m_petugas');
	}

	public function get($id)
	{
		$result = $this->m_petugas->ambil_data_satu($id)->result(); 
		echo json_encode($result);
	}

	
}