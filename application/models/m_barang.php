<?php 
class M_barang extends CI_Model{ 
	
	private $tableName;
	
	function __construct(){
		$this->tableName = 'barang';
	}
	
	function ambil_data(){ 
		return $this->db->get('barang'); 
	}
	function ambil_data_satu($id){ 
		$limit = 1;
		$offset = 0;
		return $this->db->get_where('barang', array('id' => $id), $limit, $offset); 
	} 
	function input_data($data,$table){ 
		return $this->db->insert($table,$data); 
	} 
	function update_data($id, $data){
		return $this->db->update($this->tableName, $data, array('id' => $id));
	}
	function delete_data($id){ 
		return $this->db->delete($this->tableName, array('id' => $id));
	}	
	function cek_login($table,$where){ 
		return $this->db->get_where($table,$where); 
	} 
	function addStok($idbarang, $jmlstok) {
		return $this->db->query("UPDATE barang b SET b.stok = (b.stok + ".$jmlstok.") WHERE b.id = '".$idbarang."';");
	}
	function reduceStok($idbarang, $jmlstok) {
		return $this->db->query("UPDATE barang b SET b.stok = (b.stok - ".$jmlstok.") WHERE b.id = '".$idbarang."';");
	}
	
}