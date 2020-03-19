<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('ModelAkun');
		if($this->session->userdata('status') != 'login'){
			redirect(base_url("Welcome"));
		}
	}


	public function index()
	{
		$this->data['hasil'] = $this->ModelAkun->getUser('user');
		$this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/akun', $this->data);
		$this->load->view('template/foot');
	}


	public function tambahAkun()
	{
		$this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/tambahAkun');
		$this->load->view('template/foot');
	}



    public function insert()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$data = array('username' => $username , 'password' => $password);
		$tambah = $this->ModelAkun->tambahData('user',$data);
		if($tambah > 0) {
			redirect('Akun');
		}else{
			echo 'gagal disimpan';
		}
	}

	public function delete($id_user)
	{
		$hapus = $this ->ModelAkun->hapusData('user',$id_user);
		if($hapus > 0) {
			redirect('Akun');
		}else{
			echo 'gagal disimpan';
		}
	}

	public function editAkun($id_user)
	{
		$this ->data['dataEdit'] = $this -> ModelAkun->dataEdit('user',$id_user);
		$this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/editAkun',$this -> data);
		$this->load->view('template/foot');
	}


	public function update_akun($id_user)
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
	
			$data = array('username' => $username , 'password' => $password);
		
		$edit = $this->ModelAkun->editData('user',$data,$id_user);
		echo $this->db->last_query();
		if($edit > 0) {
			redirect('Akun');
		}else{
			echo 'gagal disimpan';
		}
	}



}