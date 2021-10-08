<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_transaksi');
    	$this->load->library('form_validation');
		$this->CI = & get_instance();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth?msg=login_warning"));
		}
	}

	public function index()
	{
		$data['transaksi'] = $this->m_transaksi->getAll();

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/transaksi/transaksi', $data);
		$this->load->view('layout/footer');
	}

	public function new()
	{
		$id = $this->m_transaksi->getIdTransaksi();

		date_default_timezone_set("Asia/Jakarta");

		$data['kd_transaksi'] = $id;
		$data['tgl_transaksi'] = date("j F Y, G:i");
		$data['kasir'] = $this->session->userdata("username");
		$data['status'] = 'Proses';
		$insert_id = $this->m_transaksi->save($data);
		redirect(base_url('transaksi/create/'.$id.'?msg=transaction_new'));
	}
	
	public function create($kd_transaksi)
	{
		$data['transaksi'] = $this->m_transaksi->getById($kd_transaksi);
		$data['obat'] = $this->m_transaksi->getObat();
		$data['layanan'] = $this->m_transaksi->getLayanan();
		$data['item'] = $this->m_transaksi->getItem($kd_transaksi);

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/transaksi/create', $data);
		$this->load->view('layout/footer');
	}

	public function additem()
	{
		$this->form_validation->set_rules('kd_transaksi','Kode Transaksi','required');
		$this->form_validation->set_rules('item_baru','Item Baru','required');
		$this->form_validation->set_rules('item_harga','Item Harga','required');
		$this->form_validation->set_rules('item_modal','Item Modal','required');
		if ($this->form_validation->run()==true)
        {
			$id = $this->m_transaksi->getIdItem();

			$data['kd_item'] = $id;
			$kd_transaksi = $this->input->post('kd_transaksi');
			$data['kd_transaksi'] = $this->input->post('kd_transaksi');
			$data['nm_item'] = $this->input->post('item_baru');
			$data['harga'] = $this->input->post('item_harga');
			$data['modal'] = $this->input->post('item_modal');
			$data['jumlah'] = '1';
			$this->m_transaksi->saveItem($data);
			redirect(base_url('transaksi/create/'.$kd_transaksi.'?msg=item_success'));
		}
		else
		{
			redirect(base_url('transaksi/create/'.$kd_transaksi.'?msg=item_error'));
		}
	}

	public function updateitem()
	{
		$this->form_validation->set_rules('kd_transaksi','Kode Transaksi','required');
		$this->form_validation->set_rules('kd_item','Kode Item','required');
		$this->form_validation->set_rules('item_jumlah','Jumlah Item','required');
		if ($this->form_validation->run()==true)
        {
			$kd_transaksi = $this->input->post('kd_transaksi');
			$kd_item = $this->input->post('kd_item');
			$data['jumlah'] = $this->input->post('item_jumlah');
			$this->m_transaksi->updateItem($data, $kd_item);
			redirect(base_url('transaksi/create/'.$kd_transaksi.'?msg=item_update'));
		}
		else
		{
			redirect(base_url('transaksi/create/'.$kd_transaksi.'?msg=item_error'));
		}
	}

	public function edit($kd_transaksi)
	{
		$data['transaksi'] = $this->m_transaksi->getById($kd_transaksi);

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/transaksi/update', $data);
		$this->load->view('layout/footer');
	}

	public function update()
	{
		$this->form_validation->set_rules('kd_transaksi','Nama Transaksi','required');
		$this->form_validation->set_rules('tgl_transaksi','Tanggal Transaksi','required');
		$this->form_validation->set_rules('total','Total Item','required');
		$this->form_validation->set_rules('bayar','Uang Konsumen','required');
		$this->form_validation->set_rules('kembalian','Kembalian Uang Konsumen','required');
		$this->form_validation->set_rules('modal','Total Modal Item','required');
		$this->form_validation->set_rules('kasir','Kasir','required');
		if ($this->form_validation->run()==true)
        {
			$kd_transaksi = $this->input->post('kd_transaksi');
			$data['tgl_transaksi'] = $this->input->post('tgl_transaksi');
			$data['total'] = $this->input->post('total');
			$data['bayar'] = $this->input->post('bayar');
			$data['kembalian'] = $this->input->post('kembalian');
			$data['modal'] = $this->input->post('modal');
			$data['kasir'] = $this->input->post('kasir');
			$data['status'] = 'Selesai';
			$this->m_transaksi->update($data, $kd_transaksi);
			redirect(base_url('transaksi?msg=transaction_success'));
		}
		else
		{
			redirect(base_url('transaksi?msg=transaction_error'));
		}
	}

	public function delete($kd_transaksi)
	{
		$this->m_transaksi->delete($kd_transaksi);
		redirect(base_url('transaksi?msg=transaction_delete'));
	}

	public function deleteitem($kd_transaksi, $kd_item)
	{
		$this->m_transaksi->deleteItem($kd_item);
		redirect(base_url('transaksi/create/'.$kd_transaksi.'?msg=item_delete'));
	}

	public function clearitem($kd_transaksi)
	{
		$this->m_transaksi->clearItem($kd_transaksi);
		redirect(base_url('transaksi/create/'.$kd_transaksi.'?msg=item_delete'));
	}

	public function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
	
}
