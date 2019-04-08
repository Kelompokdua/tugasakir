<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kelir_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getkel()
    {
        $this->db->where('status','verifikasi');
    	$query = $this->db->get('pengobatan');
        if($query->num_rows()>0){
            return $query->result();
        }
    }
}
