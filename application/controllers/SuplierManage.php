<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH."helpers/IdGenerator.php";

use helper\IdGenerator;

class SuplierManage extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		$this->load->model('m_suplier');
	}

	public function index()
	{
		$data['suplier'] = $this->m_suplier->ambil_data()->result(); 
		$this->load->view('suplier/suplier', $data);
	}

	public function goadd(){
		$information['uniqueid'] = IdGenerator::generateId(true);
		$this->load->view('suplier/suplier_add', $information);
	}
	
	public function doadd(){
		$var = $this->input->post();
		
		$id = $var["id"];
		$nama = $var["nama"];
		$nama_perusahaan = $var["nama_perusahaan"];
		$alamat= $var["alamat"];
		$kontak= $var["kontak"];
		
		$data = array(
			'id' => $id,
			'nama' => $nama,
			'nama_perusahaan' => $nama_perusahaan,
			'alamat' => $alamat,
			'kontak' => $kontak,
		);
		
		$status = $this->m_suplier->input_data($data);
		
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
		$data['suplier'] = $this->m_suplier->ambil_data_satu($id)->row(); 
		$this->load->view('suplier/suplier_edit', $data);
	}
	
	public function doedit($id) {
	
		$var = $this->input->post();
		
		$id = $variable["id"];
    $nama = $var["nama"];
		$nama_perusahaan = $var["nama_perusahaan"];
		$alamat= $var["alamat"];
		$kontak= $var["kontak"];
		
		$data = array(
			'nama' => $nama,
			'nama_perusahaan' => $nama_perusahaan,
			'alamat' => $alamat,
			'kontak' => $kontak,
		);
			
		$status = $this->m_suplier->update_data($id,$data);
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:'.base_url('/index.php/suplier/'.$id.'/edit'));
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}
		
	}
	public function doremove($id){
		
		$variable = $this->input->post();
		$id = $variable["id"];
		
		$status = $this->m_suplier->delete_data($id);
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:'.base_url('/index.php/suplier'));
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}
		
	}
	

	
	
}