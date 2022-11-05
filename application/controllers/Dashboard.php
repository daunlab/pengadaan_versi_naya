<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  function __construct(){ 
		parent::__construct(); 
		$this->load->model('m_barang');
	}
	
	public function index()
	{
		// $data['barang'] = $this->m_barang->ambil_data()->result(); 
		$daftar = $this->db->query("SELECT * FROM barang")->result(); 
		var_dump($daftar);
		
		// $this->load->view('dashboard');
	}
	
	
}