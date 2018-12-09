<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public $base_app = 'core/layout/adminbase_app';

	public function __construct()
	{
		parent::__construct();
		$this->load->model([
			'M_Bunga' => 'bunga',
			'M_User' => 'user',
			'M_Order' => 'order',
			'M_Confirm' => 'confirm'
		]);

		if ($this->session->userdata('login') != true) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data = [
			'title' => 'Administrator | Ot Floris',
			'menu' => 'home',
			'page' => 'admin/index'
		];

		$this->load->view($this->base_app, $data);
	}

	public function flower()
	{
		$data = [
			'title' => 'Daftar Bunga | Ot Floris',
			'menu' => 'flower',
			'page' => 'admin/flower',
			'query' => $this->bunga->getAll()->result_array()
		];

		$this->load->view($this->base_app, $data);
	}

	public function order()
	{
		$data = [
			'title' => 'Daftar Pesanan | Ot Floris',
			'menu' => 'order',
			'page' => 'admin/order',
			'query' => $this->order->getAll()->result_array()
		];

		$this->load->view($this->base_app, $data);
	}

	public function confirm()
	{
		$data = [
			'title' => 'Daftar Konfirmasi Pesanan | Ot Floris',
			'menu' => 'confirm',
			'page' => 'admin/confirm',
			'query' => $this->confirm->getAllConfirm()->result_array()
		];

		$this->load->view($this->base_app, $data);
	}

	public function confirmOrder($id)
	{
		$subject = 'Terima Kasih Telah Memesan';
		$view = 'email/confirm';
		$data = $this->order->getOne($id)->row_array();

		if($this->sendEmail($data, $subject, $view)) {
			$this->order->confirm($id);
			redirect('admin/order');

		} else {
			echo "Error";
		}
	}

	public function sendOrder($id)
	{
		$subject = 'Pesanan Anda telah dikirim';
		$view = 'email/send';
		$data = $this->order->get_one($id)->row_array();

		if($this->sendEmail($data, $subject, $view)) {
			$this->order->send($id);
			redirect('admin/order');

		} else {
			echo "Error";
		}
	}

	public function recievedOrder($id)
	{
		$subject = 'Pesanan Anda Telah Diterima';
		$view = 'email/received';
		$data = $this->order->get_one($id)->row_array();

		if($this->sendEmail($data, $subject, $view)) {
			$this->order->recieved($id);
			redirect('admin/order');

		} else {
			echo "Error";
		}
	}

	public function sendEmail($data, $subject, $view)
	{
		$from = 'andriansimamora@gmail.com';

		$html = $this->load->view($view, $data, true);

		$this->load->library('email');

		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => $from,
			'smtp_pass' => 'Ruthr0han1.',
			'crlf' => "\r\n",
			'newline' => "\r\n",
			'mailtype' => 'html',
			'wordwrap' => TRUE
		];

		$this->email->initialize($config);

		$this->email->from($from);
		$this->email->to($data['email']);
		$this->email->subject($subject);
		$this->email->message($html);

		if(!$this->email->send()) {
			return false;

		} else { 
			return true;
		}
	}
}