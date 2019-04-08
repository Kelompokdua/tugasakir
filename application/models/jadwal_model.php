<?php

class Jadwal_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function spesific($param)
    {
        $data = $this->db->get_where('jadwal',$param);
        if($data->num_rows() > 0){
            return $data->result();
        }else{
            $data = array('none');
            return $data;
        }
    }   

    public function getAlljadwal()
    {
        $query = $this->db->get('jadwal','user');
        if($query->num_rows()>0){
            return $query->result();
        }
    }

     public function save($data)
    {
      $this->db->insert('jadwal', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_jadwal', $id);
        $this->db->delete('jadwal');
    }

    public function update($data)
    {
        $this->db->where('id_jadwal', $data['id_jadwal']);
        $this->db->update('jadwal', $data);
    }

    public function getLogin()
    {
    	$query = $this->db->get('user');
        if($query->num_rows()>0){
            return $query->result();
        }
    }
}