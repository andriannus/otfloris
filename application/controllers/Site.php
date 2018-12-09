<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public $navigation = 'core/element/navigation/default';
	public $base_app = 'core/layout/base_app';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Bunga', 'bunga');
	}

	public function index()
	{
		$data = array(
			'title' => 'Selamat Datang di Ot Floris',
			'navigation' => $this->navigation,
			'menu' => 'home',
			'page' => 'site/index',
			'query' => $this->bunga->getAll()->result_array()
		);

		$this->load->view($this->base_app, $data);
	}

	public function flower()
	{
		$data = array(
			'title' => 'Berbagai Jenis Karangan Bunga | OT Floris',
			'navigation' => $this->navigation,
			'menu' => 'home',
			'page' => 'site/flower'
		);

		$jumlah_data = $this->bunga->getAll()->num_rows();

		$this->load->library('pagination');

		$config['base_url'] = base_url().'site/flower/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 1;

		$config['attributes'] = ['class' => 'page-link'];

		$config['full_tag_open'] = '<nav> <ul class="pagination">';
		$config['full_tag_close'] = '</ul> </nav>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link">';
		$config['cur_tag_close'] = '</a> </li>';

		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$form = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['query'] = $this->bunga->getPerPage($config['per_page'], $form)->result_array();

		$this->load->view('core/layout/base_app', $data);
	}

	public function search()
	{
		$search = $this->input->get('q');
		$page = $this->input->get('per_page');

		$jumlah_data = $this->bunga->getSearch($search)->num_rows();

		if (!$search) {
			$data = [
				'title' => 'Ot Garden',
				'navigation' => $this->navigation,
				'menu' => 'home',
				'page' => 'site/flower',
				'message' => 'Mohon maaf, pencarian Anda tidak ditemukan'
			];

			$this->load->view($this->base_app, $data);

		} else if ($jumlah_data < 1){
			$data = [
				'title' => 'Ot Garden',
				'navigation' => $this->navigation,
				'menu' => 'home',
				'page' => 'site/flower',
				'message' => 'Mohon maaf, pencarian Anda tidak ditemukan'
			];

			$this->load->view($this->base_app, $data);

		} else {
			$data = array(
				'title' => 'Ot Garden',
				'navigation' => $this->navigation,
				'menu' => 'home',
				'page' => 'site/flower'
			);

			$this->load->library('pagination');

			$config['page_query_string'] = TRUE;
			$config['base_url'] = base_url().'site/search?q='.$search;
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = 6;

			$config['full_tag_open'] = '<nav> <ul class="pagination">';
			$config['full_tag_close'] = '</ul> </nav>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a>';
			$config['cur_tag_close'] = '</a></li>';

			$config['first_link'] = '&laquo; First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';

			$config['last_link'] = 'Last &raquo;';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';

			$config['prev_link'] = '&laquo;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';

			$config['next_link'] = '&raquo;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';

			$form = $page;

			$this->pagination->initialize($config);

			$data['query'] = $this->bunga->getPerPageSearch($search, $config['per_page'], $form)->result_array();

			$this->load->view($this->base_app, $data);
		}	
	}

	public function confirm()
	{
		$data = [
			'title' => 'Konfirmasi Pesanan',
			'navigation' => $this->navigation,
			'menu' => 'confirm',
			'page' => 'order/confirm'
		];

		$this->load->view($this->base_app, $data);
	}
}
