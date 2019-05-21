<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class obat_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getAllobat()
    {
        $query = $this->db->get('obat');
        return $query->result();
    }

     public function insertObat() {
    $data = array(
        'nama' => $this->input->post('nama'),
        'jenis_obat' => $this->input->post('jenis'),
        'harga_obat' => $this->input->post('harga')
        );
    $this->db->insert('obat', $data);
}

public function getObat($id)
{
    $this->db->where('id_obat', $id);
    $query = $this->db->get('obat');
    if($query->num_rows()>0){
        return $query->result();
    }
}

public function updateObat($id)
{
    $this->db->where('id_obat', $id);
    $data = array(
        'id_obat' => $this->input->post('idobat'),
        'nama' => $this->input->post('nama'),
          'jenis_obat' => $this->input->post('jenis'),
        'harga_obat' => $this->input->post('harga'));
    $this->db->update('obat', $data);

}

public function deleteObat($id)
    {
        $this->db->where('id_obat', $id);
        $this->db->delete('obat');
    }
}
        
