<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Model {

	function __construct() {
        parent::__construct();
    }
    public $tb = 'login';

    public function login($username,$password){
    	$this->db->select('id_login,username,password,level');
    	$this->db->from('login');
    	$this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->where('level', $username);
    	$query = $this->db->get();
    	if($query->num_rows()==1){
    		return $query->result();
    	}else{
    		return false;
    	}
    }

    public function cekL($param)
    {
        $query = $this->db->get_where($this->tb,$param);
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }
    }

    
}
        
?>