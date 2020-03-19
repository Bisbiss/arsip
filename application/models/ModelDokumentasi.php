<?php
class ModelDokumentasi extends CI_Model{
    function get_data($tabel_name){
        $get_user = $this->db->get($tabel_name);
        return $get_user->result_array();
    }

    public function tambah($tabel_name,$data)
    {
        $tambah = $this->db->insert($tabel_name,$data);
        return $tambah;
    }

    public function hapus($tabel_name,$id_galeri)
    {
        $this ->db->where('id_galeri',$id_galeri);
        $hapus = $this->db->delete($tabel_name);
        return $hapus;
    }

}