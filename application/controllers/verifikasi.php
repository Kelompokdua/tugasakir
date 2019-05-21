<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class verifikasi extends CI_Controller {

    function __construct() {
        parent::__construct();
          if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
		}else{
			redirect('login','refresh');
		}
		$this->load->model('verif_model','VM',true);
    }

    function index() {
        $data = array(
    		'judul' => 'Halaman verifikasi',
    		 'verif' => $this->VM->getAllverif()
    		 );
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('verif/verifikasi_view',$data);
    }

     function edit($id)
    {			
    			?>
    			<script type="text/javascript">
    alert("Data berhasil dimasukkan");
</script>
    			<?php
                $this->VM->updateVerif($id);
                redirect('verifikasi','refresh');       
        

    }

    function edit1($id)
    {			
    			?>
    			<script type="text/javascript">
    alert("Data Transaksi telah selesai");
</script>
    			<?php
                $this->VM->updateVerif1($id);
                redirect('verifikasi','refresh');       
        

    }
}
