<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH."helpers/IdGenerator.php";

use helper\IdGenerator;

class BarangManage extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		$this->load->model('m_barang');
		$this->load->model('m_masuk');
		$this->load->model('m_keluar');
	}

	public function index()
	{
		$data['barang'] = $this->m_barang->ambil_data()->result(); 
		$this->load->view('barang/barang', $data);
	}

	public function goadd(){
		global $JENISBARANG;
		$information['uniqueid'] = IdGenerator::generateId(true);
		$information['jenisbarang'] = $JENISBARANG;
		$this->load->view('barang/barang_add', $information);
	}
	
	public function doadd(){
		$var = $this->input->post();
		
		$idbarang = $var["idbarang"];
		$namabarang = $var["namabarang"];
		$jenisbarang = $var["jenisbarang"];
		$harga= $var["harga"];
		$stok= $var["stok"];
		$satuan= $var["satuan"];
		
		$data = array(
			'id' => $idbarang,
			'nama' => $namabarang,
			'jenis' => $jenisbarang,
			'harga' => $harga,
			'stok' => $stok,
			'satuan' => $satuan,
		);
		
		$status = $this->m_barang->input_data($data, 'barang');
		
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
		global $JENISBARANG;
		$data['jenisbarang'] = $JENISBARANG;
		$data['barang'] = $this->m_barang->ambil_data_satu($id)->row(); 
		$this->load->view('barang/barang_edit', $data);
	}
	
	public function doedit($id) {
	
		$variable = $this->input->post();
		$id = $variable["id"];
		$nama = $variable["nama"];
		$harga= $variable["harga"];
		$jenis= $variable["jenis"];
		$stok= $variable["stok"];
		$satuan= $variable["satuan"];
		
		$data = array(
			'nama' => $nama,
			'harga' => $harga,
			'jenis' => $jenis,
			'stok' => $stok,
			'satuan' => $satuan,
		);
		
		$status = $this->m_barang->update_data($id,$data);
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:'.base_url('/index.php/barang/'.$id.'/edit'));
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}
		
	}
	public function doremove($id){
		
		$variable = $this->input->post();
		$id = $variable["id"];
		
		$status = $this->m_barang->delete_data($id);
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:'.base_url('/index.php/barang'));
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}
		
	}
	

	
	
}