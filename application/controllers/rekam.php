<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class rekam extends CI_Controller {

    function __construct() {
        parent::__construct();
         if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
		}else{
			redirect('login','refresh');
		}
		$this->load->model('rekam_model','HM',true);
    }

    function index() {
        $data = array(
    		'judul' => 'Halaman Rekam',
    		 'rekam' => $this->HM->getsinglerekam()
    		 );
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('rekam/rekam_view',$data);
    }

    function index2($id) {
        $data = array(
            'judul' => 'Halaman Rekam Medis',
             'rekam' => $this->HM->getrekam($id)
             );
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('rekam/rekam_view_all',$data);
    }
}
