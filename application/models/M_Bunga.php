<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Bunga extends CI_Model {

	public $table = 'tb_plant';

	public function getOne($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->table);
	}

	public function getAll()
	{
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->table);
	}

	public function getPerPage($number, $offset)
	{
		return $this->db->get($this->table, $number, $offset);
	}

	public function getPerPageSearch($search, $number, $offset)
	{
		$this->db->like('nama', $search);
		return $this->db->get($this->table, $number, $offset);
	}

	public function getSearch($query)
	{
		$this->db->like('nama', $query);
		return $this->db->get($this->table);
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

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);

		if (!$this->db->affected_rows()) {
			return false;
		
		} else {
			return true;
		}
	}

	public function destroy($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);

		if (!$this->db->affected_rows()) {
			return false;
		
		} else {
			return true;
		}
	}
}