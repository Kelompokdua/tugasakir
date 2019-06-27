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
WHERE rekam_medis.status_farmasi ='selesai' AND rekam_medis.status_transaksi = 'selesai' AND rekam_medis.id_pasien = '$id' AND rekam_medis.poli = 'Umum' order by tanggal DESC ");
            return $query->result();
        }

        public function getrekamgigi($id)
        {
            $query = $this->db->query("SELECT *
FROM rekam_medis
INNER JOIN pasien on pasien.id_pasien = rekam_medis.id_pasien
INNER JOIN dokter on dokter.id_dokter = rekam_medis.id_dokter
WHERE rekam_medis.status_farmasi ='selesai' AND rekam_medis.status_transaksi = 'selesai' AND rekam_medis.id_pasien = '$id' AND rekam_medis.poli = 'Gigi' order by tanggal DESC ");
            return $query->result();
        }

        public function getrekamkia($id)
        {
            $query = $this->db->query("SELECT *
FROM rekam_medis
INNER JOIN pasien on pasien.id_pasien = rekam_medis.id_pasien
INNER JOIN dokter on dokter.id_dokter = rekam_medis.id_dokter
WHERE rekam_medis.status_farmasi ='selesai' AND rekam_medis.status_transaksi = 'selesai' AND rekam_medis.id_pasien = '$id' AND rekam_medis.poli = 'Kesehatan anak dan ibu' order by tanggal DESC ");
            return $query->result();
        }

        function DetailData($idpelayanan){
            $result = $this->db->query("SELECT t.id_therapi, t.id_obat, o.nama, o.jenis_obat, o.harga_obat, rk.*, pas.nama_pasien, d.nama_dokter, d.biaya FROM therapi AS t, rekam_medis AS rk, obat AS o, pasien AS pas, dokter AS d WHERE t.id_pelayanan = rk.id_pelayanan AND t.id_obat = o.id_obat AND pas.id_pasien = rk.id_pasien AND d.id_dokter = rk.id_dokter AND rk.id_pelayanan = $idpelayanan")->result();
        return $result;
        
    }

}
