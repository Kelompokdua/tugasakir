<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class verif_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getAllverif()
    {
    	    $query = $this->db->query("
        SELECT * FROM rekam_medis
INNER JOIN dokter on dokter.id_dokter = rekam_medis.id_dokter
INNER JOIN pasien on pasien.id_pasien = rekam_medis.id_pasien
WHERE rekam_medis.status_transaksi='selesai' AND rekam_medis.status_farmasi='pending' order by tanggal ASC
");
            return $query->result();
    }

    public function updateVerif($id)
{
    $this->db->where('id_pelayanan', $id);
    $data = array(
        'status_farmasi' => 'selesai');
    $this->db->update('rekam_medis', $data);

}

public function updateVerif1($id)
{
    $this->db->where('id_pelayanan', $id);
    $data = array(
        'status_farmasi' => 'selesai',
        'status_transaksi' => 'selesai');
    $this->db->update('rekam_medis', $data);

}

public function getVerif($id)
{
    $this->db->where('id_pelayanan', $id);
    $query = $this->db->get('rekam_medis');
    if($query->num_rows()>0){
        return $query->result();
    }
}
   
}




