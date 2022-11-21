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
			return $this->db->get_where($this->tableName, array('id' => $id), $limit, $offset); 
    }
  
  function ambil_data_detail($id) {
    $limit = 1;
    $limit = 0;
    // return $this->db->get_where($this->tableName, array('id' => $id), $limit, $offset); 
    
    $this->db->select('m.*, b.nama AS `nama_barang`, md.jumlah, md.harga, p.nama AS `nama_suplier`, p.nama_perusahaan');
		$this->db->from('masuk_detail md');
		$this->db->join('barang b', 'b.id = md.id_barang');
		$this->db->join('masuk m', 'm.id = md.id_masuk');
		$this->db->join('penyuplai p', 'p.id = m.id_suplier');
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
<<<<<<< HEAD
	function hapus_data($id){ 
		$this->db->where('masuk'); 
		return $this->db->delete($this->masuk, array('idbarang' => $jumlah));
	} 
	function cek_login($table,$where){ 
		return $this->db->get_where($table,$where); 
=======
	function hapus_data($where){ 
		$this->db->where($where); 
		$this->db->delete($this->tableName); 
>>>>>>> 540d84c45872b5c99b1438c2c14078bbbdab1dfe
	} 
}