<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth?msg=login_warning"));
		}
	}

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/pasien');
		$this->load->view('layout/footer');
	}
	
}
