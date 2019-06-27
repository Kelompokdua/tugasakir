<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class poli extends CI_Controller {

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
		$this->load->model('poli_model','PM',true);//memanggil model,muatlah model (poli_model dan saya berinama PM)
    }

    function index() {//fungsi yg dipanggil oleh controller
    	$data = array(
    		'judul' => 'Halaman poli',
    		'menu' => 'poli',
    		 'poli' => $this->PM->getAllpoli()//semua record yg ada di dalam tabel poli di bungkus di variabel poli
    		 );
    	//ketika fungsi index dipanggil yg tampil adalah
         $this->load->view('poli/poli_view',$data);//load (muat) view (tampilan)..muat tampilan di folder poli cari yang bernama poli_view
         $this->load->view('tampilan/kiri_view');
         $this->load->view('tampilan/atas_view');
    }

    function insert(){

    	$data = array(
    		'menu' => 'poli',
    		 );
		$this->form_validation->set_rules('nama', 'Nama Poli', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan Poli', 'trim|required');
		if ($this->form_validation->run()==FALSE) {

         
         $this->load->view('poli/insert_poli',$data);
         $this->load->view('tampilan/atas_view');
         $this->load->view('tampilan/kiri_view');
    
		}else{?>
				<script type="text/javascript">
    alert("Data Poli berhasil dimasukkan");
</script>
<?php
				$this->PM->insertPoli();
				redirect('poli/index','refresh');
			}
	}


	function edit($id)
	{
		$data = array(
            'menu' => 'poli',
             );    
		$this->form_validation->set_rules('idpoli', 'ID Poli', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Poli', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan Poli', 'trim|required');
		$data['poli'] = $this->PM->getPoli($id);
        //$this->load->view('edit_profil', $data);

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('poli/editpoli', $data);
			$this->load->view('tampilan/atas_view');
         $this->load->view('tampilan/kiri_view');
		}else {
			?>
			<script type="text/javascript">
    alert("Edit Data Poli berhasil");
</script>
			<?php
				$this->PM->updatePoli($id);
				redirect('poli/index','refresh');		
		}

	}

	function hapus($id)
	{
		$data = array(
            'menu' => 'poli',
             );    
		$this->form_validation->set_rules('idpoli', 'id Poli', 'trim|required');
		$data['poli'] = $this->PM->getPoli($id);
		if ($this->form_validation->run()==FALSE) {

			$this->load->view('poli/hapuspoli', $data);
			$this->load->view('tampilan/atas_view');
         $this->load->view('tampilan/kiri_view');
		}else {
			?>
			<script type="text/javascript">
    alert("Data Poli berhasil dihapus");
</script>
			<?php
			$this->PM->deletePoli($id);		
			redirect('poli/index','refresh');			
		}		
	}
}
