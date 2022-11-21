<?php 
class M_masuk extends CI_Model{ 

	private $tableName;
	
	function __construct(){ 
		parent::__construct(); 
		$this->tableName = 'masuk';
		
		$this->load->model('m_masuk');
	}
	
	function ambil_data(){ 
		return $this->db->get($this->tableName); 
	} 

    function ambil_data_satu($id){ 
	$limit = 1;
	$offset = 0;
	return $this->db->get_where($this->tableName, array('idbarang' => $id), $limit, $offset); 
    }
	function input_data($data){ 
	
		/**
		 * validate ID Barang
		 */
		
		// NOTHING TODO VALIDATED BY FOREING KEY ON DATABASE
		
		if($this->db->insert($this->tableName,$data)){
		
			/**
			 * update stok
			 */
			// $this->m_barang->addStok($data['idbarang'], $data['jumlah']);
			return true;
		} else {
			return false;
		}
	} 
	function hapus_data($where){ 
		$this->db->where($where); 
		$this->db->delete($this->tableName); 
	} 
}