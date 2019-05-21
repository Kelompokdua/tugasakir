<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class transaksi_model extends CI_Model {

    public function getAllrm()
{
    $query = $this->db->query("
    	SELECT rekam_medis.id_pelayanan,dokter.nama_dokter, pasien.nama_pasien, dokter.biaya as harga_dokter, (dokter.biaya+therapi.total_harga_obat) AS total_harga_semua FROM rekam_medis
INNER JOIN dokter on dokter.id_dokter = rekam_medis.id_dokter
INNER JOIN pasien on pasien.id_pasien = rekam_medis.id_pasien
INNER JOIN
(
    SELECT therapi.id_pelayanan, obat.nama, obat.harga_obat, SUM(obat.harga_obat) AS total_harga_obat FROM therapi 
    INNER JOIN obat on therapi.id_obat = obat.id_obat
)  therapi on therapi.id_pelayanan = rekam_medis.id_pelayanan
WHERE rekam_medis.status_farmasi='selesai' AND rekam_medis.status_transaksi ='pending'
");
            return $query->result();
}


}
