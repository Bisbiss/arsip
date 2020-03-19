<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('ModelEmail');
        $this->load->model('ModelMasuk');
        $this->load->model('ModelKeluar');
        $this->load->model('ModelDinas');
        $this->load->model('ModelMaster');
		if($this->session->userdata('status') != 'login'){
			redirect(base_url("Welcome"));
		}
	}

	public function index()
	{
        $cek = $this->ModelEmail->cek();
        if($cek > 0){
            $data['data'] = $this ->ModelEmail->edit('email');
            $this->load->view('template/head');
            $this->load->view('template/menu');
            $this->load->view('Admin/emailDone', $data);
            $this->load->view('template/foot');
        }else{
            $this->load->view('template/head');
            $this->load->view('template/menu');
            $this->load->view('Admin/email');
            $this->load->view('template/foot');
        }
	}

    public function tambah()
	{
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$isi = $_POST['isi'];

    $data = array(
        'email_tujuan'=>$email,
        'subject'=>$subject,
        'isi'=>$isi
    );
    $this->ModelEmail->tambah('email',$data);

    redirect(base_url('email'));
    }

    public function editData(){
        $email = $_POST['email'];
		$subject = $_POST['subject'];
		$isi = $_POST['isi'];
        $id = $_POST['id'];
        
        $array = array(
            'email_tujuan'=>$email,
            'subject'=>$subject,
            'isi'=>$isi
        );
        // $where = array('id_email' => $_POST['id']);
        // $this->ModelEmail->edit($where,$array);

        $edit = $this->ModelEmail->editData('email',$array,$id);
        echo $this->db->last_query();

        redirect(base_url('Email?action=success'));
    }

    public function sendEmail($id_surat){
        $dataMasuk = $this->ModelMasuk->dataEdit('surat_masuk',$id_surat);
        $data = $this ->ModelEmail->edit('email');

        $file = base_url('assets/foto/'.$dataMasuk->file);
        foreach ($data as $data) {
            $id = $data['id_email'];
            $email = $data['email_tujuan'];
            $subject = $data['subject']; 
            $isi = $data['isi'];
        }
        // echo $file;
        // echo $dataMasuk->id_surat;
        // echo $email;
        
        // Konfigurasi email
        $config = [
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'arsip.media2@gmail.com',    // Ganti dengan email gmail kamu
               'smtp_pass' => 'projectperpus',      // Password gmail kamu
               'smtp_port' => 465,
               'crlf'      => "\r\n",
               'newline'   => "\r\n"
           ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@arsip.indoweb.xyz', 'Administrator');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan kamu

        // Lampiran email, isi dengan url/path file
        $this->email->attach($file);

        // Subject email
        $this->email->subject($subject);

        // Isi email
        $this->email->message($isi."<br>Laporan surat masuk <br> Tanggal Surat :".$dataMasuk->tgl_surat."<br> No Surat : ".$dataMasuk->no_surat."<br> Asal Surat :".$dataMasuk->asal_surat);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            $data = array('lapor' => 1);
            $edit = $this->ModelMasuk->editData('surat_masuk',$data,$id_surat);
		    echo $this->db->last_query();
            redirect(base_url('admin/masuk?send=success'));
        } else {
            redirect(base_url('admin/masuk?send=failed'));
        }
    }

    public function sendEmailKeluar($id_sk){
        $dataKeluar = $this->ModelKeluar->dataEdit('surat_keluar',$id_sk);
        $data = $this ->ModelEmail->edit('email');

        $file = base_url('assets/foto/'.$dataKeluar->file);
        foreach ($data as $data) {
            $id = $data['id_email'];
            $email = $data['email_tujuan'];
            $subject = $data['subject']; 
            $isi = $data['isi'];
        }
        // echo $file;
        // echo $dataMasuk->id_surat;
        // echo $email;
        
        // Konfigurasi email
        $config = [
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'arsip.media2@gmail.com',    // Ganti dengan email gmail kamu
               'smtp_pass' => 'projectperpus',      // Password gmail kamu
               'smtp_port' => 465,
               'crlf'      => "\r\n",
               'newline'   => "\r\n"
           ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@arsip.indoweb.xyz', 'Administrator');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan kamu

        // Lampiran email, isi dengan url/path file
        $this->email->attach($file);

        // Subject email
        $this->email->subject($subject);

        // Isi email
        $this->email->message($isi."<br>Laporan surat keluar <br> Tanggal Surat :".$dataKeluar->tgl_surat."<br> No Surat : ".$dataKeluar->no_surat."<br> Jenis Surat :".$dataKeluar->jenis_surat);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            $data = array('lapor' => 1);
            $edit = $this->ModelKeluar->editData('surat_keluar',$data,$id_sk);
		    echo $this->db->last_query();
            redirect(base_url('admin/keluar?send=success'));
        } else {
            redirect(base_url('admin/keluar?send=failed'));
        }
    }

    public function sendEmailDinas($id_nota_dinas){
        $dataDinas = $this->ModelDinas->dataEdit('nota_dinas',$id_nota_dinas);
        $data = $this ->ModelEmail->edit('email');

        $file = base_url('assets/foto/'.$dataDinas->file);
        foreach ($data as $data) {
            $id = $data['id_email'];
            $email = $data['email_tujuan'];
            $subject = $data['subject']; 
            $isi = $data['isi'];
        }
        // echo $file;
        // echo $dataMasuk->id_surat;
        // echo $email;
        
        // Konfigurasi email
        $config = [
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'arsip.media2@gmail.com',    // Ganti dengan email gmail kamu
               'smtp_pass' => 'projectperpus',      // Password gmail kamu
               'smtp_port' => 465,
               'crlf'      => "\r\n",
               'newline'   => "\r\n"
           ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@arsip.indoweb.xyz', 'Administrator');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan kamu

        // Lampiran email, isi dengan url/path file
        $this->email->attach($file);

        // Subject email
        $this->email->subject($subject);

        // Isi email
        $this->email->message($isi."<br>Laporan nota dinas <br> Tanggal Nota :".$dataDinas->tgl_keluar."<br> No Surat : ".$dataDinas->no_surat."<br> Jenis Surat :".$dataDinas->jenis_surat."<br> Tujuan Surat :".$dataDinas->tujuan_surat);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            $data = array('lapor' => 1);
            $edit = $this->ModelDinas->editData('nota_dinas',$data,$id_nota_dinas);
		    echo $this->db->last_query();
            redirect(base_url('admin/dinas?send=success'));
        } else {
            redirect(base_url('admin/dinas?send=failed'));
        }
    }

    public function sendEmailMaster($id_berkas){
        $dataMaster = $this->ModelMaster->dataEdit('data_master',$id_berkas);
        $data = $this ->ModelEmail->edit('email');

        $file = base_url('assets/foto/'.$dataMaster->file);
        foreach ($data as $data) {
            $id = $data['id_email'];
            $email = $data['email_tujuan'];
            $subject = $data['subject']; 
            $isi = $data['isi'];
        }
        // echo $file;
        // echo $dataMasuk->id_surat;
        // echo $email;
        
        // Konfigurasi email
        $config = [
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'arsip.media2@gmail.com',    // Ganti dengan email gmail kamu
               'smtp_pass' => 'projectperpus',      // Password gmail kamu
               'smtp_port' => 465,
               'crlf'      => "\r\n",
               'newline'   => "\r\n"
           ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@arsip.indoweb.xyz', 'Administrator');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan kamu

        // Lampiran email, isi dengan url/path file
        $this->email->attach($file);

        // Subject email
        $this->email->subject($subject);

        // Isi email
        $this->email->message($isi."<br>Laporan data master <br> Tanggal Input :".$dataMaster->tgl_input."<br> Nama Berkas :".$dataMaster->nama_berkas."<br> Jenis Surat : ".$dataMaster->jenis_berkas."<br> Isi Surat :".$dataMaster->isi_berkas);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            $data = array('lapor' => 1);
            $edit = $this->ModelMaster->editData('data_master',$data,$id_berkas);
		    echo $this->db->last_query();
            redirect(base_url('master?send=success'));
        } else {
            redirect(base_url('master?send=failed'));
        }
    }
}