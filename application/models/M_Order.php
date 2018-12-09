<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Order extends CI_Model {

	public $table = 'tb_order';

	public function getOne($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->get($this->table);
		return $result;
	}

	public function getAll()
	{
		$result = $this->db->get($this->table);
		return $result;
	}

	public function getPerPage($number, $offset)
	{
		$result = $this->db->get($this->table, $number, $offset);
		return $result;
	}

	public function store($data)
	{
		$this->db->insert($this->table, $data);

		if (!$this->db->affected_rows()) {
			return false;

		} else {
			return true;
		}
	}

	public function confirmOrder($id)
	{
		$this->db->set('konfirmasi', 1);
		$this->db->where('id', $id);
		$this->db->update($this->table);

		if (!$this->db->affected_rows()) {
			return false;

		} else {
			return true;
		}
	}

	public function sendOrder($id)
	{
		$this->db->set('dikirim', 1);
		$this->db->where('id', $id);
		$this->db->update($this->table);

		if (!$this->db->affected_rows()) {
			return false;

		} else {
			return true;
		}
	}

	public function recievedOrder($id)
	{
		$this->db->set('diterima', 1);
		$this->db->where('id', $id);
		$this->db->update($this->table);

		if (!$this->db->affected_rows()) {
			return false;

		} else {
			return true;
		}
	}
}