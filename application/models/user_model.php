<?php
class User_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function save($data){

		$this->db->insert('user_tbl', $data);
		return $this->db->affected_rows(); 

	}
}
?>