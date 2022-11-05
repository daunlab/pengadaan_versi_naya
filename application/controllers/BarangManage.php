<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangManage extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		$this->load->model('m_barang');
		$this->load->model('m_masuk');
		$this->load->model('m_keluar');
		
	}
	public function dashboard()
    {
	$this->load->view('dashboard', $data);	
	} 
	public function laporan()
	{
		$this->load->view('laporan', $data);
	}

	public function index()
	{
		$data['barang'] = $this->m_barang->ambil_data()->result(); 
		$this->load->view('barang', $data);
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
		
		$data = array(
			'idbarang' => $idbarang,
			'namabarang' => $namabarang,
			'harga' => $harga,
			'stok' => $stok,
		);
		
		$statusinsert = $this->m_barang->input_data($data, 'barang');
		
		if($statusinsert) {
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

	public function tambahdatamasuk()
	{
		// koneksi database
		    $mysqli = new mysqli("localhost","root","mysql","db_app_naya_01");

		// validasi database
		if ($mysqli -> connect_errno) {
			echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
			exit();
		}

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

		$statusinsert = $this->m_masuk->input_data($data, 'masuk');
		
		if($statusinsert) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:masuk-barang');
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}


	}
	public function tambahdatakeluar()
	{
		// koneksi database
		    $mysqli = new mysqli("localhost","root","mysql","db_app_naya_01");

		// validasi database
		if ($mysqli -> connect_errno) {
			echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
			exit();
		}

		// query insert
        // variabel form tambah barang
		$variable = $this->input->post();
		$id_keluar = $variable["id_keluar"];
		$idbarang = $variable["idbarang"];
		$nama_barang = $variable["nama_barang"];
		$jumlah = $variable["jumlah"];
		$harga= $variable["harga"];
		$tanggal = $variable["tanggal"];

		// query insert ke table  
		$data = array(
			'id_keluar' => $id_keluar,
			'idbarang' => $idbarang,
			'nama_barang' => $nama_barang,
			'jumlah' => $jumlah,
			'harga' => $harga,
			'tanggal' => $tanggal,
		);

		$statusinsert = $this->m_keluar->input_data($data, 'keluar');
		
		if($statusinsert) {
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


