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
        $this->load->model('obat_model','OM',true);//memuat model(obat_model) dan mengganti nama
    }

    function index() {
       $data = array(
            'judul' => 'Halaman obat',
            'menu' => 'obat',
             'obat' => $this->OM->getAllobat()//membungkus getallobat yang ada di OM ditaruh di variabel obat
             );
         $this->load->view('obat/obatview',$data);//memuat view-obat-obatview     
         $this->load->view('tampilan/atas_view');
         $this->load->view('tampilan/kiri_view');
        
    }

    function insert(){
        $data = array(
            'menu' => 'obat'
             );
        $this->form_validation->set_rules('nama', 'Nama Obat', 'trim|required');
         $this->form_validation->set_rules('harga', 'Harga Obat', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
         $this->load->view('obat/insertobat',$data);
         $this->load->view('tampilan/atas_view');
         $this->load->view('tampilan/kiri_view');
        }else{
            ?>
            <script type="text/javascript">
    alert("Data Obat berhasil dimasukkan");
</script>
            <?php
                $this->OM->insertObat();
                redirect('obat/index','refresh');
            }
    }


    function edit($id)
    {
        $data = array(
            'menu' => 'obat'
             );
        $this->form_validation->set_rules('idobat', 'ID Obat', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama Obat', 'trim|required');
        $this->form_validation->set_rules('jenis', 'jenis Obat', 'trim|required');
         $this->form_validation->set_rules('harga', 'Harga Obat', 'trim|required');
        $data['obat'] = $this->OM->getObat($id);
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('obat/editobat', $data);
         $this->load->view('tampilan/atas_view');
         $this->load->view('tampilan/kiri_view');
        }else {
            ?>
            <script type="text/javascript">
    alert("Edit Data Obat berhasil");
</script>
            <?php
                $this->OM->updateObat($id);
                redirect('obat/index','refresh');       
        }

    }

    function hapus($id)
    {
        $data = array(
            'menu' => 'obat'
             );
        $this->form_validation->set_rules('idobat', 'ID Obat', 'trim|required');
        $data['obat'] = $this->OM->getObat($id);
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('obat/hapusobat', $data);
         $this->load->view('tampilan/atas_view');
         $this->load->view('tampilan/kiri_view');
        }else {
            ?>
            <script type="text/javascript">
    alert("Data Obat berhasil dihapus");
</script>
            <?php
            $this->OM->deleteObat($id);     
            redirect('obat/index','refresh');           
        }       
    }

   
    }

