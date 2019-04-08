<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengobatan_model extends CI_Model {

    public function insertPengobatan() {
        $obat = $this->input->post('obat');

        $data = array(
                'nama_pasien' => $this->input->post('namap'),
                'umur' => $this->input->post('umurp'),
                'keluhan' => $this->input->post('kel'),
                'foto_luka' => $this->upload->data('file_name'),
                'ket_obat' => $this->input->post('keterangan'),
                'status' => 'belum verifikasi',
                );
        $this->db->insert('pengobatan', $data);
    }

    public function getPrint () {
        $query = $this->db->query("select * from pengobatan WHERE status = 'verifikasi'");
        return $query->result_array();
    }
}
