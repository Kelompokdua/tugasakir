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
             $current_controller = $this->router->fetch_class();
          $this->load->library('acl');
          if (! $this->acl->is_public($current_controller))
          {
            if(! $this->acl->is_allowed($current_controller,$data['level'])){
              echo "<script>
alert('Anda tidak dapat mengakses halaman ini');
window.location.href='".BASE_URL('index.php/home')."';
</script>";
            }
          }
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
            'menu' => 'registrasi',
             'regis' => $this->RM->getgigi()
             );
        }else if($this->session->userdata('logged_in')['poli'] == 'Kesehatan anak dan ibu'){
             $data = array(
            'judul' => 'Halaman View Registrasi',
            'menu' => 'registrasi',
             'regis' => $this->RM->getfulljoin()
             );
        }else{
             $data = array(
            'judul' => 'Halaman View Registrasi',
            'menu' => 'registrasi',
             'regis' => $this->RM->getumum()
             );
        }
         $this->load->view('regis/regisview',$data);
         
         $this->load->view('tampilan/kiri_view');
         $this->load->view('tampilan/atas_view');
         
    }

    function index2() {
        if ($this->session->userdata('logged_in')['poli'] == 'Gigi') {
             $data = array(
            'judul' => 'Halaman View Registrasi',
            'menu' => 'registrasi',
             'regis' => $this->RM->getgigi()
             );
        }else if($this->session->userdata('logged_in')['poli'] == 'Kesehatan anak dan ibu'){
             $data = array(
            'judul' => 'Halaman View Registrasi',
            'menu' => 'registrasi',
             'regis' => $this->RM->getfulljoin()
             );
        }else{
             $data = array(
            'judul' => 'Halaman View Registrasi',
            'menu' => 'registrasi',
             'regis' => $this->RM->getumum()
             );
        }
         $this->load->view('regis/regisview2',$data);
    }

     function insert(){
        $data = array(
             'poli' => $this->RM->getAllPoli(),
             'pasien' => $this->RM->getAllPasien(),
             'menu' => 'registrasi'

             );
        $this->form_validation->set_rules('idpasien', 'ID pasien', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
         $this->load->view('regis/insertregis',$data);
         $this->load->view('tampilan/kiri_view');
         $this->load->view('tampilan/atas_view');
        }else{?>
        <script type="text/javascript">
    alert("Data Rawat Jalan berhasil dimasukkan");
</script>
        <?php
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
             'menu' => 'Registrasi',
             );
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('rm/insertrm', $data);
            $this->load->view('tampilan/kiri_view');
         $this->load->view('tampilan/atas_view');
        }else {
            $config['upload_path'] = './pdf/';
            $config['allowed_types'] = 'pdf';
            $config['max_size']  = 100000000;
            $config['max_width']  = 10240;
            $config['max_height']  = 7680;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('userfile');
                $this->RM->updateRegis($id);
                $this->RMM->insertRM();
                redirect('registrasi/index','refresh');             
        }
                // $this->RM->updateRegis($id);
                // redirect('registrasi/index','refresh');       
        

    }

    function hapus($id)
    {
        $data = array(
            'menu' => 'registrasi',
             );
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
