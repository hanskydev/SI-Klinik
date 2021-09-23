<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_pendaftaran');
        $this->load->library('form_validation');
	
		if($this->session->userdata('status') != 'login'){
			redirect(base_url('auth?msg=login_warning'));
		}
	}

	public function index()
	{
		$data['pendaftaran'] = $this->m_pendaftaran->getAll();
		$data['pasien'] = $this->m_pendaftaran->getPasien();

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/pendaftaran/pendaftaran', $data);
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
			$data['tgl_kunjungan '] = $this->input->post('tanggal_kunjungan');
			$data['jam'] = $this->input->post('jam');
			$data['status'] = $this->input->post('status');
			$this->m_pendaftaran->save($data);
			redirect(base_url('pendaftaran?msg=input_success'));
		}
		else
		{
			redirect(base_url('pendaftaran?msg=input_error'));
		}
	}

	public function done($no_pendaftaran)
	{
		$data['status'] = 'Selesai';
		$this->m_pendaftaran->update($data, $no_pendaftaran);
		redirect(base_url('pendaftaran?msg=set_done'));
	}

	public function wait($no_pendaftaran)
	{
		$data['status'] = 'Menunggu';
		$this->m_pendaftaran->update($data, $no_pendaftaran);
		redirect(base_url('pendaftaran?msg=set_wait'));
	}

	public function delete($no_pendaftaran)
	{
		$this->m_pendaftaran->delete($no_pendaftaran);
		redirect(base_url('pendaftaran?msg=delete_success'));
	}
	
}
