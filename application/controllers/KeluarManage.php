<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH."helpers/IdGenerator.php";

use helper\IdGenerator;

class KeluarManage extends CI_Controller {

	public function keluar()
	{
		$data['keluar'] = $this->m_keluar->ambil_data()->result();
		$this->load->view('barangkeluar',$data);
	}
	
	public function tambahdatakeluar()
	{

		// query insert
        // variabel form tambah barang
		$variable = $this->input->post();
		$id_keluar = $variable["id_keluar"];
		$idbarang = $variable["idbarang"];
		$nama_pembeli = $variable["nama_pembeli"];
		$nama_barang = $variable["nama_barang"];
		$jumlah = $variable["jumlah"];
		$harga= $variable["harga"];
		$tanggal = $variable["tanggal"];

		// query insert ke table  
		$data = array(
			'id_keluar' => $id_keluar,
			'idbarang' => $idbarang,
			'nama_pembeli' => $nama_pembeli,
			'nama_barang' => $nama_barang,
			'jumlah' => $jumlah,
			'harga' => $harga,
			'tanggal' => $tanggal,
		);

		$status = $this->m_keluar->input_data($data, 'keluar');
		
		if($status) {
			/**
			 * todo add, conditional if success insert
			 */
			header('location:keluar-barang');
		} else {
			/**
			 * todo add, conditional if failed
			 */
		}

	}
	
	public function edit($id_keluar)
	{
			$where = array('id_keluar' => $id_keluar);
			$data['keluar'] = $this->m_keluar->edit_data($where,'keluar')->result();
			$this->load->view('v_edit',$data);
		
		  

		
	    }
	    
}