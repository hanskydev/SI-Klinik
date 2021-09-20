<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_penyakit');
        $this->load->library('form_validation');
	
		if($this->session->userdata('status') != 'login'){
			redirect(base_url('auth?msg=login_warning'));
		}
	}

	public function index()
	{
		$data['penyakit'] = $this->m_penyakit->getAll();

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/penyakit/penyakit', $data);
		$this->load->view('layout/footer');
	}

	public function save()
	{
		$this->form_validation->set_rules('nama','Nama Penyakit','required');
		$this->form_validation->set_rules('kd_icd','Kode ICD','required');
		if ($this->form_validation->run()==true)
        {
			$data['nm_penyakit'] = $this->input->post('nama');
			$data['kd_icd'] = $this->input->post('kd_icd');
			$this->m_penyakit->save($data);
			redirect(base_url('penyakit?msg=input_success'));
		}
		else
		{
			redirect(base_url('penyakit?msg=input_error'));
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('nama','Nama Penyakit','required');
		$this->form_validation->set_rules('kd_icd','Kode ICD','required');
		if ($this->form_validation->run()==true)
        {
			$kd_penyakit = $this->input->post('kd_penyakit');
			$data['nm_penyakit'] = $this->input->post('nama');
			$data['kd_icd'] = $this->input->post('kd_icd');
			$this->m_penyakit->update($data, $kd_penyakit);
			redirect(base_url('penyakit?msg=edit_success'));
		}
		else
		{
			redirect(base_url('penyakit?msg=edit_error'));
		}
	}

	public function delete($kd_penyakit)
	{
		$this->m_penyakit->delete($kd_penyakit);
		redirect(base_url('penyakit?msg=delete_success'));
	}
	
}
