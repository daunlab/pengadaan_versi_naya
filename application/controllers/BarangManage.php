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
		$idbarang = $variable["idbarang"];
		$namabarang = $variable["namabarang"];
		$harga= $variable["harga"];
		$stok= $variable["stok"];

		// query insert ke table  
		$sql = "INSERT INTO `barang`(`idbarang`, `namabarang`, `harga`, `stok`) VALUES ('$idbarang','$namabarang','$harga','$stok')";


		// kirim ke database
		if ($mysqli->query($sql) === TRUE) { 
			echo "New record created successfully";
			header('location:barang');
		  } else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		  }
		  
		  $mysqli->close();
		  

		// daftar barang


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
		$nama_barang = $variable["nama_barang"];
		$jumlah = $variable["jumlah"];
		$harga= $variable["harga"];
		$tanggal = $variable["tanggal"];

		// query insert ke table  
		$sql = "
		INSERT INTO
		`masuk`(
		  `id_masuk`,
		  `nama_barang`,
		  `jumlah`,
		  `harga`,
		  `tanggal`
		)
	  VALUES
		(
		  '$id_masuk',
		  '$nama_barang',
		  '$jumlah',
		  '$harga',
		  '$tanggal'
		)";	  

		// kirim ke database
		if ($mysqli->query($sql) === TRUE) { 
			echo "New record created successfully";
			header('location:masuk-barang');
		  } else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		  }
		  
		  $mysqli->close();
		  

		// daftar barang


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
		$id_barang = $variable["id_barang"];
		$nama_barang = $variable["nama_barang"];
		$jumlah = $variable["jumlah"];
		$harga= $variable["harga"];
		$tanggal = $variable["tanggal"];

		// query insert ke table  
		$sql = " INSERT INTO `keluar`(`id_keluar`, `id_barang`, `nama_barang`, `jumlah`, `harga`, `tanggal`) VALUES ('$id_keluar','$id_barang','$nama_barang','$jumlah','$harga','$tanggal')";

		// kirim ke database
		if ($mysqli->query($sql) === TRUE) { 
			echo "created successfully";
			header('location:keluar-barang');
		  } else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		  }
		  
		  $mysqli->close();
		  

		// daftar barang


	}
	
	public function edit($id_keluar)
	{
			$where = array('id_keluar' => $id_keluar);
			$data['keluar'] = $this->m_keluar->edit_data($where,'keluar')->result();
			$this->load->view('v_edit',$data);
		
		  

		
		}



	}


