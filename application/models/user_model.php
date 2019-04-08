<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model {
     public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getAlluser()
    {
        $query = $this->db->get('user');
        if($query->num_rows()>0){
            return $query->result();
        }
    }

     public function save($data)
    {
      $this->db->insert('user', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('user', $data);
    }
}
        
