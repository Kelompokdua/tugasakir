<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

    function __construct() {
        parent::__construct();
        if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
            $data['level'] = $session_data['level'];
		}else{
			redirect('login','refresh');
		}
    }

    function index() {
    	$data = array(
    		'judul' => 'Halaman utama',
    		 );
    	 $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
        $this->load->view('index',$data);
    }
}
        
