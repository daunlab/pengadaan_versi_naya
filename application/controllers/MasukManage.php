<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH."helpers/IdGenerator.php";

use helper\IdGenerator;

class MasukManage extends CI_Controller {

  function __construct(){ 
		parent::__construct(); 
		$this->load->model('m_suplier');
		$this->load->model('m_barang');
		$this->load->model('m_masuk');
	}

	public function index()
	{
		$data['masuk'] = $this->m_masuk->ambil_data()->result(); 
		$this->load->view('masuk/masuk',$data);
	}
	
  public function goadd(){
		global $JENISBARANG;
		$information['suplier'] = $this->m_suplier->ambil_data()->result(); 
		
		
		$information['barang'] = $this->m_barang->ambil_data()->result(); 
		
		var_dump($information);die;
		$information['uniqueid'] = IdGenerator::generateId(true);
		$information['jenisbarang'] = $JENISBARANG;
		$this->load->view('masuk/masuk_add', $information);
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
		$data['masuk'] = $this->m_masuk->ambil_data_satu($id)->row(); 
		$this->load->view('masuk_edit', $data);
	}



  public function tambahdatamasuk() {

		// query insert
        // variabel form tambah barang
		$variable = $this->input->post();
		$id_masuk = $variable["id_masuk"];
		$idbarang = $variable["idbarang"];
		$nama_barang = $variable["nama_barang"];
		$jumlah = $variable["jumlah"];
		$harga= $variable["harga"];
		$tanggal = $variable["tanggal"];
		
		$data = array(
			'id_masuk' => $id_masuk,
			'idbarang' => $idbarang,
			'nama_barang' => $nama_barang,
			'jumlah' => $jumlah,
			'harga' => $harga,
			'tanggal' => $tanggal,
		);

		$status = $this->m_masuk->input_data($data, 'masuk');
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:masuk_edit');
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}
	}
	
	public function yuedit($id){
		$data['masuk'] = $this->m_masuk->ambil_data_satu($id)->row(); 
		$this->load->view('masuk_edit', $data);
	}
	
	public function diedit($id) {
	
		$variable = $this->input->post();
		$idmasuk = $variable["idmasuk"];
		$idbarang = $variable["idbarang"];
		$nama_konsumen= $variable["nama_konsumen"];
		$nama_barang= $variable["nama_barang"];
		$jumlah= $variable["jumlah"];
		$harga= $variable["harga"];
		$tanggal= $variable["tanggal"];

		
		$data = array(
			'idmasuk' => $idmasuk,
			'namakonsumen' => $nama_konsumen,
			'namabarang' => $nama_barang,
			'jumlah' => $jumlah,
			'harga' => $harga,
			
		);
		
		$status = $this->m_masuk->update_data($idbarang,$data);
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:'.base_url('/index.php/masuk/'.$idbarang.'/edit'));
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}
		
	}
	public function diremove($id){
		
		$variable = $this->input->post();
		$idbarang = $variable["idbarang"];
		
		$status = $this->m_barang->delete_data($idbarang);
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:'.base_url('/index.php/masuk'));
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}
		
	}
}