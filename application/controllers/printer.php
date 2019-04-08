<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Printer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('pengobatan_model');
	}



	public function semua()
	{
		 $data['kelir'] = $this->pengobatan_model->getPrint();
		 //$this->load->view('print', $data);
		$this->pdf->load_view('print', $data);
	}

	



}

/* End of file print.php */
/* Location: ./application/controllers/print.php */