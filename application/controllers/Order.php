<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public $base_app = 'core/layout/base_app';

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('string');
		$this->load->model([
			'M_Order' => 'order',
			'M_Confirm' => 'confirm'
		]);
	}

	public function view($id)
	{
		$query = $this->order->getOne($id)->row();
		$data = [
			'title' => 'Detail Pesanan',
			'navigation' => 'core/element/navigation/default',
			'page' => 'order/view',
			'query' => $query
		];

		$this->load->view($this->base_app, $data);
	}

	public function add()
	{
		$tanggal = date('Y-m-d H:i:s');
		$data = [
			'id' => strtolower(random_string('alnum', 10)),
			'barang' => $this->input->post('barang'),
			'ucapan' => $this->input->post('ucapan'),
			'pengirim' => $this->input->post('pengirim'),
			'nama_depan' => $this->input->post('nama_depan'),
			'nama_belakang' => $this->input->post('nama_belakang'),
			'telepon' => $this->input->post('telepon'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'biaya' => $this->input->post('biaya'),
			'tanggal' => $tanggal
		];

		if($this->sendEmail($data)) {
			$id = $data['id'];

			$result = $this->order->store($data);
			if (!$result) {
				//

			} else {
				$this->cart->destroy();
				redirect('order/view/'.$id);
			}

		} else {
			echo "Error";
		}
	}

	public function sendEmail($data)
	{
		$from = 'andriansimamora@gmail.com';
		$html = $this->load->view('email/order', $data, true);

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
		$this->email->subject('Terima Kasih Telah Memesan');
		$this->email->message($html);

		if(!$this->email->send()) {
			return false;

		} else { 
			return true;
		}
	}

	public function search()
	{
		$data = [
			'title' => 'Detail Pesanan',
			'navigation' => 'core/element/navigation/default',
			'menu' => 'search',
			'page' => 'order/search'
		];

		$this->load->view($this->base_app, $data);
	}

	public function searchProcess()
	{
		$id = $this->input->post('id');

		$this->view($id);
	}

	public function check($id_pesanan)
	{
		$query = $this->order->getOne($id_pesanan)->row();
		$check = $this->order->getOne($id_pesanan)->num_rows();

		if ($check > 0) {
			$data = [
				'title' => 'Detail Pesanan',
				'navigation' => 'core/element/navigation/default',
				'menu' => 'home',
				'page' => 'order/view',
				'query' => $query
			];

			$this->load->view($this->base_app, $data);

		} else {
			echo "Tidak ditemukan";
		}
	}

	public function confirmProcess()
	{
		$id = $this->input->post('id');
		$check = $this->order->getOne($id)->num_rows();

		if ($check > 0) {
			$config['file_name'] = 'konfirmasi_'.$id.'_'.mt_rand(0, 100);
			$config['upload_path'] = './asset/pictures/upload/confirm';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = '1024';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$gambar = $this->upload->data();

				$data = [
					'id_pesanan' => $id,
					'tanggal' => $this->input->post('tanggal'),
					'foto' => $gambar['file_name']
				];

				$result = $this->confirm->store($data);
				
				if (!$result) {
					//

				} else {
					chmod($gambar['full_path'], 0777);

					$this->session->set_flashdata('success', 'Konfirmasi pesanan telah dikirim');
					redirect('site/confirm');
				}

			} else {
				echo $this->upload->display_errors();
			}

		} else {
			$this->session->set_flashdata('error404', 'ID Pesanan tidak ada.');
			redirect('site/confirm');
		}
	}
}