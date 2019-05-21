<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class transaksi extends CI_Controller {

    function __construct() {
        parent::__construct();
        if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
		}else{
			redirect('login','refresh');
		}
		$this->load->model('transaksi_model','TM',true);
    }

    function index() {
        $data = array(
    		'judul' => 'Halaman transaksi',
    		 'rm' => $this->TM->getAllrm()
    		 );
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('transaksi/transaksi_index',$data);
    }
}
