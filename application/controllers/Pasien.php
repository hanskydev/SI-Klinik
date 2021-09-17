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
		$this->load->view('admin/pasien/pasien', $data);
		$this->load->view('layout/footer');
	}

	public function detail($kd_pasien)
	{
		$data['pasien'] = $this->m_pasien->getById($kd_pasien);
		$data['kontak'] = $this->m_pasien->getContact($kd_pasien);

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/pasien/detail', $data);
		$this->load->view('layout/footer');
	}
	
	public function create()
	{
		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/pasien/create');
		$this->load->view('layout/footer');
	}

	public function save()
	{
		$this->form_validation->set_rules('nama','Nama Pasien','required');
		$this->form_validation->set_rules('no_pasien','Nomor Pasien','required');
		$this->form_validation->set_rules('no_identitas','Nomor Identitas','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('gol_darah','Golongan Darah','required');
		$this->form_validation->set_rules('no_telp','Nomor Telepon','required');
		$this->form_validation->set_rules('alamat','alamat','required');
		if ($this->form_validation->run()==true)
        {
			$data['nm_pasien'] = $this->input->post('nama');
			$data['no_pasien'] = $this->input->post('no_pasien');
			$data['no_identitas'] = $this->input->post('no_identitas');
			$data['jns_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tgl_lahir'] = $this->input->post('tanggal_lahir');
			$data['gol_darah'] = $this->input->post('gol_darah');
			$data['no_telepon'] = $this->input->post('no_telp');
			$data['alamat'] = $this->input->post('alamat');
			$this->m_pasien->save($data);
			redirect(base_url('pasien?msg=input_success'));
		}
		else
		{
			redirect(base_url('pasien?msg=input_error'));
		}
	}

	public function edit($kd_pasien)
	{
		$data['pasien'] = $this->m_pasien->getById($kd_pasien);

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/pasien/update', $data);
		$this->load->view('layout/footer');
	}

	public function update()
	{
		$this->form_validation->set_rules('nama','Nama Pasien','required');
		$this->form_validation->set_rules('no_pasien','Nomor Pasien','required');
		$this->form_validation->set_rules('no_identitas','Nomor Identitas','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('gol_darah','Golongan Darah','required');
		$this->form_validation->set_rules('no_telp','Nomor Telepon','required');
		$this->form_validation->set_rules('alamat','alamat','required');
		if ($this->form_validation->run()==true)
        {
			$kd_pasien = $this->input->post('kd_pasien');
			$data['nm_pasien'] = $this->input->post('nama');
			$data['no_pasien'] = $this->input->post('no_pasien');
			$data['no_identitas'] = $this->input->post('no_identitas');
			$data['jns_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tgl_lahir'] = $this->input->post('tanggal_lahir');
			$data['gol_darah'] = $this->input->post('gol_darah');
			$data['no_telepon'] = $this->input->post('no_telp');
			$data['alamat'] = $this->input->post('alamat');
			$this->m_pasien->update($data, $kd_pasien);
			redirect(base_url('pasien?msg=edit_success'));
		}
		else
		{
			redirect(base_url('pasien?msg=edit_error'));
		}
	}

	public function delete($kd_pasien)
	{
		$this->m_pasien->delete($kd_pasien);
		redirect(base_url('pasien?msg=delete_success'));
	}

	public function addcontact()
	{
		$this->form_validation->set_rules('nama','Nama Keluarga','required');
		$this->form_validation->set_rules('status','Status Keluarga','required');
		$this->form_validation->set_rules('no_telp','Nomor Telepon','required');
		if ($this->form_validation->run()==true)
        {
			$data['nm_keluarga'] = $this->input->post('nama');
			$data['status_keluarga'] = $this->input->post('status');
			$data['no_kontak'] = $this->input->post('no_telp');
			$data['kd_pasien'] = $this->input->post('kd_pasien');
			$this->m_pasien->addcontact($data);
			redirect(base_url('pasien/detail/'.$this->input->post('kd_pasien').'?msg=input_success'));
		}
	}

	public function delcontact($kd_pasien, $kd_keluarga)
	{
		$this->m_pasien->deleteContact($kd_keluarga);
		redirect(base_url('pasien/detail/'.$kd_pasien.'?msg=delete_success'));
	}
	
}
