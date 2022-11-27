<?php 
class M_perubahan_mentah extends CI_Model{ 

	private $tableName;
	
	function __construct(){ 
		parent::__construct(); 
		$this->tableName = 'perubahan_barang_mentah';
		
		$this->load->model('m_perubahan');
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
    
    function ambil_data_where($where = array()){
      $limit = 1000; /** just set to no limit */
      $offset = 0;
      return $this->db->get_where($this->tableName, $where, $limit, $offset); 
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
			$this->m_barang->reduceStok($data['id_barang'], $data['jumlah']);
			return true;
		} else {
			return false;
		}
	} 
	function hapus_data($where){ 
		$this->db->where($where); 
		$this->db->delete($this->tableName); 
	} 
	
	function delete_byidperubahan($id){
		$this->db->where('id_perubahan', $id);
		$this->db->delete($this->tableName);
	}
}