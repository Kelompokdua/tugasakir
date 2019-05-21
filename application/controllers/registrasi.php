<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class registrasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        if($this->session->userdata('logged_in')){
        	$session_data = $this->session->userdata('logged_in');
        	$data['username'] = $session_data['username'];
        	$data['level'] = $session_data['level'];
            $data['poli'] = $session_data['poli'];
        }else{
        	redirect('login','refresh');
        }
        $this->load->model('regis_model','RM',true);
        $this->load->model('rm_model','RMM',true);
    }

    function index() {
        if ($this->session->userdata('logged_in')['poli'] == 'Gigi') {
             $data = array(
            'judul' => 'Halaman View Registrasi',
             'regis' => $this->RM->getgigi()
             );
        }else if($this->session->userdata('logged_in')['poli'] == 'Kesehatan anak dan ibu'){
             $data = array(
            'judul' => 'Halaman View Registrasi',
             'regis' => $this->RM->getfulljoin()
             );
        }else{
             $data = array(
            'judul' => 'Halaman View Registrasi',
             'regis' => $this->RM->getumum()
             );
        }

        
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('regis/regis_view',$data);
    }

     function insert(){
        $data = array(
             'poli' => $this->RM->getAllPoli(),
             'pasien' => $this->RM->getAllPasien(),

             );
        $this->form_validation->set_rules('idpasien', 'ID pasien', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('regis/insert_regis',$data);
        }else{
                $this->RM->insertRegis();
                redirect('home','refresh');
            }
    }


    function edit($id)
    {
        $this->form_validation->set_rules('idpasien', 'ID Obat', 'trim|required');
        $this->form_validation->set_rules('anamnesa', 'Anamnesa', 'trim|required');
        $data['regis'] = $this->RM->getRegis($id);
        $data = array(
             'regis' => $this->RM->getRegis($id),
             'obat' => $this->RM->getAllObat(),
             );
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('tampilan/atas');
            $this->load->view('tampilan/kiri');
            $this->load->view('rm/insert_rm', $data);
        }else {
                $this->RM->updateRegis($id);
                $this->RMM->insertRM();
                redirect('registrasi/index','refresh');             
        }
                // $this->RM->updateRegis($id);
                // redirect('registrasi/index','refresh');       
        

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
