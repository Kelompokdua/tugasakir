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
        'menu' => 'rekam',
    		 'rekam' => $this->HM->getsinglerekam()
    		 );
         $this->load->view('rekam/rekamview',$data);
         $this->load->view('tampilan/atas_view');
         $this->load->view('tampilan/kiri_view');
    }

    public function sambutan_ketua()
    {
       $data=$this->HM->DetailData((int)$this->input->post('idpelayanan')); 
           echo 'Nama Pasien :'.$data[0]->nama_pasien.'<br>'; 
           echo 'Nama Dokter :'.$data[0]->nama_dokter.'<br>'; 
           echo 'Poli :'.$data[0]->poli.'<br>'; 
           echo 'Tanggal Periksa :'.$data[0]->tanggal.'<br>'; 
           echo 'Anamnesa :'.$data[0]->anamnesa.'<br>';
           echo 'diagnose :'.$data[0]->diagnose.'<br>';
           echo "Daftar obat :";
           echo "<ol>";
          foreach ($data as $key) {
          echo "<ul>";
           echo $key->nama; 
           echo "</ul>";
          }
          echo "</ol>";
           echo '<a href="../../../pdf/'.$data[0]->lab.'" target="_blank"><u>Lihat hasil lab</u></a><br>';
           echo 'Status transaksi : Lunas'.'<br><br>'; 
           echo '<img src="../../../upload/'.$data[0]->foto_resep.'"/>';
   } 

    function index2($id) {
      if ($this->session->userdata('logged_in')['poli'] == 'Gigi') {
             $data = array(
            'judul' => 'Halaman Rekam Medis',
            'menu' => 'rekam',
             'rekam' => $this->HM->getrekamgigi($id)
             );
        }else if($this->session->userdata('logged_in')['poli'] == 'Kesehatan anak dan ibu'){
             $data = array(
            'judul' => 'Halaman Rekam Medis',
            'menu' => 'rekam',
             'rekam' => $this->HM->getrekamkia($id)
             );
        }else{
             $data = array(
            'judul' => 'Halaman Rekam Medis',
            'menu' => 'rekam',
             'rekam' => $this->HM->getrekam($id)
             );
        }
         $this->load->view('rekam/rekamviewall',$data);
         $this->load->view('tampilan/atas_view');
         $this->load->view('tampilan/kiri_view');
    }
}
