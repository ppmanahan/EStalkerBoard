<?php
	class Buildings extends CI_Model{

		function building_list(){						
			$this->db->select('buildingName');
			$this->db->order_by('buildingName', 'asc');
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function submeter_list($userID){
			$this->db->select('submeterName');
			$query = $this->db->get_where('ebillsubmeters', array('userID' => $userID));
			return $query->result_array();	
		}

		function ebill_list($userID){
			$query = $this->db->get_where('ebill', array('userID' => $userID));
			return $query->result_array();	
		}
	}
?>