<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class transaksi_model extends CI_Model {

    public function getAllrm()
{
    $query = $this->db->query("
    	SELECT rekam_medis.id_pelayanan,dokter.nama_dokter, pasien.nama_pasien,pasien.status_pasien,dokter.biaya as harga_dokter, therapi.total_harga_obat, (dokter.biaya+therapi.total_harga_obat) AS total_harga_semua FROM rekam_medis
LEFT JOIN dokter on dokter.id_dokter = rekam_medis.id_dokter
LEFT JOIN pasien on pasien.id_pasien = rekam_medis.id_pasien
LEFT JOIN
(
    SELECT therapi.id_pelayanan, SUM(obat.harga_obat) AS total_harga_obat FROM therapi
    INNER JOIN obat on therapi.id_obat = obat.id_obat
    GROUP BY therapi.id_pelayanan
) therapi on therapi.id_pelayanan = rekam_medis.id_pelayanan
WHERE rekam_medis.status_farmasi='pending' && rekam_medis.status_transaksi='pending'
");
            return $query->result();
}

public function updateTrans($id)
{
    $this->db->where('id_pelayanan', $id);
    $data = array(
        'status_transaksi' => 'selesai');
    $this->db->update('rekam_medis', $data);

}


}
