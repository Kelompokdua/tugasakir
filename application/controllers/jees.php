<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jees extends CI_Controller {

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
    }

    function index() {
        $data = array(
    		'judul' => 'Halaman list user',
    		 );
    	
        $this->load->view('GridDinamisView',$data);
    }

     public function getAlluser()
    {
        $this->load->model('user_model');
        $result = $this->user_model->getAlluser();
        header("Content-Type: application/json");
        echo json_encode($result);
    }

    public function adduser(){
        $this->load->model('user_model');
        $data = array(
            'username'  => $this->input->post('username'),
            'password'  => md5($this->input->post('password')),
            'level'     => $this->input->post('level')
        );
        $this->user_model->save($data);
        header("Content-Type: application/json");
        echo json_encode($data);
    }

     public function deleteuser()
    {
        $this->load->model('user_model');
        $id = $this->input->post('id'); 
        $this->user_model->delete($id);
    }

     public function edituser(){
        $this->load->model('user_model');
        $data = array(
            'id' => $this->input->post('id'), 
            'username'  => $this->input->post('username'),
            'password'  => md5($this->input->post('password')),
            'level'     => $this->input->post('level')
             );
        $this->user_model->update($data);
        header("Content-Type: application/json");
        echo json_encode($data);
    }
}
        
?>