<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Printer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('pasien_model');
	}



	public function semua($id)
	{
		 $data['pelayanan'] = $this->pasien_model->getdetailpelayanan($id);
		 $data['obat'] = $this->pasien_model->getdaftartherapi($id);
		$this->load->view('print', $data);
	}

	



}

/* End of file print.php */
/* Location: ./application/controllers/print.php */