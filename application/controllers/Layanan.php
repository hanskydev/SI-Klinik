<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class layanan extends CI_Controller {
    public $CI = NULL;

	function __construct(){
		parent::__construct();
		$this->load->model('m_layanan');
        $this->load->library('form_validation');
        $this->CI = & get_instance();
	
		if($this->session->userdata('status') != 'login'){
			redirect(base_url('auth?msg=login_warning'));
		}
	}

	public function index()
	{
		$data['layanan'] = $this->m_layanan->getAll();

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/layanan/layanan', $data);
		$this->load->view('layout/footer');
	}

	public function save()
	{
		$this->form_validation->set_rules('nama','Nama layanan','required');
		$this->form_validation->set_rules('biaya','Biaya','required');
		if ($this->form_validation->run()==true)
        {
			$data['nm_layanan'] = $this->input->post('nama');
			$data['biaya'] = $this->input->post('biaya');
			$this->m_layanan->save($data);
			redirect(base_url('layanan?msg=input_success'));
		}
		else
		{
			redirect(base_url('layanan?msg=input_error'));
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('nama','Nama layanan','required');
		$this->form_validation->set_rules('biaya','Biaya','required');
		if ($this->form_validation->run()==true)
        {
			$kd_layanan = $this->input->post('kd_layanan');
			$data['nm_layanan'] = $this->input->post('nama');
			$data['biaya'] = $this->input->post('biaya');
			$this->m_layanan->update($data, $kd_layanan);
			redirect(base_url('layanan?msg=edit_success'));
		}
		else
		{
			redirect(base_url('layanan?msg=edit_error'));
		}
	}

	public function delete($kd_layanan)
	{
		$this->m_layanan->delete($kd_layanan);
		redirect(base_url('layanan?msg=delete_success'));
	}

    public function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
	
}
