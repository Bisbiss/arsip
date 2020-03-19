<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('ModelMaster');
		if($this->session->userdata('status') != 'login'){
			redirect(base_url("Welcome"));
		}
	}

	public function index()
	{
		$this->data['hasil3'] = $this->ModelMaster->getUser('data_master');
		$this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/master', $this->data);
		$this->load->view('template/foot');
	}

    public function tambahMaster()
	{
		$this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/tambahMaster');
		$this->load->view('template/foot');
	}

    public function insert_master()
	{
		$tgl_input = $_POST['tgl_input'];
        $bulan = substr($tgl_input,5,2);
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
        $tahun=substr($tgl_input,0,4);
		$jenis_berkas = $_POST['jenis_berkas'];
		$isi = $_POST['isi'];
        $nama_berkas = $_POST['nama_berkas'];
		$file = $_FILES['file'];
        // echo $jenis_berkas;
		if($file=''){

		}else{
			$config['upload_path'] = './assets/foto';
			$config['allowed_types']='jpg|png|gif|jpeg';
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('file')){
				echo "gagal";
			}else{
				$file=$this->upload->data('file_name');
			}
		}
		$data = array(
            'tgl_input' => $tgl_input,
            'jenis_berkas' => $jenis_berkas,
            'isi_berkas' => $isi,
            'nama_berkas' => $nama_berkas ,
            'file' => $file,
            'bulan' => $bulan,
            'tahun' => $tahun);
		$tambah = $this->ModelMaster->tambahData('data_master',$data);
		if($tambah > 0) {
			redirect('Master');
		}else{
			echo 'gagal disimpan';
		}
	}

    public function editMaster($id_berkas)
	{
		$this ->data['dataEdit'] = $this -> ModelMaster->dataEdit('data_master',$id_berkas);
		$this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/editMaster',$this -> data);
		$this->load->view('template/foot');
	}

    public function update_master($id_berkas)
	{
		$tgl_input = $_POST['tgl_input'];
		$jenis_berkas = $_POST['jenis_berkas'];
		$isi = $_POST['isi'];
        $nama_berkas = $_POST['nama_berkas'];
		$file = $_FILES['file'];
        // echo $jenis_berkas;
		if($file=''){

		}else{
			$config['upload_path'] = './assets/foto';
			$config['allowed_types']='jpg|png|gif|jpeg';
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('file')){
				echo "gagal";
			}else{
				$file=$this->upload->data('file_name');
			}
		}
		if($file==''){
			$data = array(
            'tgl_input' => $tgl_input,
            'jenis_berkas' => $jenis_berkas,
            'isi_berkas' => $isi,
            'nama_berkas' => $nama_berkas);
		}else{

		$data = array('tgl_input' => $tgl_input,
            'jenis_berkas' => $jenis_berkas,
            'isi_berkas' => $isi,
            'nama_berkas' => $nama_berkas ,
            'file' => $file);
		}
		$edit = $this->ModelMaster->editData('data_master',$data,$id_berkas);
		echo $this->db->last_query();
		if($edit > 0) {
			redirect('Master');
		}else{
			echo 'gagal disimpan';
		}
		
	}
    public function delete_master($id_berkas)
	{
		$hapus = $this ->ModelMaster->hapusData('data_master',$id_berkas);
		if($hapus > 0) {
			redirect('Master');
		}else{
			echo 'gagal disimpan';
		}
	}
}