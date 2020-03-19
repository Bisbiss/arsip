<?php
Class Cetak extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    function cetak_masuk(){
        $bulan = strtoupper($_POST['bulan']) ;
        $tahun = $_POST['tahun'];
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',14);
        // mencetak string 
        $pdf->Cell(190,7,'',0,1,'C');
        $pdf->Cell(190,7,'',0,1,'C');
        $pdf->Cell(190,7,'LAPORAN SURAT MASUK BULAN '.$bulan.' '.$tahun,0,1,'C');
        $pdf->SetFont('Arial','B',9);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25,6,'No. Surat',1,0,'C');
        $pdf->Cell(35,6,'Tanggal Masuk',1,0,'C');
        $pdf->Cell(35,6,'Tanggal Diterima',1,0,'C');
        $pdf->Cell(55,6,'Asal Surat',1,0,'C');
        $pdf->Cell(40,6,'Jenis Surat',1,1,'C');
        $pdf->SetFont('Arial','',9);
        $this->db->where('bulan',$bulan);
        $this->db->where('tahun',$tahun);
        $mahasiswa = $this->db->get('surat_masuk')->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(25,6,$row->no_surat,1,0);
            $pdf->Cell(35,6,$row->tgl_surat,1,0);
            $pdf->Cell(35,6,$row->tgl_surat_diterima,1,0);
            $pdf->Cell(55,6,$row->asal_surat,1,0);
            $pdf->Cell(40,6,$row->jenis_surat,1,1); 
        }
        $pdf->Cell(0,10,'',0,1);
        $pdf->Cell(140,0,'',0,0);
        $pdf->Cell(0,10,'Tebing tinggi,  '.strtolower($bulan).' '.$tahun,0,1);
        $pdf->Cell(0,0,'Kepala seksi tindak pidana khusus',0,1,'R');
        $pdf->Cell(0,10,'',0,1);
        $pdf->Cell(0,10,'',0,1);
        $pdf->Cell(145,10,'',0,0);
        $pdf->Cell(0,10,'AHMAD SAZILI,S.H.,M.H.',0,1);
        $pdf->Cell(0,0,'Jaksa Muda NIP.198411252002121 002',0,0,'R');
        $pdf->Output();
    }


    function masuk(){
        $this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/cetak_masuk');
		$this->load->view('template/foot');
    }








    function cetak_keluar(){
        $bulan = strtoupper($_POST['bulan']) ;
        $tahun = $_POST['tahun'];
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',14);
        // mencetak string 
        $pdf->Cell(190,7,'',0,1,'C');
        $pdf->Cell(190,7,'',0,1,'C');
        $pdf->Cell(190,7,'LAPORAN SURAT KELUAR BULAN '.$bulan.' '.$tahun,0,1,'C');
        $pdf->SetFont('Arial','B',9);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25,6,'No. Surat',1,0,'C');
        $pdf->Cell(35,6,'Tanggal Keluar',1,0,'C');
        $pdf->Cell(35,6,'Tujuan Surat',1,0,'C');
        $pdf->Cell(55,6,'Isi Surat',1,0,'C');
        $pdf->Cell(40,6,'Jenis Surat',1,1,'C');
        $pdf->SetFont('Arial','',9);
        $this->db->where('bulan',$bulan);
         $this->db->where('tahun',$tahun);
        $mahasiswa = $this->db->get('surat_keluar')->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(25,6,$row->no_surat,1,0);
            $pdf->Cell(35,6,$row->tgl_surat,1,0);
            $pdf->Cell(35,6,$row->tujuan_surat,1,0);
            $pdf->Cell(55,6,$row->isi_surat,1,0);
            $pdf->Cell(40,6,$row->jenis_surat,1,1); 
        }
        $pdf->Cell(0,10,'',0,1);
        $pdf->Cell(140,0,'',0,0);
        $pdf->Cell(0,10,'Tebing tinggi,  '.strtolower($bulan).' '.$tahun,0,1);
        $pdf->Cell(0,0,'Kepala seksi tindak pidana khusus',0,1,'R');
        $pdf->Cell(0,10,'',0,1);
        $pdf->Cell(0,10,'',0,1);
        $pdf->Cell(145,10,'',0,0);
        $pdf->Cell(0,10,'AHMAD SAZILI,S.H.,M.H.',0,1);
        $pdf->Cell(0,0,'Jaksa Muda NIP.198411252002121 002',0,0,'R');
        $pdf->Output();
    }


    function keluar(){
        $this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/cetak_keluar');
		$this->load->view('template/foot');
    }



function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
 








    function cetak_dinas(){
        $bulan = strtoupper($_POST['bulan']) ;
        $tahun = $_POST['tahun'];
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',14);
        // mencetak string 
        $pdf->Cell(190,7,'',0,1,'C');
        $pdf->Cell(190,7,'',0,1,'C');
        $pdf->Cell(190,7,'LAPORAN NOTA DINAS BULAN '.$bulan.' '.$tahun,0,1,'C');
        $pdf->SetFont('Arial','B',9);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25,6,'No. Surat',1,0,'C');
        $pdf->Cell(35,6,'Tanggal Keluar',1,0,'C');
        $pdf->Cell(35,6,'Tujuan Surat',1,0,'C');
        $pdf->Cell(55,6,'Isi Surat',1,0,'C');
        $pdf->Cell(40,6,'Jenis Surat',1,1,'C');
        $pdf->SetFont('Arial','',9);
        $this->db->where('bulan',$bulan);
         $this->db->where('tahun',$tahun);
        $mahasiswa = $this->db->get('nota_dinas')->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(25,6,$row->no_surat,1,0);
            $pdf->Cell(35,6,$row->tgl_keluar,1,0);
            $pdf->Cell(35,6,$row->tujuan_surat,1,0);
            $pdf->Cell(55,6,$row->isi_surat,1,0);
            $pdf->Cell(40,6,$row->jenis_surat,1,1); 
        }
        $pdf->Cell(0,10,'',0,1);
        $pdf->Cell(140,0,'',0,0);
        $pdf->Cell(0,10,'Tebing tinggi,  '.strtolower($bulan).' '.$tahun,0,1);
        $pdf->Cell(0,0,'Kepala seksi tindak pidana khusus',0,1,'R');
        $pdf->Cell(0,10,'',0,1);
        $pdf->Cell(0,10,'',0,1);
        $pdf->Cell(145,10,'',0,0);
        $pdf->Cell(0,10,'AHMAD SAZILI,S.H.,M.H.',0,1);
        $pdf->Cell(0,0,'Jaksa Muda NIP.198411252002121 002',0,0,'R');
        $pdf->Output();
    }


    function dinas(){
        $this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/cetak_dinas');
		$this->load->view('template/foot');
    }











    function cetak_master(){
        $bulan = strtoupper($_POST['bulan']) ;
        $tahun = $_POST['tahun'];
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',14);
        // mencetak string 
        $pdf->Cell(190,7,'',0,1,'C');
        $pdf->Cell(190,7,'',0,1,'C');
        $pdf->Cell(190,7,'LAPORAN BERKAS MASTER BULAN '.$bulan.' '.$tahun,0,1,'C');
        $pdf->SetFont('Arial','B',9);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(40,6,'Jenis Berkas',1,0,'C');
        $pdf->Cell(35,6,'Tanggal Masuk',1,0,'C');
        $pdf->Cell(45,6,'Nama Berkas',1,0,'C');
        $pdf->Cell(70,6,'Isi Berkas',1,1,'C');
        $pdf->SetFont('Arial','',9);
        $this->db->where('bulan',$bulan);
         $this->db->where('tahun',$tahun);
        $mahasiswa = $this->db->get('data_master')->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(40,6,$row->jenis_berkas,1,0);
            $pdf->Cell(35,6,$row->tgl_input,1,0);
            $pdf->Cell(45,6,$row->nama_berkas,1,0);
            $pdf->Cell(70,6,$row->isi_berkas,1,0);
        }
        $pdf->Cell(0,10,'',0,1);
        $pdf->Cell(140,0,'',0,0);
        $pdf->Cell(0,10,'Tebing tinggi,  '.strtolower($bulan).' '.$tahun,0,1);
        $pdf->Cell(0,0,'Kepala seksi tindak pidana khusus',0,1,'R');
        $pdf->Cell(0,10,'',0,1);
        $pdf->Cell(0,10,'',0,1);
        $pdf->Cell(145,10,'',0,0);
        $pdf->Cell(0,10,'AHMAD SAZILI,S.H.,M.H.',0,1);
        $pdf->Cell(0,0,'Jaksa Muda NIP.198411252002121 002',0,0,'R');
        $pdf->Output();
    }


    function master(){
        $this->load->view('template/head');
		$this->load->view('template/menu');
		$this->load->view('Admin/cetak_master');
		$this->load->view('template/foot');
    }


}