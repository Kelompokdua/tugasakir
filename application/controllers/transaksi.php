<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class transaksi extends CI_Controller {

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
		$this->load->model('transaksi_model','TM',true);
    }

    function index() {
        $data = array(
    		'judul' => 'Halaman transaksi',
        'menu' => 'transaksi',
    		 'rm' => $this->TM->getAllrm()
    		 );
         $this->load->view('transaksi/transaksiindex',$data);     
         $this->load->view('tampilan/atas_view');
         $this->load->view('tampilan/kiri_view');
    }

     function edit($id)
    {           
                ?>
                <script type="text/javascript">
    alert("Data berhasil diverifikasi");
</script>
                <?php
                $this->TM->updateTrans($id);
                redirect('transaksi','refresh'); 
                      
        

    }
}
