<?php 
class M_perubahan_petugas extends CI_Model{ 

	private $tableName;
	
	function __construct(){ 
		parent::__construct(); 
		$this->tableName = 'perubahan_barang_petugas';
		
		$this->load->model('m_perubahan');
		$this->load->model('m_petugas');
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
  
  function ambil_detail_byidperubahan($id){
    $this->db->select('pbp.* , p.nama, p.no_telp, p.alamat');
		$this->db->from('perubahan_barang_petugas pbp');
		$this->db->join('petugas p', 'p.id = pbp.id_petugas');
		$this->db->where('pbp.id_perubahan', $id);
  }
  
	function input_data($data){ 
	
		/**
		 * validate ID Barang
		 */
		
		// NOTHING TODO VALIDATED BY FOREING KEY ON DATABASE
		
		if($this->db->insert($this->tableName,$data)){
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