<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Confirm extends CI_Model {

	public $table = 'tb_confirm';

	public function store($data)
	{
		$this->db->insert($this->table, $data);

		if (!$this->db->affected_rows()) {
			return false;

		} else {
			return true;
		}
	}

	public function getOne($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->get($this->table);
		return $result;
	}

	public function getAllConfirm()
	{
		$this->db->order_by('id', 'desc');
		$result = $this->db->get($this->table);
		return $result;
	}
}