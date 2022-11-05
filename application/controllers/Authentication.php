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

		//membuat koneksi ke database
		$mysqli = new mysqli("localhost","root","mysql","db_app_naya_01");

		 //validasi koneksi jika ada koneksi database
		if ($mysqli -> connect_errno) {
		  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
		  exit();
		}

		$variable = $this->input->post();
		// var_dump($variable);
		// // die;


		//cek login, terdaftar atau tidak
		if(isset($variable["login"])) {
		    $email = $variable['email'];
		    $password = $variable['password'];

		    //cocokin dengan database, ada atau tidak datanya

			$sql = "SELECT * FROM login where email='$email' and password='$password'";

			$hitung = 0;
			if ($result = $mysqli -> query($sql)) {
				$hitung = $result->num_rows;
			}

			$mysqli -> close();
			
			$data['barang'] = "select * from barang";
			

		    if($hitung>0){
		        $_SESSION['log'] = 'True';
		        // $this->load->view('barang');
		        header('location:barang',"$data");
		    } else {
		        // $this->load->view('pages/login');
		        header('location:login');
		    };
		};

		// if (!isset($_SESSION['log'])){
		    
		// } else {
		//     header('location:index.php');
		// }
	}

	public function logout()
	{
		session_start();
		session_destroy();
		header('location:login');
	}
}
