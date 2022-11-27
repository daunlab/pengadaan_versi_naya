<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH."helpers/IdGenerator.php";

use helper\IdGenerator;

class PerubahanManage extends CI_Controller {

  function __construct(){ 
		parent::__construct(); 
		$this->load->model('m_barang');
		$this->load->model('m_perubahan');
		$this->load->model('m_perubahan_jadi');
		$this->load->model('m_perubahan_mentah');
		$this->load->model('m_perubahan_petugas');
	}

	public function index()
	{
		$data['perubahan'] = $this->m_perubahan->ambil_data()->result(); 
		$this->load->view('perubahan/perubahan',$data);
	}
	
  public function goadd(){
		global $JENISBARANG, $JENISKELAMIN;
		$information['barang_mentah'] = $this->m_barang->ambil_data_where(array("jenis"=>"MH"))->result(); 
		$information['barang_jadi'] = $this->m_barang->ambil_data_where(array("jenis"=>"JI"))->result(); 
		$information['petugas'] = $this->m_petugas->ambil_data()->result(); 
		$information['emptystring'] = IdGenerator::generateId(true);
		$information['jenisbarang'] = $JENISBARANG;
		$information['jeniskelamin'] = $JENISKELAMIN;
		
		// echo "<pre>";
		// var_dump($information['barang_mentah']);
		// echo "<br/>";
		// echo "<br/>";
		// echo "<br/>";
		// var_dump($information['barang_jadi']);
		// echo "</pre>";
		// die;
		
		$this->load->view('perubahan/perubahan_add', $information);
	}
	
	public function doadd(){
		$var = $this->input->post();
		
		$perubahan_petugas = $var['perubahan_petugas'];
		
		$perubahan_mentah = $var['perubahan_mentah'];
		$perubahan_mentah_jml = $var['perubahan_mentah_jml'];
		
		$perubahan_jadi = $var['perubahan_jadi'];
		$perubahan_jadi_jml = $var['perubahan_jadi_jml'];
		
		
		/**
     * Transaksi
     */
		$id = $var["id"];
		$keterangan = $var["keterangan"];
		$tanggal= $var["tanggal"];
		
		$data = array(
			'id' => $id,
			'keterangan' => $keterangan,
			'tanggal' => $tanggal,
		);
		
		$status = $this->m_perubahan->input_data($data);
		
		/**
     * detail
     */
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
      
      /** insert list petugas */
      foreach ($perubahan_petugas as $k => $v) {
        
        $id = IdGenerator::generateId(false);
        $id_perubahan = $data['id'];
        $id_petugas = $v;
        
        $detBar = array(
          'id' => $id,
          'id_perubahan' => $id_perubahan,
          'id_petugas' => $id_petugas,
        );
        
        $this->m_perubahan_petugas->input_data($detBar); 
        
      }
      
      /** insert list mentah */
      foreach ($perubahan_mentah as $k => $v) {
        
        $id = IdGenerator::generateId(false);
        $id_perubahan = $data['id'];
        $id_mentah = $v;
        $jml_mentah = $perubahan_mentah_jml[$k];
        
        $detBar = array(
          'id' => $id,
          'id_perubahan' => $id_perubahan,
          'id_barang' => $id_mentah,
          'jumlah' => $jml_mentah,
        );
        
        $this->m_perubahan_mentah->input_data($detBar); 
        
      }
      
      /** insert list jadi */
      foreach ($perubahan_jadi as $k => $v) {
        
        $id = IdGenerator::generateId(false);
        $id_perubahan = $data['id'];
        $id_jadi = $v;
        $jml_jadi = $perubahan_jadi_jml[$k];
        
        $detBar = array(
          'id' => $id,
          'id_perubahan' => $id_perubahan,
          'id_barang' => $id_jadi,
          'jumlah' => $jml_jadi,
        );
        
        $this->m_perubahan_mentah->input_data($detBar); 
        
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
    $data['id_perubahan'] = $id;
    $data['suplier'] = $this->m_suplier->ambil_data()->result(); 
		$data['barang'] = $this->m_barang->ambil_data()->result(); 
		$data['jenisbarang'] = $JENISBARANG;
		$data['perubahan'] = $this->m_perubahan->ambil_data_detail($id)->result(); 
		$this->load->view('perubahan/perubahan_edit', $data);
	}



  public function tambahdataperubahan() {

		// query insert
        // variabel form tambah barang
		$variable = $this->input->post();
		$id_perubahan = $variable["id_perubahan"];
		$idbarang = $variable["idbarang"];
		$nama_barang = $variable["nama_barang"];
		$jumlah = $variable["jumlah"];
		$harga= $variable["harga"];
		$tanggal = $variable["tanggal"];
		
		$data = array(
			'id_perubahan' => $id_perubahan,
			'idbarang' => $idbarang,
			'nama_barang' => $nama_barang,
			'jumlah' => $jumlah,
			'harga' => $harga,
			'tanggal' => $tanggal,
		);

		$status = $this->m_perubahan->input_data($data, 'perubahan');
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:perubahan_edit');
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}
	}
	
	public function diedit($id) {
	
		$variable = $this->input->post();
		$idperubahan = $variable["idperubahan"];
		$idbarang = $variable["idbarang"];
		$nama_konsumen= $variable["nama_konsumen"];
		$nama_barang= $variable["nama_barang"];
		$jumlah= $variable["jumlah"];
		$harga= $variable["harga"];
		$tanggal= $variable["tanggal"];

		
		$data = array(
			'idperubahan' => $idperubahan,
			'namakonsumen' => $nama_konsumen,
			'namabarang' => $nama_barang,
			'jumlah' => $jumlah,
			'harga' => $harga,
			
		);
		
		$status = $this->m_perubahan->update_data($idbarang,$data);
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:'.base_url('/index.php/perubahan/'.$idbarang.'/edit'));
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}
		
	}
	public function doremove($id){		
		$status = $this->m_perubahan->force_delete($id);
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