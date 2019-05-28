<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {

    function __construct() {
        parent::__construct();
        if($this->session->userdata('logged_in')){
        	$session_data = $this->session->userdata('logged_in');
        	$data['username'] = $session_data['username'];
        	$data['level'] = $session_data['level'];
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
        $this->load->model('user_model','UM',true);
    }

    function index() {
         $data = array(
            'judul' => 'Halaman Pengguna',
             'user' => $this->UM->getAlluser(),
             'dokter' => $this->UM->getusercampurdokter()
             );
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('user/user_view',$data);
    }

    function insert(){
          $data = array(
             'dokter' => $this->UM->getdokter()
             );
        $this->form_validation->set_rules('nama', 'Nama pengguna', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passwordulang', 'Password Konfirmasi salah', 'required|matches[password]');
        if ($this->form_validation->run()==FALSE) {
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('user/insert_user',$data);
        }else{
          ?>
          <script type="text/javascript">
    alert("Data User berhasil dimasukkan");
</script>
          <?php
                $this->UM->insertUser();
                redirect('user/index','refresh');
            }
    }


    function edit($id)
    {
         $this->form_validation->set_rules('nama', 'Nama pengguna', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passwordulang', 'Password Konfirmasi salah', 'required|matches[password]');
        $data['user'] = $this->UM->getUser($id);
        $data['dokter'] = $this->UM->getdokter();
        $data['dokter1'] = $this->UM->getusercampurdokter();
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('tampilan/atas');
            $this->load->view('tampilan/kiri');
            $this->load->view('user/edit_user', $data);
        }else {
          ?>
          <script type="text/javascript">
    alert("Edit Data User berhasil");
</script>
        <?php
            
                $this->UM->updateUser($id);
                redirect('user/index','refresh');       
        }

    }

    function hapus($id)
    {
        $this->form_validation->set_rules('idlogin', 'ID Login', 'trim|required');
        
        $data['dokter1'] = $this->UM->getusercampurdokter();
        $data['user'] = $this->UM->getUser($id);
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('tampilan/atas');
            $this->load->view('tampilan/kiri');
            $this->load->view('user/hapus_user', $data);
        }else {
          ?>
          <script type="text/javascript">
    alert("Data User berhasil dihapus");
</script>
          <?php
            $this->UM->deleteUser($id);     
            redirect('user/index','refresh');           
        }       
    }
}
