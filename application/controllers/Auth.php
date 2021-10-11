<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_auth');
		$this->load->library('form_validation');
	}

	function index(){
		$this->load->view('auth/login');
		$this->load->view('admin/message');

		if($this->session->userdata('status') == 'login'){
			redirect(base_url('?msg=login_info'));
		}
	}

	function login(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run()==true)
        {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$where = array(
				'username' => $username,
				'password' => md5($password)
			);
			$cek = $this->m_auth->cek_login('admin',$where)->num_rows();
			if($cek > 0){
				$result = $this->m_auth->getById($username);
				$data_session = array(
					'username' => $username,
					'nama' => $result->nm_admin,
					'status' => 'login'
				);
				$this->session->set_userdata($data_session);
				redirect(base_url('?msg=login'));
			}else{
				redirect(base_url('auth?msg=login_error'));
			}
		}
		else
		{
			redirect(base_url('auth?msg=login_form'));
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('auth?msg=logout'));
	}
	
}