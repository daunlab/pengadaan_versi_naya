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
		$this->load->model('m_masuk_detail');
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
		$information['emptystring'] = IdGenerator::generateId(true);
		$information['jenisbarang'] = $JENISBARANG;
		$this->load->view('masuk/masuk_add', $information);
	}
	
	public function doadd(){
		$var = $this->input->post();
		
		// echo "<pre>";
		// var_dump($var);
		// echo "</pre>";
		// die;
		
		$masuk_barang = $var['masuk_barang'];
		$masuk_barang_hrg = $var['masuk_barang_hrg'];
		$masuk_barang_jml = $var['masuk_barang_jml'];
		
		
		/**
     * Transaksi
     */
		$id = $var["id"];
		$id_suplier = $var["id_suplier"];
		$keterangan = $var["keterangan"];
		$tanggal= $var["tanggal"];
		
		$data = array(
			'id' => $id,
			'id_suplier' => $id_suplier,
			'keterangan' => $keterangan,
			'tanggal' => $tanggal,
		);
		
		$status = $this->m_masuk->input_data($data);
		
		/**
     * detail
     */
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
      
      foreach ($masuk_barang as $k => $v) {
        
        $id = IdGenerator::generateId(false);
        $id_masuk = $data['id'];
        $id_barang = $v;
        $harga = $masuk_barang_hrg[$k];
        $jumlah = $masuk_barang_jml[$k];
        
        $detBar = array(
          'id' => $id,
          'id_masuk' => $id_masuk,
          'id_barang' => $id_barang,
          'harga' => $harga,
          'jumlah' => $jumlah,
        );
        
        $this->m_masuk_detail->input_data($detBar); 
        
      }
      
			header('location:./');
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}
	}
	
  public function goedit($id){
    global $JENISBARANG;
    $data['id_masuk'] = $id;
    $data['suplier'] = $this->m_suplier->ambil_data()->result(); 
		$data['barang'] = $this->m_barang->ambil_data()->result(); 
		$data['jenisbarang'] = $JENISBARANG;
		$data['masuk'] = $this->m_masuk->ambil_data_detail($id)->result(); 
		$this->load->view('masuk/masuk_edit', $data);
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
	public function doremove($id){		
		$status = $this->m_masuk->force_delete($id);
		var_dump($status);
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