<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class E404 extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/404');
	}
	
}
