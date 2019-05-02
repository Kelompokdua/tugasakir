<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class registrasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        if($this->session->userdata('logged_in')){
        	$session_data = $this->session->userdata('logged_in');
        	$data['username'] = $session_data['username'];
        	$data['level'] = $session_data['level'];
        }else{
        	redirect('login','refresh');
        }
        $this->load->model('regis_model','RM',true);
    }

    function index() {
         $data = array(
            'judul' => 'Halaman View Registras',
             'regis' => $this->RM->getfulljoin()
             );
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('regis/regis_view',$data);
    }

     function insert(){
        $data = array(
             'poli' => $this->RM->getAllPoli(),
             'login' => $this->RM->getAllLogin(),
             'pasien' => $this->RM->getAllPasien(),

             );
        $this->form_validation->set_rules('idpasien', 'ID pasien', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('regis/insert_regis',$data);
        }else{
                $this->RM->insertRegis();
                redirect('registrasi/index','refresh');
            }
    }


    function edit($id)
    {
            
                $this->RM->updateRegis($id);
                redirect('registrasi/index','refresh');       
        

    }

    function hapus($id)
    {
        $this->form_validation->set_rules('idregis', 'ID Registrasi', 'trim|required');
        $data['regis'] = $this->RM->getRegis($id);
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('tampilan/atas');
            $this->load->view('tampilan/kiri');
            $this->load->view('regis/hapus_regis', $data);
        }else {
            $this->RM->deleteRegis($id);     
            redirect('registrasi/index','refresh');           
        }       
    }
}
