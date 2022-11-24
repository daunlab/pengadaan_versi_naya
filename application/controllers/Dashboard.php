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
      SELECT 'IN' AS jenis, m.id AS 'id_trx', b.nama AS `nama_barang`, md.jumlah, md.harga, tanggal FROM masuk_detail md INNER JOIN masuk m ON m.id = md.id_masuk INNER JOIN barang b ON md.id_barang = b.id
      UNION 
      SELECT 'OUT' AS jenis, k.id AS 'id_trx', b.nama AS `nama_barang`, kd.jumlah, kd.harga, tanggal FROM keluar_detail kd INNER JOIN keluar k ON k.id = kd.id_keluar INNER JOIN barang b ON kd.id_barang = b.id
      ) AS trx ORDER BY tanggal DESC;
    ";
    
    $info['lasttrx'] = $this->db->query($query)->result();
		
		$this->load->view('dashboard', $info);
	}
	
	
}