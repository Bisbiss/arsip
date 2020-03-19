<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
        
		$this->load->helper('url');
		if($this->session->userdata('status') != 'login'){
			redirect(base_url("Welcome"));
		}
        $this->load->model('m_grafik');
         $this->load->model('k_grafik');
         $this->load->model('d_grafik');
	}

	public function index()
	{
        $x['data']=$this->m_grafik->get_data_stok();
        $k['data2']=$this->k_grafik->get_data_stok();
        $d['data3']=$this->d_grafik->get_data_stok();
		$this->load->view('template/head');
		$this->load->view('template/menu');
        $this->load->view('Admin/index');
       $this->load->view('Admin/v_grafik',$x);
       $this->load->view('Admin/k_grafik',$k);
       $this->load->view('Admin/d_grafik',$d);
		$this->load->view('template/foot');
	}

	public function masuk()
	{
		$this->data['hasil2'] = $this->modelMasuk->getUser('surat_masuk');
		$this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/surat_masuk', $this->data);
		$this->load->view('template/foot');
	}

	public function keluar()
	{
		$this->data['hasil'] = $this->modelKeluar->getUser('surat_keluar');
		$this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/surat_keluar', $this->data);
		$this->load->view('template/foot');
	}

	public function dinas()
	{
		$this->data['hasil3'] = $this->modelDinas->getUser('nota_dinas');
		$this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/nota_dinas', $this->data);
		$this->load->view('template/foot');
	}

	public function tambahNota()
	{
		$this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/tambahNota');
		$this->load->view('template/foot');
	}

	public function tambahMasuk()
	{
		$this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/tambahMasuk');
		$this->load->view('template/foot');
	}

	public function tambahKeluar()
	{
		$this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/tambahKeluar');
		$this->load->view('template/foot');
	}
/*
public $id_sk;
    public $no_surat;
    public $tgl_surat;
    public $tujuan_surat;
    public $jenis_surat;
    public $isi_surat;
    public $ket;
    public $bulan;
	public $file ="default.jpg";
	*/
	public function insert()
	{
		$no_surat = $_POST['no_surat'];
		$tgl_surat = $_POST['tgl_surat'];
        $tahun=substr($tgl_surat,0,4);
        $bulan = substr($tgl_surat,5,2);
       if($bulan == '01'){ $bulan='januari';}
       if($bulan == '02'){$bulan='februari';}
       if($bulan == '03'){$bulan='maret';}
       if($bulan == '04'){ $bulan='april';}
       if($bulan == '05'){$bulan='mei'; }
       if($bulan == '06'){$bulan='juni'; }
       if($bulan == '07'){$bulan='juli';}
       if($bulan == '08'){$bulan='agustus';  }
       if($bulan == '09'){$bulan='september'; }
       if($bulan == '10'){$bulan='oktober';}
       if($bulan == '11'){$bulan='november'; }
       if($bulan == '12'){$bulan='desember'; }

		$tujuan_surat = $_POST['tujuan_surat'];
		$jenis_surat = $_POST['jenis_surat'];
		$isi_surat = $_POST['isi_surat'];
		$ket = $_POST['ket'];
		$file = $_FILES['file'];
		if($file=''){

		}else{
			$config['upload_path'] = './assets/foto';
			$config['allowed_types']='jpg|png|gif|jpeg|pdf|docx|doc';
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('file')){
				echo "gagal";
			}else{
				$file=$this->upload->data('file_name');
			}
		}
		$data = array('no_surat' => $no_surat , 'tgl_surat' => $tgl_surat, 'tujuan_surat'=> $tujuan_surat
		, 'jenis_surat' => $jenis_surat, 'isi_surat' => $isi_surat, 'ket' => $ket , 'bulan' => $bulan, 'file' => $file, 'tahun' => $tahun);
		$tambah = $this->modelKeluar->tambahData('surat_keluar',$data);
		if($tambah > 0) {
			redirect('Admin/keluar');
		}else{
			echo 'gagal disimpan';
		}
	}

	public function delete($id_sk)
	{
		$hapus = $this ->modelKeluar->hapusData('surat_keluar',$id_sk);
		if($hapus > 0) {
			redirect('Admin/keluar');
		}else{
			echo 'gagal disimpan';
		}
	}

	public function editKeluar($id_sk)
	{
		$this ->data['dataEdit'] = $this -> modelKeluar->dataEdit('surat_keluar',$id_sk);
		$this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/editKeluar',$this -> data);
		$this->load->view('template/foot');
	}


	public function update($id_sk)
	{
		$no_surat = $_POST['no_surat'];
		$tgl_surat = $_POST['tgl_surat'];
		$tujuan_surat = $_POST['tujuan_surat'];
		$jenis_surat = $_POST['jenis_surat'];
		$isi_surat = $_POST['isi_surat'];
		$ket = $_POST['ket'];
		$file = $_FILES['file'];
        if($file=''){

		}else{
			$config['upload_path'] = './assets/foto';
			$config['allowed_types']='jpg|png|gif|jpeg|pdf|docx|doc';
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('file')){
				echo "gagal";
			}else{
				$file=$this->upload->data('file_name');
			}
		}
		if($file==''){
			$data = array('no_surat' => $no_surat , 'tgl_surat' => $tgl_surat, 'tujuan_surat'=> $tujuan_surat
		, 'jenis_surat' => $jenis_surat, 'isi_surat' => $isi_surat, 'ket' => $ket);
		}else{
			$data = array('no_surat' => $no_surat , 'tgl_surat' => $tgl_surat, 'tujuan_surat'=> $tujuan_surat
		, 'jenis_surat' => $jenis_surat, 'isi_surat' => $isi_surat, 'ket' => $ket , 'file' => $file);
		}

		
		$edit = $this->modelKeluar->editData('surat_keluar',$data,$id_sk);
		echo $this->db->last_query();

		if($edit > 0) {
			redirect('Admin/keluar');
		}else{
			echo 'gagal disimpan';
		}
	}






















	public function insert_masuk()
	{
		$no_surat = $_POST['no_surat'];
		$tgl_surat = $_POST['tgl_surat'];
        $tahun=substr($tgl_surat,0,4);
        $bulan = substr($tgl_surat,5,2);
        
if($bulan == '01'){ $bulan='januari';}
       if($bulan == '02'){$bulan='februari';}
       if($bulan == '03'){$bulan='maret';}
       if($bulan == '04'){ $bulan='april';}
       if($bulan == '05'){$bulan='mei'; }
       if($bulan == '06'){$bulan='juni'; }
       if($bulan == '07'){$bulan='juli';}
       if($bulan == '08'){$bulan='agustus';  }
       if($bulan == '09'){$bulan='september'; }
       if($bulan == '10'){$bulan='oktober';}
       if($bulan == '11'){$bulan='november'; }
       if($bulan == '12'){$bulan='desember'; }


		$asal_surat = $_POST['asal_surat'];
		$jenis_surat = $_POST['jenis_surat'];
		$isi_surat = $_POST['isi_surat'];
		$ket = $_POST['ket'];
		$tgl_surat_diterima = $_POST['tgl_surat_diterima'];
		$file = $_FILES['file'];
		if($file=''){

		}else{
			$config['upload_path'] = './assets/foto';
			$config['allowed_types']='jpg|png|gif|jpeg|pdf|docx|doc';
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('file')){
				echo "gagal";
			}else{
				$file=$this->upload->data('file_name');
			}
		}
		$data = array('no_surat' => $no_surat , 'tgl_surat' => $tgl_surat, 'asal_surat'=> $asal_surat
		, 'jenis_surat' => $jenis_surat, 'isi_surat' => $isi_surat, 'ket' => $ket ,  'bulan' => $bulan ,
		'tgl_surat_diterima' => $tgl_surat_diterima, 'file' => $file, 'tahun' => $tahun);
		$tambah = $this->modelMasuk->tambahData('surat_masuk',$data);
		if($tambah > 0) {
			redirect('Admin/masuk');
		}else{
			echo 'gagal disimpan';
		}
	}

	public function delete_masuk($id_surat)
	{
		$hapus = $this ->modelMasuk->hapusData('surat_masuk',$id_surat);
		if($hapus > 0) {
			redirect('Admin/masuk');
		}else{
			echo 'gagal disimpan';
		}
	}

	public function editMasuk($id_surat)
	{
		$this ->data['dataEdit'] = $this -> modelMasuk->dataEdit('surat_masuk',$id_surat);
		$this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/editMasuk',$this -> data);
		$this->load->view('template/foot');
	}


	public function update_masuk($id_surat)
	{
		$no_surat = $_POST['no_surat'];
		$tgl_surat = $_POST['tgl_surat'];
		$asal_surat = $_POST['asal_surat'];
		$jenis_surat = $_POST['jenis_surat'];
		$isi_surat = $_POST['isi_surat'];
		$ket = $_POST['ket'];
		$tgl_surat_diterima = $_POST['tgl_surat_diterima'];
		$file = $_FILES['file'];
		if($file=''){

		}else{
			$config['upload_path'] = './assets/foto';
			$config['allowed_types']='jpg|png|gif|jpeg|pdf|docx|doc';
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('file')){
				echo "gagal";
			}else{
				$file=$this->upload->data('file_name');
			}
		}
		if($file==''){
			$data = array('no_surat' => $no_surat , 'tgl_surat' => $tgl_surat, 'asal_surat'=> $asal_surat
		, 'jenis_surat' => $jenis_surat, 'isi_surat' => $isi_surat, 'ket' => $ket ,
		'tgl_surat_diterima' => $tgl_surat_diterima);
		}else{
			$data = array('no_surat' => $no_surat , 'tgl_surat' => $tgl_surat, 'asal_surat'=> $asal_surat
			, 'jenis_surat' => $jenis_surat, 'isi_surat' => $isi_surat, 'ket' => $ket ,
			'tgl_surat_diterima' => $tgl_surat_diterima, 'file' => $file);
		}
		
		$edit = $this->modelMasuk->editData('surat_masuk',$data,$id_surat);
		echo $this->db->last_query();

		if($edit > 0) {
			redirect('Admin/masuk');
		}else{
			echo 'gagal disimpan';
		}
	}














	public function insert_dinas()
	{
		$no_surat = $_POST['no_surat'];
		$tgl_keluar = $_POST['tgl_keluar'];
        $tahun=substr($tgl_keluar,0,4);
        $bulan = substr($tgl_keluar,5,2);
       if($bulan == '01'){ $bulan='januari';}
       if($bulan == '02'){$bulan='februari';}
       if($bulan == '03'){$bulan='maret';}
       if($bulan == '04'){ $bulan='april';}
       if($bulan == '05'){$bulan='mei'; }
       if($bulan == '06'){$bulan='juni'; }
       if($bulan == '07'){$bulan='juli';}
       if($bulan == '08'){$bulan='agustus';  }
       if($bulan == '09'){$bulan='september'; }
       if($bulan == '10'){$bulan='oktober';}
       if($bulan == '11'){$bulan='november'; }
       if($bulan == '12'){$bulan='desember'; }


		$tujuan_surat = $_POST['tujuan_surat'];
		$jenis_surat = $_POST['jenis_surat'];
		$isi_surat = $_POST['isi_surat'];
		$ket = $_POST['ket'];
		$file = $_FILES['file'];
		if($file=''){

		}else{
			$config['upload_path'] = './assets/foto';
			$config['allowed_types']='jpg|png|gif|jpeg|pdf|docx|doc';
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('file')){
				echo "gagal";
			}else{
				$file=$this->upload->data('file_name');
			}
		}
		$data = array('no_surat' => $no_surat , 'tgl_keluar' => $tgl_keluar, 'tujuan_surat'=> $tujuan_surat
		, 'jenis_surat' => $jenis_surat, 'isi_surat' => $isi_surat, 'ket' => $ket , 'bulan' => $bulan , 'file' => $file, 'tahun' => $tahun);
		$tambah = $this->modelDinas->tambahData('nota_dinas',$data);
		if($tambah > 0) {
			redirect('Admin/dinas');
		}else{
			echo 'gagal disimpan';
		}
	}

	public function delete_dinas($id_nota_dinas)
	{
		$hapus = $this ->modelDinas->hapusData('nota_dinas',$id_nota_dinas);
		if($hapus > 0) {
			redirect('Admin/dinas');
		}else{
			echo 'gagal disimpan';
		}
	}

	public function editDinas($id_nota_dinas)
	{
		$this ->data['dataEdit'] = $this -> modelDinas->dataEdit('nota_dinas',$id_nota_dinas);
		$this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/editDinas',$this -> data);
		$this->load->view('template/foot');
	}


	public function update_dinas($id_nota_dinas)
	{
		$no_surat = $_POST['no_surat'];
		$tgl_keluar = $_POST['tgl_keluar'];
		$tujuan_surat = $_POST['tujuan_surat'];
		$jenis_surat = $_POST['jenis_surat'];
		$isi_surat = $_POST['isi_surat'];
		$ket = $_POST['ket'];
		$file = $_FILES['file'];
		if($file=''){

		}else{
			$config['upload_path'] = './assets/foto';
			$config['allowed_types']='jpg|png|gif|jpeg|pdf|docx|doc';
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('file')){
				echo "gagal";
			}else{
				$file=$this->upload->data('file_name');
			}
		}
		if($file==''){
			$data = array('no_surat' => $no_surat , 'tgl_keluar' => $tgl_keluar, 'tujuan_surat'=> $tujuan_surat
			, 'jenis_surat' => $jenis_surat, 'isi_surat' => $isi_surat,  'ket' => $ket );
		}else{

		$data = array('no_surat' => $no_surat , 'tgl_keluar' => $tgl_keluar, 'tujuan_surat'=> $tujuan_surat
		, 'jenis_surat' => $jenis_surat, 'isi_surat' => $isi_surat,  'ket' => $ket , 'file' => $file);
		}
		$edit = $this->modelDinas->editData('nota_dinas',$data,$id_nota_dinas);
		echo $this->db->last_query();
		if($edit > 0) {
			redirect('Admin/dinas');
		}else{
			echo 'gagal disimpan';
		}
		
	}





}