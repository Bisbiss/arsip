<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
class ModelKeluar extends CI_Model{
    private $_table = "surat_keluar";
    public $id_sk;
    public $no_surat;
    public $tgl_surat;
    public $tujuan_surat;
    public $jenis_surat;
    public $isi_surat;
    public $ket;
    public $bulan;
    public $file ="default.jpg";

public function getALL(){
    return $this->db->get($this->_table)->result();
}

public function getById()
{
    return $this->db->get_where($this->_table,["id_sk => $id_sk"])-> row();
}

public function save()
{
    $post = $this->input->post();
    $this->id_sk = uniqid();
    $this->no_surat = $post ["no_surat"];
    $this->tgl_surat = $post ["tgl_surat"];
    $this->tujuan_surat = $post ["tujuan_surat"];
    $this->jenis_surat = $post ["jenis_surat"];
    $this->isi_surat = $post ["isi_surat"];
    $this->ket = $post ["ket"];
    $this->bulan = $post ["bulan"];
    $this->db->insert($this->_table,$this);

}

public function update()
{
    $post = $this->input->post();
    $this->id_sk = $post ["id_sk"];
    $this->no_surat = $post ["no_surat"];
    $this->tgl_surat = $post ["tgl_surat"];
    $this->tujuan_surat = $post ["tujuan_surat"];
    $this->jenis_surat = $post ["jenis_surat"];
    $this->isi_surat = $post ["isi_surat"];
    $this->ket = $post ["ket"];
    $this->bulan = $post ["bulan"];
    $this->db->update($this->_table,$this, array('id_sk' => $post['id_sk']));

}

public function delete()
{
    $this->db->delete($this->_table, array("id_sk" => $id_sk ));

}



}

*/

class ModelKeluar extends CI_Model{
public function getUser($tabel_name)
{
    $get_user = $this->db->get($tabel_name);
    return $get_user->result_array();
}


public function tambahData($tabel_name,$data)
{
    $tambah = $this->db->insert($tabel_name,$data);
    return $tambah;
}

public function editData($tabel_name,$data,$id_sk)
{
    $this ->db->where('id_sk',$id_sk);
    $edit = $this->db->update($tabel_name,$data);
    return $edit;
}

public function dataEdit($tabel_name,$id_sk)
{
    $this ->db->where('id_sk',$id_sk);
    $get_user = $this->db->get($tabel_name);
    return $get_user->row();
}


public function hapusData($tabel_name,$id_sk)
{
    $this ->db->where('id_sk',$id_sk);
    $hapus = $this->db->delete($tabel_name);
    return $hapus;
}

}