<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class poli_model extends CI_Model {
     public function __construct()
   {
    parent::__construct();
        //Do your magic here
}

public function getAllpoli()
{
    $query = $this->db->get('poli');//dari database,get(mengambil) semua record di tabel poli
        return $query->result();
}

public function insertPoli() {

    $data = array(
        'nama' => $this->input->post('nama'),
    	 'keterangan' => $this->input->post('keterangan'));
    $this->db->insert('poli', $data);
}

public function getPoli($id)
{
    $this->db->where('id_poli', $id);
    $query = $this->db->get('poli');
    if($query->num_rows()>0){
        return $query->result();
    }
}

public function updatePoli($id)
{
    $this->db->where('id_poli', $id);
    $data = array(
        'id_poli' => $this->input->post('idpoli'),
        'nama' => $this->input->post('nama'),
    	 'keterangan' => $this->input->post('keterangan'));
    $this->db->update('poli', $data);

}

public function deletePoli($id)
    {
        $this->db->where('id_poli', $id);
        $this->db->delete('poli');
    }
}
