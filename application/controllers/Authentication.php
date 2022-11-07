<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('pages/login');
	}

	public function login(){

		session_start();

		$variable = $this->input->post();		


		//cek login, terdaftar atau tidak
		if(isset($variable["login"])) {
		    $email = $variable['email'];
		    $password = $variable['password'];
		    
		    $limit = 1;
		    $offset = 0;

		    //cocokin dengan database, ada atau tidak datanya
				$result = $this->db->get_where('login', array('email' => $email, 'password' => $password), $limit, $offset); 
				if($this->db->affected_rows() > 0) {
					$_SESSION['log'] = 'True';
					header('location:barang');
					return true;
				} else {
					header('location:login');
					return true;
				}
				
				return false;
		}
	}

	public function logout()
	{
		session_start();
		session_destroy();
		header('location:login');
	}
}
