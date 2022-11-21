<?php
defined('BASEPATH') OR exit('No direct script access allowed');

var_dump(BASEPATH);
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

	public function add()
	{
		echo "heyy";
	}

	public function masuk()
	{
		$data['masuk'] = $this->m_masuk->ambil_data()->result(); 
		$this->load->view('barangmasuk',$data);
	}

	public function keluar()
	{
		$data['keluar'] = $this->m_keluar->ambil_data()->result();
		$this->load->view('barangkeluar',$data);
	}
	public function tambahbarang()
	{
	
		$variable = $this->input->post();
		$idbarang = $variable["idbarang"];
		$namabarang = $variable["namabarang"];
		$harga= $variable["harga"];
		$stok= $variable["stok"];
		$jenis= $variable["jenis"];
		
		$data = array(
			'idbarang' => $idbarang,
			'namabarang' => $namabarang,
			'harga' => $harga,
			'stok' => $stok,
			'jenis' => $jenis,
		);
		
		$status = $this->m_barang->input_data($data, 'barang');
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:barang');
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}

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
		$data['barang'] = $this->m_barang->ambil_data_satu($id)->row(); 
		$this->load->view('barang/barang_edit', $data);
	}
	
	public function doedit($id) {
	
		$variable = $this->input->post();
		$idbarang = $variable["idbarang"];
		$namabarang = $variable["namabarang"];
		$harga= $variable["harga"];
		$stok= $variable["stok"];
		
		$data = array(
			'namabarang' => $namabarang,
			'harga' => $harga,
			'stok' => $stok,
		);
		
		$status = $this->m_barang->update_data($idbarang,$data);
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:'.base_url('/index.php/barang/'.$idbarang.'/edit'));
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}
		
	}
	public function doremove($id){
		
		$variable = $this->input->post();
		$idbarang = $variable["idbarang"];
		
		$status = $this->m_barang->delete_data($idbarang);
		
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
	public function tambahdatamasuk()
	{

		// query insert
        // variabel form tambah barang
		$variable = $this->input->post();
		$id_masuk = $variable["id_masuk"];
		$idbarang = $variable["idbarang"];
		$nama_supplier = $variable["nama_supplier"];
		$nama_barang = $variable["nama_barang"];
		$jumlah = $variable["jumlah"];
		$stok = $variable["stok"];
		$harga= $variable["harga"];
		$tanggal = $variable["tanggal"];
		
		$data = array(
			'id_masuk' => $id_masuk,
			'idbarang' => $idbarang,
			'nama_supplier' => $nama_supplier,
			'nama_barang' => $nama_barang,
			'jumlah' => $jumlah,
			'stok' => $stok,
			'harga' => $harga,
			'tanggal' => $tanggal,
		);

		$status = $this->m_masuk->input_data($data, 'masuk');
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:masuk');
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
		$nama_supplier= $variable["nama_supplier"];
		$nama_barang= $variable["nama_barang"];
		$jumlah= $variable["jumlah"];
		$stok= $variable["stok"];
		$harga= $variable["harga"];
		$tanggal= $variable["tanggal"];

		
		$data = array(
			'idmasuk' => $idmasuk,
			'nama_supllier' => $nama_supplier,
			'namabarang' => $nama_barang,
			'jumlah' => $jumlah,
			'stok' => $stok,
			'harga' => $harga,
			
		);
		
		$status = $this->m_masuk->update_data($idbarang,$data);
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:'.base_url('/index.php/barang/'.$idbarang.'/edit'));
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

	
	public function tambahdatakeluar()
	{

		// query insert
        // variabel form tambah barang
		$variable = $this->input->post();
		$id_keluar = $variable["id_keluar"];
		$idbarang = $variable["idbarang"];
		$nama_pembeli = $variable["nama_pembeli"];
		$nama_barang = $variable["nama_barang"];
		$jumlah = $variable["jumlah"];
		$harga= $variable["harga"];
		$tanggal = $variable["tanggal"];

		// query insert ke table  
		$data = array(
			'id_keluar' => $id_keluar,
			'idbarang' => $idbarang,
			'nama_pembeli' => $nama_pembeli,
			'nama_barang' => $nama_barang,
			'jumlah' => $jumlah,
			'harga' => $harga,
			'tanggal' => $tanggal,
		);

		$status = $this->m_keluar->input_data($data, 'keluar');
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:keluar-barang');
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}

	}
	
	public function edit($id_keluar)
	{
			$where = array('id_keluar' => $id_keluar);
			$data['keluar'] = $this->m_keluar->edit_data($where,'keluar')->result();
			$this->load->view('v_edit',$data);
		
		  

		
	    }
}