<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class pasien_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    function DetailData($idpasien){
        $this->db->where('id_pasien',$idpasien);
        $sql=$this->db->get('pasien');
        if($sql->num_rows()==1){
            return $sql->row_array();
        }   
        
    }

    public function getdetailpelayanan ($id) {
        $query = $this->db->query("SELECT rekam_medis.tanggal,rekam_medis.id_pelayanan,dokter.nama_dokter, pasien.nama_pasien, dokter.biaya as harga_dokter, therapi.total_harga_obat, (dokter.biaya+therapi.total_harga_obat) AS total_harga_semua FROM rekam_medis
LEFT JOIN dokter on dokter.id_dokter = rekam_medis.id_dokter
LEFT JOIN pasien on pasien.id_pasien = rekam_medis.id_pasien
LEFT JOIN
(
    SELECT therapi.id_pelayanan, SUM(obat.harga_obat) AS total_harga_obat FROM therapi
    INNER JOIN obat on therapi.id_obat = obat.id_obat
    GROUP BY therapi.id_pelayanan
) therapi on therapi.id_pelayanan = rekam_medis.id_pelayanan
WHERE rekam_medis.id_pelayanan = $id LIMIT 1");
        return $query->row();
    }

    public function getdaftartherapi($id)
    {
       $query = $this->db->query("
        SELECT * FROM therapi
    INNER JOIN obat on therapi.id_obat = obat.id_obat
    WHERE id_pelayanan = $id
");
            return $query->result();
    }




    public function getAllpasien()
    {
        $query = $this->db->get('pasien');
        return $query->result();
    }

     public function insertPasien() {

    $data = array(
        'nama_pasien' => $this->input->post('nama'),
        'alamat' => $this->input->post('alamat'),
        'jenis_kelamin' => $this->input->post('jeniskelamin'),
        'tgl_lahir' => $this->input->post('tgllahir'),
        'telp' => $this->input->post('telp'),
        'divisi' => $this->input->post('divisi'),
        'departemen' => $this->input->post('departemen'),
        'sub_departemen' => $this->input->post('sub_departemen'),
        'status' => $this->input->post('status'),
        'status_pasien' => $this->input->post('status_pasien'),
        );
    $this->db->insert('pasien', $data);
}

public function getPasien($id)
{
    $this->db->where('id_pasien', $id);
    $query = $this->db->get('pasien');
    if($query->num_rows()>0){
        return $query->result();
    }
}

public function updatePasien($id)
{
    $this->db->where('id_pasien', $id);
    $data = array(
        'id_pasien' => $this->input->post('idpasien'),
        'nama_pasien' => $this->input->post('nama'),
        'alamat' => $this->input->post('alamat'),
        'jenis_kelamin' => $this->input->post('jeniskelamin'),
        'tgl_lahir' => $this->input->post('tgllahir'),
        'telp' => $this->input->post('telp'),
        'divisi' => $this->input->post('divisi'),
        'departemen' => $this->input->post('departemen'),
        'sub_departemen' => $this->input->post('sub_departemen'),
        'status' => $this->input->post('status'),
        'status_pasien' => $this->input->post('status_pasien')
        );
    $this->db->update('pasien', $data);

}

public function deletePasien($id)
    {
        $this->db->where('id_pasien', $id);
        $this->db->delete('pasien');
    }
}
