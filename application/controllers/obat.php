<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Obat extends CI_Controller {

    function __construct() {
         parent::__construct();
        if($this->session->userdata('logged_in')){
        	$session_data = $this->session->userdata('logged_in');
        	$data['username'] = $session_data['username'];
        	$data['level'] = $session_data['level'];
        }else{
        	redirect('login','refresh');
        }
        $this->load->model('obat_model','OM',true);
    }

    function index() {
       $data = array(
            'judul' => 'Halaman obat',
             'obat' => $this->OM->getAllobat()
             );
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('obat/obat_view',$data);
        
    }

    function insert(){

        $this->form_validation->set_rules('nama', 'Nama Obat', 'trim|required');
         $this->form_validation->set_rules('harga', 'Harga Obat', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('obat/insert_obat');
        }else{
                $this->OM->insertObat();
                redirect('obat/index','refresh');
            }
    }


    function edit($id)
    {
        $this->form_validation->set_rules('idobat', 'ID Obat', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama Obat', 'trim|required');
        $this->form_validation->set_rules('jenis', 'jenis Obat', 'trim|required');
         $this->form_validation->set_rules('harga', 'Harga Obat', 'trim|required');
        $data['obat'] = $this->OM->getObat($id);
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('tampilan/atas');
            $this->load->view('tampilan/kiri');
            $this->load->view('obat/edit_obat', $data);
        }else {
            
                $this->OM->updateObat($id);
                redirect('obat/index','refresh');       
        }

    }

    function hapus($id)
    {
        $this->form_validation->set_rules('idobat', 'ID Obat', 'trim|required');
        $data['obat'] = $this->OM->getObat($id);
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('tampilan/atas');
            $this->load->view('tampilan/kiri');
            $this->load->view('obat/hapus_obat', $data);
        }else {
            $this->OM->deleteObat($id);     
            redirect('obat/index','refresh');           
        }       
    }

   
    }

