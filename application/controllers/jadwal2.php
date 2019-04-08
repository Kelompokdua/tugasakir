<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal2 extends CI_Controller {

    function __construct() {
         parent::__construct();
         $this->load->model('jadwal_model');
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
        $cek = array(
          'id_login' => $this->session->logged_in['id_login'],

        );
        $data = array(
          'judul' => 'Halaman jadwal',
          'jadual'=> $this->jadwal_model->getLogin()
        );
        $this->load->view('jadwal_allview',$data);
    }

    public function getAlljadwal()
    {
        $this->load->model('jadwal_model');
        $result = $this->jadwal_model->getAlljadwal();
        header("Content-Type: application/json");
        echo json_encode($result);
    }

    public function addjadwal(){
        $this->load->model('jadwal_model');
        $data = array(
            'id_login'  => $this->input->post('id_login'),
            'hari'  => $this->input->post('hari'),
            'jam_kerja'  => $this->input->post('jam_kerja'),
            'jam_kerja_ed'  => $this->input->post('jam_kerja_ed'),
        );
        $this->jadwal_model->save($data);
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function deletejadwal()
    {
        $this->load->model('jadwal_model');
        $id = $this->input->post('id_jadwal'); 
        $this->jadwal_model->delete($id);
    }

    public function editjadwal(){
        $this->load->model('jadwal_model');
        $data = array(
            'id_jadwal' => $this->input->post('id_jadwal'), 
            'hari'  => $this->input->post('hari'),
            'jam_kerja'     => $this->input->post('jam_kerja'),
            'jam_kerja_ed'     => $this->input->post('jam_kerja_ed'),
             );
        $this->jadwal_model->update($data);
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function getLogin(){
        $this->load->model('jadwal_model');
        $result = $this->jadwal_model->getLogin();
        header("Content-Type: application/json");
        echo json_encode($result);
    }
}
        
?>