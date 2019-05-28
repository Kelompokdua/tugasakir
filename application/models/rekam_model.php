<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class rekam_model extends CI_Model {

    public function getsinglerekam()
        {
            $query = $this->db->query("SELECT *
FROM rekam_medis
INNER JOIN pasien on pasien.id_pasien = rekam_medis.id_pasien
INNER JOIN dokter on dokter.id_dokter = rekam_medis.id_dokter
WHERE rekam_medis.status_farmasi ='selesai' AND rekam_medis.status_transaksi = 'selesai' group by pasien.id_pasien");
            return $query->result();
        }

     public function getrekam($id)
        {
            $query = $this->db->query("SELECT *
FROM rekam_medis
INNER JOIN pasien on pasien.id_pasien = rekam_medis.id_pasien
INNER JOIN dokter on dokter.id_dokter = rekam_medis.id_dokter
WHERE rekam_medis.status_farmasi ='selesai' AND rekam_medis.status_transaksi = 'selesai' AND rekam_medis.id_pasien = '$id' order by tanggal DESC ");
            return $query->result();
        }

    function DetailData($idpelayanan){
        // $this->db->where('id_pelayanan',$idpelayanan);
        // $this->db->from('rekam_medis');
        // $this->db->join('pasien', 'rekam_medis.id_pasien = pasien.id_pasien');
        //  $this->db->join('dokter', 'rekam_medis.id_dokter = dokter.id_dokter');
        //  $this->db->join('therapi', 'rekam_medis.id_pelayanan = therapi.id_pelayanan');
        // $sql=$this->db->get();
        // if($sql->num_rows()==1){
        //     return $sql->row_array();
        // }

        $result = $this->db->query("SELECT t.id_therapi, t.id_obat, o.nama, o.jenis_obat, o.harga_obat, rk.*, pas.nama_pasien, d.nama_dokter, d.biaya FROM therapi AS t, rekam_medis AS rk, obat AS o, pasien AS pas, dokter AS d WHERE t.id_pelayanan = rk.id_pelayanan AND t.id_obat = o.id_obat AND pas.id_pasien = rk.id_pasien AND d.id_dokter = rk.id_dokter AND rk.id_pelayanan = $idpelayanan")->row_array();

        return $result;
    }

}
