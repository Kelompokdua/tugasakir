<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class dokter extends CI_Controller {

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
        $this->load->model('dokter_model','DM',true);
    }

    function index() {
         $data = array(
            'judul' => 'Halaman Dokter',
            'menu' => 'dokter',
             'dokter' => $this->DM->getAlldokter()
             );
         $this->load->view('dokter/dokterview',$data);
          $this->load->view('tampilan/kiri_view');
         $this->load->view('tampilan/atas_view');
    }

    function insert(){

        $this->form_validation->set_rules('nama', 'Nama Dokter', 'trim|required');
        $this->form_validation->set_rules('poli', 'poli', 'trim|required');
         $this->form_validation->set_rules('biaya', 'Biaya Dokter', 'trim|required');
          $data = array(
             'poli' => $this->DM->getAllpoli(),
             'menu' => 'dokter'
             );
        if ($this->form_validation->run()==FALSE) {
         $this->load->view('dokter/insertdokter',$data);
         $this->load->view('tampilan/kiri_view');
         $this->load->view('tampilan/atas_view');
        }else{
            ?>
            <script type="text/javascript">
    alert("Data Dokter berhasil dimasukkan");
</script>
            <?php
                $this->DM->insertDokter();
                redirect('dokter/index','refresh');
            }
    }


    function edit($id)
    {
        $this->form_validation->set_rules('iddokter', 'ID Dokter', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama Dokter', 'trim|required');
        $this->form_validation->set_rules('poli', 'poli', 'trim|required');
         $this->form_validation->set_rules('biaya', 'Biaya Dokter', 'trim|required');
		$data = array(
			'dokter' => $this->DM->getDokter($id),
             'poli' => $this->DM->getAllpoli(),
             'menu' => 'dokter'
             );
       
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('dokter/editdokter', $data);
            $this->load->view('tampilan/kiri_view');
         $this->load->view('tampilan/atas_view');
        }else {
            ?>
            <script type="text/javascript">
    alert("Edit Data Dokter berhasil");
</script>
            <?php
                $this->DM->updateDokter($id);
                redirect('dokter/index','refresh');       
        }

    }

    function hapus($id)
    {
      $data = array(
            'menu' => 'dokter',
             );
        $this->form_validation->set_rules('iddokter', 'ID Dokter', 'trim|required');
        $data['dokter'] = $this->DM->getDokter($id);
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('dokter/hapusdokter', $data);
            $this->load->view('tampilan/kiri_view');
         $this->load->view('tampilan/atas_view');
        }else {?>
        <script type="text/javascript">
    alert("Data Dokter berhasil dihapus");
</script>
        <?php
            $this->DM->deleteDokter($id);     
            redirect('dokter/index','refresh');           
        }       
    }
}
