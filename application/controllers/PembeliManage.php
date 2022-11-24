<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH."helpers/IdGenerator.php";

use helper\IdGenerator;

class PembeliManage extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		global $JENISKELAMIN;
		$this->JENISKELAMIN = $JENISKELAMIN;
		$this->load->model('m_pembeli');
	}

	public function index()
	{
	  $data['jeniskelamin'] = $this->JENISKELAMIN;
		$data['pembeli'] = $this->m_pembeli->ambil_data()->result(); 
		$this->load->view('pembeli/pembeli', $data);
	}

	public function goadd(){
	  $information['jeniskelamin'] = $this->JENISKELAMIN;
		$information['uniqueid'] = IdGenerator::generateId(true);
		$this->load->view('pembeli/pembeli_add', $information);
	}
	
	public function doadd(){
		$var = $this->input->post();
		
		$id = $var["id"];
		$nama = $var["nama"];
		$gender = $var["gender"];
		$alamat= $var["alamat"];
		$kontak= $var["kontak"];
		
		$data = array(
			'id' => $id,
			'nama' => $nama,
			'gender' => $gender,
			'alamat' => $alamat,
			'kontak' => $kontak,
		);
		
		$status = $this->m_pembeli->input_data($data);
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:./');
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}
	}
	
	public function goedit($id){
		$data['jeniskelamin'] = $this->JENISKELAMIN;
		$data['pembeli'] = $this->m_pembeli->ambil_data_satu($id)->row(); 
		$this->load->view('pembeli/pembeli_edit', $data);
	}
	
	public function doedit($id) {
	
		$var = $this->input->post();
		
		$id = $var["id"];
    $nama = $var["nama"];
		$gender = $var["gender"];
		$alamat= $var["alamat"];
		$kontak= $var["kontak"];
		
		$data = array(
			'nama' => $nama,
			'gender' => $gender,
			'alamat' => $alamat,
			'kontak' => $kontak,
		);
			
		$status = $this->m_pembeli->update_data($id, $data);
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:'.base_url('/index.php/pembeli/'.$id.'/edit'));
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}
		
	}
	public function doremove($id){
		
		$variable = $this->input->post();
		$id = $variable["id"];
		
		$status = $this->m_pembeli->delete_data($id);
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:'.base_url('/index.php/pembeli'));
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}
		
	}
	

	
	
}