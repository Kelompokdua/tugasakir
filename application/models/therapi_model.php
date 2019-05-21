<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Therapi_model extends CI_Model {

public function insertTherapi($obat,$rm) {

    $data = array(
        'id_obat' => $obat,
    	'id_pelayanan' => $rm
    	);
    	$this->db->insert('therapi', $data);
}	

}

/* End of file therapi_model.php */
/* Location: ./application/models/therapi_model.php */