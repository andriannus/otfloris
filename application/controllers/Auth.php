<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_User', 'user');
	}

	public function index()
	{
		if ($this->session->userdata('login') == true) {
			redirect('admin');

		} else {
			$this->load->view('core/layout/login');
		}
	}

	public function loginProcess()
	{
		$where = [
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		];

		$check = $this->user->login($where)->num_rows();

		if ($check > 0) {
			$data_session = array(
				'nama' => $username,
				'login' => true
			);

			$this->session->set_userdata($data_session);
			redirect('admin');

		} else {
			$this->session->set_flashdata('error', 'Username atau Password salah');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('site/login');
	}
}
