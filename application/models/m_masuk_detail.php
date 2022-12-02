<?php 
class M_masuk_detail extends CI_Model{ 

	private $tableName;
	
	function __construct(){ 
		parent::__construct(); 
		$this->tableName = 'masuk_detail';
		
		$this->load->model('m_masuk');
		$this->load->model('m_barang');
	}
	
	function ambil_data(){ 
		return $this->db->get($this->tableName); 
	} 

    function ambil_data_satu($id){ 
	$limit = 1;
	$offset = 0;
	return $this->db->get_where($this->tableName, array('id' => $id), $limit, $offset); 
    }
	function input_data($data){ 
	
		/**
		 * validate ID Barang
		 */
		
		// NOTHING TODO VALIDATED BY FOREING KEY ON DATABASE
		
		if($this->db->insert($this->tableName,$data)){
		
			/**
			 * update stok
			 * update harga
			 */
			$this->m_barang->addStok($data['id_barang'], $data['jumlah']);
			$this->m_barang->addharga($data['id_barang'], $data['']);
			return true;
		} else {
			return false;
		}
	} 
	function hapus_data($where){ 
		$this->db->where($where); 
		$this->db->delete($this->tableName); 
	} 
	
	function delete_byidmasuk($id){
		$this->db->where('id_masuk', $id);
		$this->db->delete($this->tableName);
	}
}