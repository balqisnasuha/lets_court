<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Court extends CI_Controller {

	public function index()
	{
		$this->load->model('Courtmin_model');
		$courtmin= $this->Courtmin_model->getResInfo();
		$data['courtmin'] = $courtmin;
		$this->load->view('front/partials/header');
		$this->load->view('front/court',$data);
		$this->load->view('front/partials/footer');
	}

}
