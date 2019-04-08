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
    	$this->db->where('status','belum verifikasi');
        $this->db->order_by("id_pengobatan","desc");
        $query = $this->db->get('pengobatan');
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function save($data)
    {
      $this->db->insert('pengobatan', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_pengobatan', $id);
        $this->db->delete('pengobatan');
    }

    public function update($data)
    {
        $this->db->where('id_pengobatan', $data['id_pengobatan']);
        $this->db->update('pengobatan', $data);
    }
}




