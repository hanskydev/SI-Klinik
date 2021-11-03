<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_auth');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
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
			$admin = array(
				'username' => $username,
				'password' => md5($password)
			);
			$check = $this->m_auth->login($admin)->num_rows();
			if($check > 0){
				$result = $this->m_auth->getById($username);
				$data_session = array(
					'username' => $username,
					'email' => $result->email,
					'nama' => $result->nama,
					'image' => $result->image,
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

	public function admin()
	{
		$data['admin'] = $this->m_auth->getAll();

		$this->load->view('layout/header');
		$this->load->view('admin/message');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/admin', $data);
		$this->load->view('layout/footer');
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'username','trim|required|min_length[1]|max_length[255]|is_unique[admin.username]');
		$this->form_validation->set_rules('nama', 'nama','trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('email', 'nama','trim|required|valid_email|is_unique[admin.email]');
		$this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('repassword', 'password','trim|required|matches[password]');
		if ($this->form_validation->run()==true)
	   	{
			$username = $this->input->post('username');
			$data['username'] = $this->input->post('username');
			$data['nama'] = $this->input->post('nama');
			$data['email'] = $this->input->post('email');
			$data['password'] = md5($this->input->post('password'));

			$config['upload_path']          = './assets/images/users/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 1024;
			$config['file_name']            = $username;
			$config['overwrite']            = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if (!$this->upload->do_upload('image')){
				$img_path = 'assets/images/users/default.png';
			}else{
				$upload_data = $this->upload->data();
				$img_path = 'assets/images/users/'.$upload_data['file_name'];
			}
			$data['image'] = $img_path;
			$this->m_auth->save($data);
			redirect(base_url('admin?msg=input_success'));
		}
		else
		{
			redirect(base_url('admin?msg=input_error'));
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('username', 'username','trim|required');
		$this->form_validation->set_rules('nama', 'nama','trim|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('email', 'nama','trim|valid_email');
		if ($this->form_validation->run()==true)
	   	{
			$username = $this->input->post('username');
			$data['username'] = $this->input->post('username');
			$data['nama'] = $this->input->post('nama');
			$data['email'] = $this->input->post('email');
			$password = $this->input->post('password');
			if ($password != '')
			{
				$this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[255]');
				$this->form_validation->set_rules('repassword', 'password','trim|required|matches[password]');
				if ($this->form_validation->run()==true)
	   			{
				$data['password'] = md5($this->input->post('password'));
				}
				else
				{
					redirect(base_url('admin?msg=input_error'));
				}
			}

			$config['upload_path']          = './assets/images/users/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 1024;
			$config['file_name']            = $username;
			$config['overwrite']            = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if (!$this->upload->do_upload('image')){
				$this->m_auth->update($data, $username);
			}else{
				$upload_data = $this->upload->data();
				$img_path = 'assets/images/users/'.$upload_data['file_name'];
				$data['image'] = $img_path;
				$this->m_auth->update($data, $username);
			}

			if($this->session->userdata('username') == $username){
				$this->session->sess_destroy();
				redirect(base_url('auth?msg=relogin'));
			}else{
				redirect(base_url('admin?msg=edit_success'));
			}
		}
		else
		{
			redirect(base_url('admin?msg=edit_error'));
		}
	}

	public function delete($username)
	{
		$this->m_auth->delete($username);
		redirect(base_url('admin?msg=delete_success'));
	}
	
}