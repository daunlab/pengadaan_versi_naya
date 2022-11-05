<?php 
class M_masuk extends CI_Model{ 
	
	function __construct(){ 
		parent::__construct(); 
		$this->load->model('m_barang');
	}
	
	function ambil_data(){ 
		return $this->db->get('masuk'); 
	} 
	function input_data($data,$table){ 
	
		/**
		 * validate ID Barang
		 */
		
		// NOTHING TODO VALIDATED BY FOREING KEY ON DATABASE
		
		if($this->db->insert($table,$data)){
		
			/**
			 * update stok
			 */
			$this->m_barang->addStok($data['idbarang'], $data['jumlah']);
			return true;
		} else {
			return false;
		}
	} 
	function hapus_data($where,$table){ 
		$this->db->where($where); 
		$this->db->delete($table); 
	} 
	function cek_login($table,$where){ 
		return $this->db->get_where($table,$where); 
	} 
}