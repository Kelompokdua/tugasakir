<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class pasien extends CI_Controller {

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
        $this->load->model('pasien_model','PM',true);
    }

    public function sambutan_ketua()
    {
       $data=$this->PM->DetailData($this->input->post('idpasien')); 

           echo 'No Rekam Medis :'.$data['id_pasien'].'<br>'; 
           echo 'Nama pasien :'.$data['nama_pasien'].'<br>';
           echo 'Alamat :'.$data['alamat'].'<br>';
           echo 'Tanggal Lahir :'.$data['tgl_lahir'].'<br>';
           echo 'Jenis Kelamin :'.$data['jenis_kelamin'].'<br>';
           echo 'No Telp :'.$data['telp'].'<br>';
           echo 'Status :'.$data['status'].'<br>';
           echo 'Jenis Pasien :'.$data['status_pasien'].'<br>';
           if ($data['divisi'] == NULL) {
               echo 'Divisi : -<br>';
           }else{
            echo 'Divisi :'.$data['divisi'].'<br>';
           }
           if ($data['departemen'] == NULL) {
               echo 'Departemen : -<br>';
           }else{
            echo 'Departemen :'.$data['departemen'].'<br>';
           }
           if ($data['sub_departemen'] == NULL) {
               echo 'Sub Departemen : -<br>';
           }else{
            echo 'Sub Departemen :'.$data['sub_departemen'].'<br>';
           }
       
   } 
 

    function index() {
       $data = array(
            'judul' => 'Halaman Pasien',
             'pasien' => $this->PM->getAllpasien()
             );
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('pasien/pasien_view',$data);
        
    }

    function insert(){

        $this->form_validation->set_rules('nama', 'nama Pasien', 'trim|required');
        $this->form_validation->set_rules('jeniskelamin', 'jenis kelamin Pasien', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat Pasien', 'trim|required');
        $this->form_validation->set_rules('tgllahir', 'Tanggal lahir Pasien', 'trim|required');
        $this->form_validation->set_rules('telp', 'Telp alamat Pasien', 'trim|required');
        $this->form_validation->set_rules('status', 'status Pasien', 'trim|required');
        $this->form_validation->set_rules('status_pasien', 'jenis Pasien', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('pasien/insert_pasien');
        }else{?>
        <script type="text/javascript">
    alert("Data Pasien berhasil dimasukkan");
</script>
        <?php
                $this->PM->insertPasien();
                redirect('pasien/index','refresh');
            }
    }


    function edit($id)
    {
        $this->form_validation->set_rules('idpasien', 'ID Pasien', 'trim|required');
         $this->form_validation->set_rules('nama', 'nama Pasien', 'trim|required');
        $this->form_validation->set_rules('jeniskelamin', 'jenis kelamin Pasien', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat Pasien', 'trim|required');
        $this->form_validation->set_rules('tgllahir', 'Tanggal lahir Pasien', 'trim|required');
        $this->form_validation->set_rules('telp', 'Telp Pasien', 'trim|required');
        $this->form_validation->set_rules('status', 'status Pasien', 'trim|required');
        $this->form_validation->set_rules('status_pasien', 'jenis Pasien', 'trim|required');
        $data['pasien'] = $this->PM->getPasien($id);
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('tampilan/atas');
            $this->load->view('tampilan/kiri');
            $this->load->view('pasien/edit_pasien', $data);
        }else {
            ?>
<script type="text/javascript">
    alert("Edit Data Pasien berhasil");
</script>
            <?php
                $this->PM->updatePasien($id);
                redirect('pasien/index','refresh');       
        }

    }

    function hapus($id)
    {
        $this->form_validation->set_rules('idpasien', 'ID Pasien', 'trim|required');
        $data['pasien'] = $this->PM->getPasien($id);
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('tampilan/atas');
            $this->load->view('tampilan/kiri');
            $this->load->view('pasien/hapus_pasien', $data);
        }else {
          ?>
<script type="text/javascript">
    alert("Data Pasien berhasil dihapus");
</script>
          <?php
            $this->PM->deletePasien($id);     
            redirect('pasien/index','refresh');           
        }       
    }

}
