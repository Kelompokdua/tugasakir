<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class dokter_model extends CI_Model {
	  public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getAlldokter()
    {
        $query = $this->db->get('dokter');
        return $query->result();
    }
    public function getAllpoli()
    {
        $query = $this->db->get('poli');
        return $query->result();
    }

     public function insertDokter() {

    $data = array(
        'nama_dokter' => $this->input->post('nama'),
        'poli' => $this->input->post('poli'),
        'biaya' => $this->input->post('biaya')
        );
    $this->db->insert('dokter', $data);
}

public function getDokter($id)
{
    $this->db->where('id_dokter', $id);
    $query = $this->db->get('dokter');
    if($query->num_rows()>0){
        return $query->result();
    }
}

public function updateDokter($id)
{
    $this->db->where('id_dokter', $id);
    $data = array(
        'id_dokter' => $this->input->post('iddokter'),
        'nama_dokter' => $this->input->post('nama'),
          'poli' => $this->input->post('poli'),
        'biaya' => $this->input->post('biaya'));
    $this->db->update('dokter', $data);

}

public function deleteDokter($id)
    {
        $this->db->where('id_dokter', $id);
        $this->db->delete('dokter');
    }
    
}
