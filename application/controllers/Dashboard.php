<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  function __construct(){ 
		parent::__construct(); 
		$this->load->model('m_barang');
	}
	
	public function index()
	{
		
		$info['tprod'] = $this->db->query("SELECT COUNT(*) AS TotalProduct FROM barang;")->row(); 
    $info['titem'] = $this->db->query("SELECT SUM(stok) AS TotalItem FROM barang;")->row(); 
    $info['tmsk'] = $this->db->query("SELECT COUNT(*) AS TotalTransaksiMasuk FROM masuk;")->row(); 
    $info['tkel'] = $this->db->query("SELECT COUNT(*) AS TotalTransaksiKeluar FROM keluar;")->row();
    
    $query = "
    SELECT * FROM (
      SELECT 'IN' AS jenis, id_masuk AS 'id_trx', idbarang, nama_barang, jumlah, harga, tanggal FROM masuk 
      UNION 
      SELECT 'OUT' AS jenis, id_keluar AS 'id_trx', idbarang, nama_barang, jumlah, harga, tanggal FROM keluar 
      ) AS trx ORDER BY tanggal DESC;
    ";
    
    $info['lasttrx'] = $this->db->query($query)->result();
		
		$this->load->view('dashboard', $info);
	}
	
	
}