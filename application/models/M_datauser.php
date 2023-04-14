<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_datauser extends CI_Model {


	public function getalldata(){
		$this->db->select('*');
		$this->db->from('users');
		$query = $this->db->get();
		return $query->result_array();
	}
	// public function getdataid(){
	// 	return $this->db->get_where('users', ['id' => $id ])->row_array();
	// }
}
