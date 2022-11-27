<?php 
class M_keluar extends CI_Model{ 

	function __construct(){ 
		parent::__construct(); 		
		$this->tableName = 'keluar';
		
		$this->load->model('m_keluar_detail');
		$this->load->model('m_keluar');
	}

	function ambil_data(){ 
		return $this->db->get('keluar'); 
	} 
	
	function ambil_data_satu($id){ 
		$limit = 1;
		$offset = 0;
		return $this->db->get_where($this->tableName, array('id' => $id), $limit, $offset); 
	}
	
	function ambil_data_detail($id) {
	
    $this->db->select('k.*, b.id AS `id_barang`, b.nama AS `nama_barang`, kd.id AS `id_detail`, kd.jumlah, kd.harga, p.id AS `id_pembeli` , p.nama AS `nama_pembeli`');
		$this->db->from('keluar_detail kd');
		$this->db->join('barang b', 'b.id = kd.id_barang');
		$this->db->join('keluar k', 'k.id = kd.id_keluar');
		$this->db->join('pembeli p', 'p.id = k.id_pembeli');
		$this->db->where('k.id', $id);
		
		return $this->db->get();
    
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
			// $this->m_barang->reduceStok($data['idbarang'], $data['jumlah']);
			return true;
		} else {
			return false;
		}
	} 
	function hapus_data($where){ 
		$this->db->where($where); 
		$this->db->delete($this->tableName); 
	} 
	
	function force_delete($id){
		$this->m_keluar_detail->delete_byidkeluar($id);
		$this->db->where("id", $id);
		if($this->db->delete($this->tableName)){
			return true;
		} else {
			return false;
		}
	}
	
	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}
	function ubah_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}