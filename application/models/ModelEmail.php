<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelEmail extends CI_Model{

    public function cek()
    {
        return $this->db->get("email")->num_rows();
    }

    public function tambah($tabel_name,$data)
    {
        $tambah = $this->db->insert($tabel_name,$data);
        return $tambah;
    }

    public function edit($data)
    {
        return $this->db->get($data)->result_array();
    }

    public function editData($tabel_name,$array)
    {
        // $this ->db->where('id_email',$id);
        $edit = $this->db->update($tabel_name,$array);
        return $edit;
    }
}