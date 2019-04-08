<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Obat extends CI_Controller {

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
    		'judul' => 'Halaman Obat',
    		 );
    	
        $this->load->view('obat_view',$data);
        
    }

    public function getAllobat()
    {
        $this->load->model('obat_model');
        $result = $this->obat_model->getAllobat();
        header("Content-Type: application/json");
        echo json_encode($result);
    }

    public function addobat(){
        $this->load->model('obat_model');
        $data = array(
            'nama_obat'  => $this->input->post('nama_obat'),
            'jenis_obat'  => $this->input->post('jenis_obat'),
        );
        $this->obat_model->save($data);
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function deleteobat()
    {
        $this->load->model('obat_model');
        $id = $this->input->post('id_obat'); 
        $this->obat_model->delete($id);
    }

    public function editobat(){
        $this->load->model('obat_model');
        $data = array(
            'id_obat' => $this->input->post('id_obat'), 
            'nama_obat'  => $this->input->post('nama_obat'),
            'jenis_obat'     => $this->input->post('jenis_obat')
             );
        $this->obat_model->update($data);
        header("Content-Type: application/json");
        echo json_encode($data);
    }
    }

