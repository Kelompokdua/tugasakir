<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengobatan extends CI_Controller {

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
        $this->load->model('obat_model','OM',true);
        $this->load->model('pengobatan_model','pengobatan_model',true);

    }

    function index() {
        $data = array(
    		'judul' => 'Halaman Pengobatan',
            'obat'  => $this->OM->getAllobat()
    		 );

        $this->form_validation->set_rules('namap', 'Nama Pegawai', 'trim|required');
        $this->form_validation->set_rules('umurp', 'Alamat Pegawai', 'trim|required');
        $this->form_validation->set_rules('kel', 'Tanggal Lahir Pegawai', 'trim|required');
        $this->form_validation->set_rules('obat', 'Tanggal Lahir Pegawai', 'trim|required');
        $this->form_validation->set_rules('userfile', 'Tanggal Lahir Pegawai', 'trim|is_null');

        if ($this->form_validation->run()==FALSE) {
        $this->load->view('pengobatan_view',$data);
        }else{
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = 100000000;
            $config['max_width']  = 10240;
            $config['max_height']  = 7680;
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('userfile');
                $this->load->view('pengobatan_view');
            
                
                $this->pengobatan_model->insertPengobatan($data);
                $this->load->view('sukses_input');
            }
    }
    
} 
        
?>