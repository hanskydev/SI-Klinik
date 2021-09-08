<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != 'login'){
			redirect(base_url('auth'));
		}
	}
	
	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/form');
		$this->load->view('layout/footer');
	}
}
