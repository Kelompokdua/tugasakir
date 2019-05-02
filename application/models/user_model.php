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
        $query = $this->db->get('login');
        if($query->num_rows()>0){
            return $query->result();
        }
    }

     public function getdokter()
    {
       $query = $this->db->get('dokter');
        if($query->num_rows()>0){
            return $query->result();
        }
        
    }

    public function getusercampurdokter()
        {
            $query = $this->db->query("SELECT * from login as u left join dokter as d on u.id_dokter = d.id_dokter ");
            return $query->result();
        }

    public function insertUser() {

    $data = array(
        'id_dokter' => $this->input->post('dokter'),
         'nama_pengguna' => $this->input->post('nama'),
        'username' => $this->input->post('username'),
        'password' => md5($this->input->post('password')),
        'level' => $this->input->post('level'));
    $this->db->insert('login', $data);
}

public function getUser($id)
{
    $this->db->where('id_login', $id);
    $query = $this->db->get('login');
    if($query->num_rows()>0){
        return $query->result();
    }
}

public function updateUser($id)
{
    $this->db->where('id_login', $id);
    $data = array(
        'id_login' => $this->input->post('login'),
        'id_dokter' => $this->input->post('dokter'),
         'nama_pengguna' => $this->input->post('nama'),
        'username' => $this->input->post('username'),
        'password' => md5($this->input->post('password')),
        'level' => $this->input->post('level'));
    $this->db->update('login', $data);

}

public function deleteUser($id)
    {
        $this->db->where('id_login', $id);
        $this->db->delete('login');
    }
}
        
