<?php 
class M_masuk extends CI_Model{ 
	
	function __construct(){ 
		parent::__construct(); 
		$this->load->model('m_masuk');
	}
	
	function ambil_data(){ 
		return $this->db->get('masuk'); 
	} 

    function ambil_data_satu($id){ 
	$limit = 1;
	$offset = 0;
	return $this->db->get_where('masuk', array('idbarang' => $id), $limit, $offset); 
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
	function hapus_data($id){ 
		$this->db->where('masuk'); 
		return $this->db->delete($this->masuk, array('idbarang' => $jumlah));
	} 
	function cek_login($table,$where){ 
		return $this->db->get_where($table,$where); 
	} 
}