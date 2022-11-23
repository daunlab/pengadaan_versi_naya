<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH."helpers/IdGenerator.php";

use helper\IdGenerator;

class KeluarManage extends CI_Controller {

  function __construct(){ 
		parent::__construct(); 
		$this->load->model('m_pembeli');
		$this->load->model('m_barang');
		$this->load->model('m_keluar');
		$this->load->model('m_keluar_detail');
	}

	public function index()
	{
		$data['keluar'] = $this->m_keluar->ambil_data()->result();
		$this->load->view('keluar/keluar',$data);
	}
	
  public function goadd(){
		global $JENISBARANG;
		$information['pembeli'] = $this->m_pembeli->ambil_data()->result(); 
		$information['barang'] = $this->m_barang->ambil_data()->result(); 
		$information['uniqueid'] = IdGenerator::generateId(true);
		$information['jenisbarang'] = $JENISBARANG;
		$this->load->view('keluar/keluar_add', $information);
	}
	
	public function doadd(){
		$var = $this->input->post();
		
		// echo "<pre>";
		// var_dump($var);
		// echo "</pre>";
		// die;
		
		$keluar_barang = $var['keluar_barang'];
		$keluar_barang_hrg = $var['keluar_barang_hrg'];
		$keluar_barang_jml = $var['keluar_barang_jml'];
		
		
		/**
     * Transaksi
     */
		$id = $var["id"];
		$id_pembeli = $var["id_pembeli"];
		$keterangan = $var["keterangan"];
		$tanggal= $var["tanggal"];
		
		$data = array(
			'id' => $id,
			'id_pembeli' => $id_pembeli,
			'keterangan' => $keterangan,
			'tanggal' => $tanggal,
		);
		
		$status = $this->m_keluar->input_data($data);
		
		/**
     * detail
     */
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
      
      foreach ($keluar_barang as $k => $v) {
        
        $id = IdGenerator::generateId(false);
        $id_keluar = $data['id'];
        $id_barang = $v;
        $harga = $keluar_barang_hrg[$k];
        $jumlah = $keluar_barang_jml[$k];
        
        $detBar = array(
          'id' => $id,
          'id_keluar' => $id_keluar,
          'id_barang' => $id_barang,
          'harga' => $harga,
          'jumlah' => $jumlah,
        );
        
        $this->m_keluar_detail->input_data($detBar); 
        
      }
      
			header('location:./');
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
	
  public function doremove($id){		
    $status = $this->m_keluar->force_delete($id);
    if($status) {
      /**
       * todo add, conditional if success insert
       */
      header('location:./../');
    } else {
      /**
       * todo add, conditional if failed
       */
    }
    
  }
	    
}