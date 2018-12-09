<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flower extends CI_Controller {

	public $adminbase_app = 'core/layout/adminbase_app';
	public $base_app = 'core/layout/base_app';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Bunga', 'bunga');
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah tanaman | Ot Floris',
			'menu' => 'flower',
			'page' => 'flower/add'
		];

		$this->load->view($this->adminbase_app, $data);
	}

	public function addProcess()
	{
		$config['upload_path'] = './asset/pictures/upload/flower';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = '1024';

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('picture')) {
			$picture = $this->upload->data();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           

			$data = [
				'id' => strtolower(random_string('alnum', 10)),
				'gambar' => $picture['file_name'],
				'nama' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'deskripsi' => $this->input->post('deskripsi')
			];

			$result = $this->bunga->store($data);
			
			if (!$result) {
				//

			} else {
				chmod($picture['full_path'], 0777);
				redirect('admin/flower');
			}

		} else {
			echo $this->upload->display_errors();
		}
	}

	public function view($id)
	{
		$query = $this->bunga->getOne($id)->row();
		$data = [
			'title' => $query->nama.' - Ot Floris',
			'navigation' => 'core/element/navigation/default',
			'page' => 'flower/view',
			'query' => $query
		];

		$this->load->view($this->base_app, $data);
	}

	public function update($id)
	{
		$data = [
			'title' => 'Ubah tanaman | Ot Floris',
			'page' => 'flower/edit',
			'query' => $this->bunga->getOne($id)->row()
		];

		$this->load->view($this->adminbase_app, $data);
	}

	public function updateProcess()
	{
		$id = $this->input->post('id');

		$picture_before = $this->bunga->getOne($id)->row();

		$config['upload_path'] = './asset/pictures/upload/flower';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = '1024';

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('picture')) {

			if(isset($picture_before->gambar)) {
				$path = './asset/pictures/upload/flower/'.$picture_before->gambar;

				unlink($path);
			}

			$picture = $this->upload->data();

			$data = [
				'gambar' => $picture['file_name'],
				'nama' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'),
				'deskripsi' => $this->input->post('deskripsi')
			];

			$this->bunga->update($id, $data);
			chmod($picture['full_path'], 0777);

			redirect('admin/plant');

		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'),
				'deskripsi' => $this->input->post('deskripsi')
			];

			$this->bunga->update($id, $data);
			redirect('admin/plant');
		}
	}

	public function delete($id)
	{
		$picture = $this->bunga->getOne($id)->row();
		$path = './asset/pictures/upload/plant/'.$picture->gambar;

		if (!empty($picture->gambar)) {
			unlink($path);
		}

		$this->bunga->delete($id);
		echo json_encode(array('status' => true));
	}
}