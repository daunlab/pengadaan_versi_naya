<?php 
class M_perubahan extends CI_Model{ 

	private $tableName;
	
	function __construct(){ 
		parent::__construct(); 
		$this->tableName = 'perubahan_barang';
		
		$this->load->model('m_perubahan_petugas');
		$this->load->model('m_perubahan_jadi');
		$this->load->model('m_perubahan_mentah');
	}
	
	function ambil_data(){ 
		return $this->db->get($this->tableName); 
	} 

    function ambil_data_satu($id){ 
			$limit = 1;
			$offset = 0;
			return $this->db->get_where($this->tableName, array('id' => $id), $limit, $offset); 
    }
  
  function ambil_data_detail($id) {
    $limit = 1;
    $limit = 0;
    // return $this->db->get_where($this->tableName, array('id' => $id), $limit, $offset); 
    
    $this->db->select('m.*, b.id AS `id_barang`, b.nama AS `nama_barang`, md.id AS `id_detail`, md.jumlah, md.harga, p.id AS `id_suplier` , p.nama AS `nama_suplier`, p.nama_perusahaan');
		$this->db->from('masuk_detail md');
		$this->db->join('barang b', 'b.id = md.id_barang');
		$this->db->join('masuk m', 'm.id = md.id_masuk');
		$this->db->join('penyuplai p', 'p.id = m.id_suplier');
		$this->db->where('m.id', $id);
		
		// $this->db->get();
		
		// var_dump($this->db->last_query());
		// return  "heyy";
		// return $this->db->last_query();
		// die;
		
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
	
	function force_delete($id){
		$this->m_perubahan_petugas->delete_byidperubahan($id);
		$this->m_perubahan_mentah->delete_byidperubahan($id);
		$this->m_perubahan_jadi->delete_byidperubahan($id);
		$this->db->where("id", $id);
		if($this->db->delete($this->tableName)){
			return true;
		} else {
			return false;
		}
	}
}