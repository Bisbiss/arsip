<?php
class K_grafik extends CI_Model{
    function get_data_stok(){


        $query = $this->db->query("select distinct bulan,
        (select count(id_surat) from surat_masuk where bulan='januari') as januari,
        (select count(id_surat) from surat_masuk where bulan='februari') as februari,
        (select count(id_surat) from surat_masuk where bulan='maret') as maret,
        (select count(id_surat) from surat_masuk where bulan='april') as april,
        (select count(id_surat) from surat_masuk where bulan='mei') as mei,
        (select count(id_surat) from surat_masuk where bulan='juni') as juni,
        (select count(id_surat) from surat_masuk where bulan='juli') as juli,
        (select count(id_surat) from surat_masuk where bulan='agustus') as agustus,
        (select count(id_surat) from surat_masuk where bulan='september') as september,
        (select count(id_surat) from surat_masuk where bulan='oktober') as oktober,
        (select count(id_surat) from surat_masuk where bulan='november') as november,
        (select count(id_surat) from surat_masuk where bulan='desember') as desember
        from surat_masuk"); 
       /* $query = $this->db->query("SELECT bulan,no_surat AS jumlah FROM surat_keluar GROUP by bulan"); */
        if($query->num_rows() > 0){
            foreach($query->result() as $data2){
                $hasil[] = $data2;
            }
            return $hasil;
        }
    }
 
}