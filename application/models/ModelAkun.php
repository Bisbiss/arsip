<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAkun extends CI_Model{
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

public function editData($tabel_name,$data,$id_user)
{
    $this ->db->where('id_user',$id_user);
    $edit = $this->db->update($tabel_name,$data);
    return $edit;
}

public function dataEdit($tabel_name,$id_user)
{
    $this ->db->where('id_user',$id_user);
    $get_user = $this->db->get($tabel_name);
    return $get_user->row();
}


public function hapusData($tabel_name,$id_user)
{
    $this ->db->where('id_user',$id_user);
    $hapus = $this->db->delete($tabel_name);
    return $hapus;
}

}