<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_dokter');
        $this->load->library('form_validation');

		if($this->session->userdata('status') != 'login'){
			redirect(base_url('auth?msg=login_warning'));
		}
	}

	public function index()
	{
		$data['dokter'] = $this->m_dokter->getAll();

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/dokter/dokter', $data);
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

	public function save()
	{
		$this->form_validation->set_rules('nama','Nama Dokter','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('no_telp','Nomor Telepon','required');
		$this->form_validation->set_rules('sip','SIP','required');
		$this->form_validation->set_rules('spesialis','Spesialis','required');
		$this->form_validation->set_rules('alamat','alamat','required');
		if ($this->form_validation->run()==true)
        {
			$data['nm_dokter'] = $this->input->post('nama');
			$data['jns_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tgl_lahir'] = $this->input->post('tanggal_lahir');
			$data['no_telepon'] = $this->input->post('no_telp');
			$data['sip'] = $this->input->post('sip');
			$data['spesialis'] = $this->input->post('spesialis');
			$data['alamat'] = $this->input->post('alamat');
			$this->m_dokter->save($data);
			redirect(base_url('dokter?msg=input_success'));
		}
		else
		{
			redirect(base_url('dokter?msg=input_error'));
		}
	}

	public function edit($kd_dokter)
	{
		$data['dokter'] = $this->m_dokter->getById($kd_dokter);

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/dokter/update', $data);
		$this->load->view('layout/footer');
	}

	public function update()
	{
		$this->form_validation->set_rules('nama','Nama Dokter','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('no_telp','Nomor Telepon','required');
		$this->form_validation->set_rules('sip','SIP','required');
		$this->form_validation->set_rules('spesialis','Spesialis','required');
		$this->form_validation->set_rules('alamat','alamat','required');
		if ($this->form_validation->run()==true)
        {
			$kd_dokter = $this->input->post('kd_dokter');
			$data['nm_dokter'] = $this->input->post('nama');
			$data['jns_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tgl_lahir'] = $this->input->post('tanggal_lahir');
			$data['no_telepon'] = $this->input->post('no_telp');
			$data['sip'] = $this->input->post('sip');
			$data['spesialis'] = $this->input->post('spesialis');
			$data['alamat'] = $this->input->post('alamat');
			$this->m_dokter->update($data, $kd_dokter);
			redirect(base_url('dokter?msg=edit_success'));
		}
		else
		{
			redirect(base_url('dokter?msg=edit_error'));
		}
	}

	public function delete($kd_dokter)
	{
		$this->m_dokter->delete($kd_dokter);
		redirect(base_url('dokter?msg=delete_success'));
	}
	
}
