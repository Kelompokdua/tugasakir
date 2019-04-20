<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class poli extends CI_Controller {

    function __construct() {
        parent::__construct();
        if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
		}else{
			redirect('login','refresh');
		}
		$this->load->model('poli_model','PM',true);
    }

    function index() {
    	$data = array(
    		'judul' => 'Halaman poli',
    		 'poli' => $this->PM->getAllpoli()
    		 );
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('poli/indexpoli',$data);
    }

    function insert(){

		$this->form_validation->set_rules('nama', 'Nama Poli', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan Poli', 'trim|required');
		if ($this->form_validation->run()==FALSE) {
			 $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('poli/insertpoli');
		}else{
				$this->PM->insertPoli();
				redirect('poli/index','refresh');
			}
	}


	function edit($id)
	{
		$this->form_validation->set_rules('idpoli', 'ID Poli', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Poli', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan Poli', 'trim|required');
		$data['poli'] = $this->PM->getPoli($id);
        //$this->load->view('edit_profil', $data);

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('tampilan/atas');
			$this->load->view('tampilan/kiri');
			$this->load->view('poli/edit_poli', $data);
		}else {
			
				$this->PM->updatePoli($id);
				redirect('poli/index','refresh');		
		}

	}

	function hapus($id)
	{
		$this->form_validation->set_rules('idpoli', 'id Poli', 'trim|required');
		$data['poli'] = $this->PM->getPoli($id);
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('tampilan/atas');
			$this->load->view('tampilan/kiri');
			$this->load->view('poli/hapus_poli', $data);
		}else {
			$this->PM->deletePoli($id);		
			redirect('poli/index','refresh');			
		}		
	}
}
