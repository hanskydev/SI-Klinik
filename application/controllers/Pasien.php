<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_pasien');
        $this->load->library('form_validation');
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth?msg=login_warning"));
		}
	}

	public function index()
	{
		$data['pasien'] = $this->m_pasien->getAll();

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/pasien', $data);
		$this->load->view('layout/footer');
	}
	
}
