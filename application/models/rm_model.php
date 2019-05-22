<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class rm_model extends CI_Model {
	function __construct() {
        parent::__construct();
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['id_dokter'] = $session_data['id_dokter'];
            $data['poli'] = $session_data['poli'];
        }else{
            redirect('login','refresh');

        }
        $this->load->model('therapi_model','TM',true);
    }


    public function getAllPoli()
{
    $query = $this->db->get('poli');
        return $query->result();
}


 public function getgigi()
        {
            $query = $this->db->query("SELECT *
FROM registrasi 
inner join poli on registrasi.id_poli = poli.id_poli 
INNER join pasien on pasien.id_pasien = registrasi.id_pasien
WHERE registrasi.status='Belum' AND poli.nama = 'Gigi'");
            return $query->result();
        }

 public function getfulljoin()
        {
            $query = $this->db->query("SELECT *
FROM registrasi
LEFT JOIN poli ON registrasi.id_poli = poli.id_poli
LEFT JOIN pasien on pasien.id_pasien = registrasi.id_pasien where registrasi.status ='Belum' AND poli.nama = 'Kesehatan anak dan ibu'");
            return $query->result();
        }

    
    public function getAllrm()
    {
        $query = $this->db->get('rekam_medis');
        return $query->result();
    }

    public function updateRegis($id)
{
    $this->db->where('id_registrasi', $id);
    $data = array(
        'status' => 'Selesai');
    $this->db->update('registrasi', $data);

}

     public function insertRM() {
        $img = $_POST['image'];
    $folderPath = "upload/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
  	
  	date_default_timezone_set('Asia/Jakarta');
    $datetime = date("Y-m-d H:i:s");

    $data = array(
        'id_pasien' => $this->input->post('idpasien'),
        'id_dokter' => $this->session->userdata('logged_in')['id_dokter'],
        'poli' => $this->session->userdata('logged_in')['poli'],
        'tanggal' => $datetime,
        'anamnesa' => $this->input->post('anamnesa'),
        'diagnose' => $this->input->post('diagnose'),
        'foto_resep' => $fileName
        );
     $this->db->insert('rekam_medis', $data);
     $insert_id = $this->db->insert_id();
     foreach ($this->input->post('tt') as $key) {
         $this->TM->insertTherapi($key,$insert_id);
     }
     
}

public function getRM($id)
{
    $this->db->where('id_pelayanan', $id);
    $query = $this->db->get('rekam_medis');
    if($query->num_rows()>0){
        return $query->result();
    }
}

public function getAllPasien()
{
    $query = $this->db->get('pasien');
        return $query->result();
}

public function getAllObat()
{
    $query = $this->db->get('obat');
        return $query->result();
}


}
