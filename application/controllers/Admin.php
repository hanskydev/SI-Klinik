<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->view('admin/dashboard');
		$this->load->view('layout/footer');
	}

	public function dokter()
	{
		$this->load->view('layout/header');
		$this->load->view('message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/dokter');
		$this->load->view('layout/footer');
	}

	public function pasien()
	{
		$this->load->view('layout/header');
		$this->load->view('message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/pasien');
		$this->load->view('layout/footer');
	}

	public function obat()
	{
		$this->load->view('layout/header');
		$this->load->view('message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/obat');
		$this->load->view('layout/footer');
	}

	public function kunjungan()
	{
		$this->load->view('layout/header');
		$this->load->view('message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/kunjungan');
		$this->load->view('layout/footer');
	}

	public function laporan()
	{
		$this->load->view('layout/header');
		$this->load->view('message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/laporan');
		$this->load->view('layout/footer');
	}
	
}
