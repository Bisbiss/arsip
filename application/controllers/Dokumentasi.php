<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumentasi extends CI_Controller {

	function __construct(){
		parent::__construct();
        
		$this->load->helper('url');
		if($this->session->userdata('status') != 'login'){
			redirect(base_url("Welcome"));
		}
        $this->load->model('ModelDokumentasi');
	}

	public function index()
	{
        $data['data']=$this->ModelDokumentasi->get_data('galeri');
		$this->load->view('template/head');
		$this->load->view('template/menu');
        $this->load->view('Admin/dokumentasi', $data);
		$this->load->view('template/foot');
	}

    function tambah(){
        $file = $_files['file'];
        $config['upload_path'] = './assets/file';
        $config['allowed_types']='jpg|png|gif|jpeg';
        $this->load->library('upload',$config);
        if(!$this->upload->do_upload('file')){
            echo "gagal";
        }else{
            $file=$this->upload->data('file_name');
        }
        $data = array('file' => $file);
        $tambah = $this->ModelDokumentasi->tambah('galeri',$data);
		if($tambah > 0) {
			redirect('Dokumentasi?action=success');
		}else{
			redirect('Dokumentasi?action=failed');
		}
    }
    public function delete($id_galeri)
	{
		$hapus = $this ->ModelDokumentasi->hapus('galeri',$id_galeri);
		if($hapus > 0) {
			redirect('Dokumentasi');
		}
	}
}