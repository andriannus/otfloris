<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function index()
	{
		$data = [
			'title' => 'Keranjang',
			'navigation' => 'core/element/navigation/default',
			'menu' => 'cart',
			'page' => 'cart/index',
			'query' => $this->cart->contents()
		];

		$this->load->view('core/layout/base_app', $data);
	}

	public function add()
	{
		$data = [
			'id' => $this->input->post('id'),
			'qty' => $this->input->post('qty'),
			'price' => $this->input->post('price'),
			'name' => $this->input->post('name'),
			'pict' => $this->input->post('pict')
		];

		$this->cart->insert($data);
		redirect('cart');
	}

	public function update()
	{
		$data = [
			'rowid' => $this->input->post('rowid'),
			'qty' => $this->input->post('qty')
		];

		$this->cart->update($data);
		redirect('cart');
	}

	public function remove($rowid)
	{
		$data = [
			'rowid' => $rowid,
			'qty' => 0
		];

		$this->cart->update($data);
		redirect('cart');
	}

	public function checkout()
	{
		$data = [
			'title' => 'Proses Checkout',
			'navigation' => 'core/element/navigation/default',
			'menu' => 'cart',
			'page' => 'cart/checkout',
			'query' => $this->cart->contents()
		];

		$this->load->view('core/layout/base_app', $data);
	}
}