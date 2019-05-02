<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class obat_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getAllobat()
    {
        $query = $this->db->get('obat');
        return $query->result();
    }

     public function insertObat() {
        $img = $_POST['image'];
    $folderPath = "upload/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
    print_r($fileName);
  

    $data = array(
        'nama' => $this->input->post('nama'),
        'jenis_obat' => $fileName,
        'harga_obat' => $this->input->post('harga')
        );
    $this->db->insert('obat', $data);
}

public function getObat($id)
{
    $this->db->where('id_obat', $id);
    $query = $this->db->get('obat');
    if($query->num_rows()>0){
        return $query->result();
    }
}

public function updateObat($id)
{
    $this->db->where('id_obat', $id);
    $data = array(
        'id_obat' => $this->input->post('idobat'),
        'nama' => $this->input->post('nama'),
          'jenis_obat' => $this->input->post('jenis'),
        'harga_obat' => $this->input->post('harga'));
    $this->db->update('obat', $data);

}

public function deleteObat($id)
    {
        $this->db->where('id_obat', $id);
        $this->db->delete('obat');
    }
}
        
