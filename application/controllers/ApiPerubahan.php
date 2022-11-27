<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH."helpers/IdGenerator.php";

use helper\IdGenerator;

class ApiPerubahan extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		$this->load->model('m_perubahan');
		$this->load->model('m_perubahan_petugas');
		$this->load->model('m_perubahan_mentah');
		$this->load->model('m_perubahan_jadi');
	}

	public function getinfo($id)
	{
		$result = $this->m_perubahan->ambil_data_satu($id)->result(); 
		echo json_encode($result);
	}
	
	public function getpetugas($id)
	{
		$result = $this->m_perubahan_petugas->ambil_detail_byidperubahan(array('id_perubahan'=>$id))->result(); 
		echo json_encode($result);
	}
	
	public function getmentah($id)
	{
		$result = $this->m_perubahan_mentah->ambil_data_where(array('id_perubahan'=>$id))->result(); 
		echo json_encode($result);
	}
	
	public function getjadi($id)
	{
		$result = $this->m_perubahan_jadi->ambil_data_where(array('id_perubahan'=>$id))->result(); 
		echo json_encode($result);
	}

	
}