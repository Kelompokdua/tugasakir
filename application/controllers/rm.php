<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class rm extends CI_Controller {

    function __construct() {
         parent::__construct();
        if($this->session->userdata('logged_in')){
        	$session_data = $this->session->userdata('logged_in');
        	$data['username'] = $session_data['username'];
        	$data['level'] = $session_data['level'];
        }else{
        	redirect('login','refresh');
        }
        $this->load->model('rm_model','RM',true);
    }

    function index() {
        if ($this->session->userdata('logged_in')['poli'] == 'Gigi') {
             $data = array(
            'judul' => 'Halaman View Registras',
             'regis' => $this->RM->getgigi(),
             'pasien' => $this->RM->getAllPasien(),
             'obat' => $this->RM->getAllObat()
             );
        }else{
             $data = array(
            'judul' => 'Halaman View Registras',
             'regis' => $this->RM->getfulljoin(),
             'pasien' => $this->RM->getAllPasien(),
             'obat' => $this->RM->getAllObat(),
             );
        }
         $this->form_validation->set_rules('anamnesa', 'Anamnesa', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('rm/insert_rm',$data);
        }else{
                $this->RM->insertRM();
                redirect('rm/index','refresh');
            }
    }

     function edit($id)
    {
            
                $this->RM->updateRegis($id);
                redirect('rm/index','refresh');       
        

    }
}
