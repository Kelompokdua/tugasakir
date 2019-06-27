<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Printer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pasien_model');
	}



	public function semua($id)
	{
		 $data['pelayanan'] = $this->pasien_model->getdetailpelayanan($id);
		 $data['obat'] = $this->pasien_model->getdaftartherapi($id);
		$this->load->view('print', $data);

		$html = $this->output->get_output();

        // Load/panggil library dompdfnya
        $this->load->library('dompdf_gen');

        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $this->dompdf->stream("welcome.pdf", array('Attachment' => 0));
	}

	public function semua1($id)
	{
		 $data['pelayanan'] = $this->pasien_model->getdetailpelayanan($id);
		 $data['obat'] = $this->pasien_model->getdaftartherapi($id);
		$this->load->view('print1', $data);

		$html = $this->output->get_output();

        // Load/panggil library dompdfnya
        $this->load->library('dompdf_gen');

        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $this->dompdf->stream("welcome.pdf", array('Attachment' => 0));
	}

	



}

/* End of file print.php */
/* Location: ./application/controllers/print.php */