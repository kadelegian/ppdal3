<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_import extends CI_Model {

	public function insert_pedagang($data){
		$insert = $this->db->insert_batch('t_kartu', $data);
		if($insert){
			return true;
		}
	}
	public function getData(){
		
		return $this->db->get('t_kartu')->result_array();
	}

}