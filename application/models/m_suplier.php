<?php 
class M_suplier extends CI_Model{ 
	
	private $tableName;
	
	function __construct(){
    parent::__construct(); 
		$this->tableName = 'penyuplai';
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
		return $this->db->insert($this->tableName,$data); 
	} 
	function update_data($id, $data){
		return $this->db->update($this->tableName, $data, array('id' => $id));
	}
	function delete_data($id){ 
		return $this->db->delete($this->tableName, array('id' => $id));
	}	
	
}