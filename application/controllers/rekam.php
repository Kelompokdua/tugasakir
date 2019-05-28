<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class rekam extends CI_Controller {

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
		$this->load->model('rekam_model','HM',true);
    }

    function index() {
        $data = array(
    		'judul' => 'Halaman Rekam',
    		 'rekam' => $this->HM->getsinglerekam()
    		 );
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('rekam/rekam_view',$data);
    }

    function test() {
      $result = $this->db->query("SELECT t.id_therapi, t.id_obat, o.nama, o.jenis_obat, o.harga_obat, rk.*, pas.nama_pasien, d.nama_dokter, d.biaya FROM therapi AS t, rekam_medis AS rk, obat AS o, pasien AS pas, dokter AS d WHERE t.id_pelayanan = rk.id_pelayanan AND t.id_obat = o.id_obat AND pas.id_pasien = rk.id_pasien AND d.id_dokter = rk.id_dokter")->result();

        var_dump($result);
    }

    public function sambutan_ketua()
    {
       $data=$this->HM->DetailData($this->input->post('idpelayanan')); 

           echo 'Nama Pasien :'.$data['nama_pasien'].'<br>'; 
           echo 'Nama Dokter :'.$data['nama_dokter'].'<br>'; 
           echo 'Poli :'.$data['poli'].'<br>'; 
           echo 'Tanggal Periksa :'.$data['tanggal'].'<br>'; 
           echo 'Anamnesa :'.$data['anamnesa'].'<br>';
           echo 'diagnose :'.$data['diagnose'].'<br>';
           echo 'Status transaksi : Lunas'.'<br><br>';
           echo '<img src="../../../upload/'.$data['foto_resep'].'"/>';
   } 

    function index2($id) {
        $data = array(
            'judul' => 'Halaman Rekam Medis',
             'rekam' => $this->HM->getrekam($id)
             );
         $this->load->view('tampilan/atas');
         $this->load->view('tampilan/kiri');
         $this->load->view('rekam/rekam_view_all',$data);
    }
}
 