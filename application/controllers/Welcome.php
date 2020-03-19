<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('modelLogin');

	} 

	public function index()
	{
		$this->load->view('template/head');
		$this->load->view('login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->modelLogin->cek_login("user",$where)->num_rows();
		if($cek > 0){
			
			$data_session = array(
				'username' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("admin"));

		}else{
			redirect(base_url("welcome/index?pesan=false"));
		}

	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('welcome'));
	}
}
