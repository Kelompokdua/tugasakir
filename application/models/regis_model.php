<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class regis_model extends CI_Model {
    function __construct() {
        parent::__construct();
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['nama_pengguna'] = $session_data['nama_pengguna'];
        }else{
            redirect('login','refresh');
        }
    }

	public function getAllregis()
{
    $query = $this->db->get('registrasi');
        return $query->result();
}

    public function getAllPoli()
{
    $query = $this->db->get('poli');
        return $query->result();
}

public function getAllObat()
{
    $query = $this->db->get('obat');
        return $query->result();
}


public function getAllPasien()
{
    $query = $this->db->get('pasien');
        return $query->result();
}

 public function getgigi()
        {
            $query = $this->db->query("SELECT *
FROM registrasi 
inner join poli on registrasi.id_poli = poli.id_poli 
INNER join pasien on pasien.id_pasien = registrasi.id_pasien
WHERE registrasi.status='Belum' AND poli.nama = 'Gigi' order by tanggal ASC");
            return $query->result();
        }

public function getumum()
        {
            $query = $this->db->query("SELECT *
FROM registrasi 
inner join poli on registrasi.id_poli = poli.id_poli 
INNER join pasien on pasien.id_pasien = registrasi.id_pasien
WHERE registrasi.status='Belum' AND poli.nama = 'Umum' order by tanggal ASC");
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

public function insertRegis() {

	date_default_timezone_set('Asia/Jakarta');
    $datetime = date("Y-m-d H:i:s");
    $data = array(
        'id_pasien' => $this->input->post('idpasien'),
    	 'id_poli' => $this->input->post('idpoli'),
    	 'inputby' => $this->session->userdata('logged_in')['nama_pengguna'],
    	'tanggal' => $datetime,
        'status' => 'Belum');
    $this->db->insert('registrasi', $data);
}

public function getRegis($id)
{
    $this->db->select('*');
    $this->db->from('pasien');
$this->db->join('registrasi', 'pasien.id_pasien = registrasi.id_pasien');
$this->db->where('pasien.id_pasien', $id);
    $query = $this->db->get();
    if($query->num_rows()>0){
        return $query->result();
    }
}

public function updateRegis($id)
{
    $this->db->where('id_pasien', $id);
    $data = array(
    	'status' => 'Selesai');
    $this->db->update('registrasi', $data);

}

public function deleteRegis($id)
    {
        $this->db->where('id_registrasi', $id);
        $this->db->delete('registrasi');
    }
    
}
