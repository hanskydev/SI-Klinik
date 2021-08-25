<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_dokter');
        $this->load->library('form_validation');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth?msg=login_warning"));
		}
	}

	public function index()
	{
		$data['dokter'] = $this->m_dokter->getAll();

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/dokter/read', $data);
		$this->load->view('layout/footer');
	}

	public function create()
	{
		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/dokter/create');
		$this->load->view('layout/footer');
	}
	
}
