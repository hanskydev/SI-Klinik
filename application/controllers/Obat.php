<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {
	public $CI = NULL;

	function __construct(){
		parent::__construct();
		$this->load->model('m_obat');
        $this->load->library('form_validation');
		$this->CI = & get_instance();

		if($this->session->userdata('status') != 'login'){
			redirect(base_url('auth?msg=login_warning'));
		}
	}

	public function index()
	{
		$data['obat'] = $this->m_obat->getAll();

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/obat/obat', $data);
		$this->load->view('layout/footer');
	}

	public function save()
	{
		$this->form_validation->set_rules('nama','Nama Obat','required');
		$this->form_validation->set_rules('deskripsi','Deskripsi','required');
		$this->form_validation->set_rules('stok','Stok','required');
		$this->form_validation->set_rules('harga_modal','Harga Modal','required');
		$this->form_validation->set_rules('harga_jual','Harga Jual','required');
		if ($this->form_validation->run()==true)
        {
			$data['nm_obat'] = $this->input->post('nama');
			$data['deskripsi'] = $this->input->post('deskripsi');
			$data['stok'] = $this->input->post('stok');
			$data['harga_modal'] = $this->input->post('harga_modal');
			$data['harga_jual'] = $this->input->post('harga_jual');
			$this->m_obat->save($data);
			redirect(base_url('obat?msg=input_success'));
		}
		else
		{
			redirect(base_url('obat?msg=input_error'));
		}
	}

	public function edit($kd_obat)
	{
		$data['obat'] = $this->m_obat->getById($kd_obat);

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/obat/update', $data);
		$this->load->view('layout/footer');
	}

	public function update()
	{
		$this->form_validation->set_rules('nama','Nama Obat','required');
		$this->form_validation->set_rules('deskripsi','Deskripsi','required');
		$this->form_validation->set_rules('stok','Stok','required');
		$this->form_validation->set_rules('harga_modal','Harga Modal','required');
		$this->form_validation->set_rules('harga_jual','Harga Jual','required');
		if ($this->form_validation->run()==true)
        {
			$kd_obat = $this->input->post('kd_obat');
			$data['nm_obat'] = $this->input->post('nama');
			$data['deskripsi'] = $this->input->post('deskripsi');
			$data['stok'] = $this->input->post('stok');
			$data['harga_modal'] = $this->input->post('harga_modal');
			$data['harga_jual'] = $this->input->post('harga_jual');
			$this->m_obat->update($data, $kd_obat);
			redirect(base_url('obat?msg=edit_success'));
		}
		else
		{
			redirect(base_url('obat?msg=edit_error'));
		}
	}

	public function delete($kd_obat)
	{
		$this->m_obat->delete($kd_obat);
		redirect(base_url('obat?msg=delete_success'));
	}

	public function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
	
}
