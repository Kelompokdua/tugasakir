<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penverifikasian extends CI_Controller {

    function __construct() {
         parent::__construct();
         $this->load->model('verif_model');
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
    }

    function index() {
        $data = array(
            'judul' => 'Halaman verifikasi',
             );
        
        $this->load->view('verif_view',$data);
        
    }

    public function getAllverif()
    {
        $this->load->model('verif_model');
        $result = $this->verif_model->getAllverif();
        header("Content-Type: application/json");
        echo json_encode($result);
    }

    public function deleteverif()
    {
        $this->load->model('verif_model');
        $id = $this->input->post('id_pengobatan'); 
        $this->verif_model->delete($id);
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function editverif(){
        $this->load->model('verif_model');
        $data = array(
            'id_pengobatan' => $this->input->post('id_pengobatan'), 
            'status'  => $this->input->post('status')
             );
        $this->verif_model->update($data);
        header("Content-Type: application/json");
        echo json_encode($data);
    }
}