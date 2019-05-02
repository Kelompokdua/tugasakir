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
