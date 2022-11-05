<?php 
class M_keluar extends CI_Model{ 
	function ambil_data(){ 
		return $this->db->get('keluar'); 
	} 
	function input_data($data,$table){ 
		$this->db->insert($table,$data); 
	} 
	function hapus_data($where,$table){ 
		$this->db->where($where); 
		$this->db->delete($table); 
	} 
	function cek_login($table,$where){ 
		return $this->db->get_where($table,$where); 
	} 
	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}
	function ubah_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}