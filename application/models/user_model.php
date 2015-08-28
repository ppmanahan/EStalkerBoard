<?php
class User_Model extends CI_Model{
	function getUserInfo($userID){
		$query = $this->db->get_where('users', array('userID' => $userID));
		return $query->result_array();	
	}
}
?>