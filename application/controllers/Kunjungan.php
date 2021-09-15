<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_kunjungan');
        $this->load->library('form_validation');
	
		if($this->session->userdata('status') != 'login'){
			redirect(base_url('auth?msg=login_warning'));
		}
	}

	public function index()
	{
		$data['kunjungan'] = $this->m_kunjungan->getAll();
		$data['pasien'] = $this->m_kunjungan->getPasien();

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/kunjungan', $data);
		$this->load->view('layout/footer');
	}

	public function save()
	{
		$this->form_validation->set_rules('kd_pasien','Kode Pasien','required');
		$this->form_validation->set_rules('tanggal_daftar','Tanggal Pendaftaran','required');
		$this->form_validation->set_rules('tanggal_kunjungan','Tanggal Kunjungan','required');
		$this->form_validation->set_rules('jam','Jam Kunjungan','required');
		$this->form_validation->set_rules('status','Status Kunjungan','required');
		if ($this->form_validation->run()==true)
        {
			$data['kd_pasien'] = $this->input->post('kd_pasien');
			$data['tgl_daftar'] = $this->input->post('tanggal_daftar');
			$data['tgl_kunjungan'] = $this->input->post('tanggal_kunjungan');
			$data['jam'] = $this->input->post('jam');
			$data['status'] = $this->input->post('status');
			$this->m_kunjungan->save($data);
			redirect(base_url('kunjungan?msg=input_success'));
		}
		else
		{
			redirect(base_url('kunjungan?msg=input_error'));
		}
	}
	
}
