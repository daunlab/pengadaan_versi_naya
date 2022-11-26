<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH."helpers/IdGenerator.php";

use helper\IdGenerator;

class TukangManage extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		global $JENISKELAMIN;
		$this->JENISKELAMIN = $JENISKELAMIN;
		$this->load->model('m_petugas');
	}

	public function index()
	{
	  $data['jeniskelamin'] = $this->JENISKELAMIN;
		$data['tukang'] = $this->m_petugas->ambil_data()->result(); 
		$this->load->view('tukang/tukang', $data);
	}

	public function goadd(){
	  $information['jeniskelamin'] = $this->JENISKELAMIN;
		$information['emptystring'] = IdGenerator::generateId(true);
		$this->load->view('tukang/tukang_add', $information);
	}
	
	public function doadd(){
		$var = $this->input->post();
		
		$id = $var["id"];
		$nama = $var["nama"];
		$gender = $var["gender"];
		$alamat= $var["alamat"];
		$no_telp= $var["no_telp"];
		
		$data = array(
			'id' => $id,
			'nama' => $nama,
			'gender' => $gender,
			'alamat' => $alamat,
			'no_telp' => $no_telp,
		);
		
		$status = $this->m_petugas->input_data($data);
		
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
		$data['tukang'] = $this->m_petugas->ambil_data_satu($id)->row(); 
		$this->load->view('tukang/tukang_edit', $data);
	}
	
	public function doedit($id) {
	
		$var = $this->input->post();
		
		$id = $var["id"];
    $nama = $var["nama"];
		$gender = $var["gender"];
		$alamat= $var["alamat"];
		$no_telp= $var["no_telp"];
		
		$data = array(
			'nama' => $nama,
			'gender' => $gender,
			'alamat' => $alamat,
			'no_telp' => $no_telp,
		);
			
		$status = $this->m_petugas->update_data($id, $data);
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:'.base_url('/index.php/tukang/'.$id.'/edit'));
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}
		
	}
	public function doremove($id){
		
		$variable = $this->input->post();
		$id = $variable["id"];
		
		$status = $this->m_petugas->delete_data($id);
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:'.base_url('/index.php/tukang'));
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}
		
	}
	

	
	
}