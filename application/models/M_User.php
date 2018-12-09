<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {

	public function login($where)
	{
		return $this->db->get_where('tb_user', $where);
	}
}