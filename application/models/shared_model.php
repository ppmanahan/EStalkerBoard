<?php

class Shared_Model extends CI_Model{
	
	function getEbillList($userID){
		$this->db->where('ebill.userID=', $userID);
		$this->db->from('ebill');
		$this->db->join('ebillsubmeters', 'ebill.submeterID = ebillsubmeters.submeterID');
		$query = $this->db->get();
		return $query->result_array();	
	}

	function getWbillList($userID){
		$query = $this->db->get_where('wbill', array('userID' => $userID));		
		return $query->result_array();	
	}
}

?>