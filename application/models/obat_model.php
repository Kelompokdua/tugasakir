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
        if($query->num_rows()>0){
            return $query->result();
        }
    }

     public function save($data)
    {
      $this->db->insert('obat', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_obat', $id);
        $this->db->delete('obat');
    }

    public function update($data)
    {
        $this->db->where('id_obat', $data['id_obat']);
        $this->db->update('obat', $data);
    }
}
        
