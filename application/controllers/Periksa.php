<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periksa extends CI_Controller {
	public $CI = NULL;

	function __construct(){
		parent::__construct();
		$this->load->model('m_periksa');
        $this->load->library('form_validation');
		$this->CI = & get_instance();
	
		if($this->session->userdata('status') != 'login'){
			redirect(base_url('auth?msg=login_warning'));
		}
	}

	public function index()
	{
		$data['periksa'] = $this->m_periksa->getAll();

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/periksa/periksa', $data);
		$this->load->view('layout/footer');
	}

	public function diagnosa($kd_periksa)
	{
		$data['periksa'] = $this->m_periksa->getDiagnosa($kd_periksa);
		$data['penyakit'] = $this->m_periksa->getPenyakit();
		$data['obat'] = $this->m_periksa->getObat();
		$data['layanan'] = $this->m_periksa->getLayanan();

		$data['get_penyakit'] = $this->m_periksa->getPasienPenyakit($kd_periksa);
		$data['get_layanan'] = $this->m_periksa->getPasienLayanan($kd_periksa);

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/periksa/diagnosa', $data);
		$this->load->view('layout/footer');
	}

	public function create()
	{
		$data['periksa'] = $this->m_periksa->getAll();
		$data['pasien'] = $this->m_periksa->getPasien();
		$data['dokter'] = $this->m_periksa->getDokter();
		$data['penyakit'] = $this->m_periksa->getPenyakit();
		$data['obat'] = $this->m_periksa->getObat();
		$data['layanan'] = $this->m_periksa->getLayanan();

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/periksa/create', $data);
		$this->load->view('layout/footer');
	}

	public function save()
	{
		$this->form_validation->set_rules('kd_pasien','Kode Pasien','required');
		$this->form_validation->set_rules('kd_dokter','Kode Dokter','required');
		$this->form_validation->set_rules('tanggal_periksa','Tanggal Periksa','required');
		$this->form_validation->set_rules('keluhan','Keluhan Pasien','required');
		if ($this->form_validation->run()==true)
        {
			$data['kd_pasien'] = $this->input->post('kd_pasien');
			$data['kd_dokter'] = $this->input->post('kd_dokter');
			$data['tgl_periksa'] = $this->input->post('tanggal_periksa');
			$data['keluhan'] = $this->input->post('keluhan');

			$data['kd_penyakit'] = NULL;
			$data['kd_resep'] = NULL;
			$data['kd_layanan'] = NULL;
			$insert_id = $this->m_periksa->save($data);
			redirect(base_url('diagnosa/'.$insert_id.'?msg=input_success'));
		}
		else
		{
			redirect(base_url('periksa?msg=input_error'));
		}
	}

	public function proses()
	{
		$kd_periksa = $this->input->post('kd_periksa');
		$data['kd_penyakit'] = $this->input->post('kd_penyakit');
		$data['kd_layanan'] = $this->input->post('kd_layanan');
		$this->m_periksa->update($data, $kd_periksa);
		redirect(base_url('diagnosa/'.$kd_periksa.'?msg=diagnosa'));
	}

	public function delete($kd_periksa)
	{
		$this->m_periksa->delete($kd_periksa);
		redirect(base_url('periksa?msg=delete_success'));
	}

	public function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
	
}
