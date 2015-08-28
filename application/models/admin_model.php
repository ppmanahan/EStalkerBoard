<?php
class Admin_Model extends CI_Model{
	function hasDuplicate($tableName, $args, $colName){
		$query = $this->db->get_where($tableName, $args);
		$result = $query->result_array();	
		foreach ($result as $row) {			
		 	if($args[$colName] == $row[$colName]){
		 		return true;	
		 	}
		 } 
		return false;
	} 

	function getUserID($buildingName){
		$this->db->select('userID');
		$query = $this->db->get_where('users', array('buildingName' => $buildingName));
		$result = $query->result_array();
		foreach ($result as $row) {
			return $row['userID'];
		}
	}

	function getSubmeterID($data){
		$userID = $data['userID'];
		$submeterName = $data['submeterName'];
		//echo "<script>alert('$userID')</script>";
		//echo "<script>alert('$submeterName')</script>";

		$query = $this->db->get_where('ebillsubmeters', array('submeterName' => $submeterName, 'userID' => $userID));
		$result = $query->result_array();
		
		//echo "<script>alert('before for')</script>";
		foreach ($result as $row) {			
			//echo "<script>alert('here')</script>";
			$id = $row['submeterID'];
			//echo "<script>alert('$id')</script>";
			return $row['submeterID'];
		}
	}

	function getBuildingNames(){
		$this->db->order_by('buildingName', 'asc');
		$this->db->where('username!=', 'admin');
		$query = $this->db->get('users');
		return $query->result_array();
	}	

	function getSubmeterNames($userID){
		$query = $this->db->get_where('ebillsubmeters', array('userID' => $userID));
		return $query->result_array();
	}	

	function addBuilding($data){
		//echo "<script>alert('add Building model')</script>";
		$newData['buildingName'] = $data['buildingName'];
		if($this->hasDuplicate('users', $newData, 'buildingName')){
			//echo "<script>alert('has duplicate')</script>";
			return false;
		}
		else{
			$this->db->insert('users', $data);
			//echo "<script>alert('no duplicate')</script>";
			return true;	
		}		
	}

	function editBuilding($data){
		$this->db->replace('users', $data);
	}

	function addSubmeter($data){
		if($this->hasDuplicate('ebillsubmeters', $data, 'submeterName')){
			return false;
		}
		$this->db->insert('ebillsubmeters', $data);
		return true;
	}

	function editSubmeter($data){		
		$userID = $data['userID'];		
		$oldName = $data['oldName'];
		$submeterName = $data['submeterName'];
		
		//echo "<script>alert('Edit submeter model: userID $userID name: $submeterName')</script>";
		$this->db->where(array('userID'=> $userID, 'submeterName' => $oldName));	
		$this->db->update('ebillsubmeters', array('submeterName' => $submeterName));
		
	}

	function addEbill($data){
		//input handling
		if((!ctype_digit($data['serviceID'])) or (!preg_match("~^\d{4}-\d{2}-\d{2}$~", $data['startDate'])) or (!preg_match("~^\d{4}-\d{2}-\d{2}$~", $data['endDate'])) or (!is_numeric($data['totalKwh'])) or (!is_numeric($data['totalCost'])) or (!is_numeric($data['genCharge'])) or (!is_numeric($data['transCharge'])) or (!is_numeric($data['distCharge']))){
			return false;
		}
		
		$this->db->insert('ebill', $data);
		return true;
	}

	function editEbill($data){		
		$this->db->replace('ebill', $data);
	}

	function addWbill($data){
		//input handling
		if((!ctype_digit($data['serviceID'])) or (!preg_match("~^\d{4}-\d{2}-\d{2}$~", $data['startDate'])) or (!preg_match("~^\d{4}-\d{2}-\d{2}$~", $data['endDate'])) or (!is_numeric($data['totalCc'])) or (!is_numeric($data['totalCost']))){
			return false;
		}
		
		$this->db->insert('wbill', $data);
		return true;
	}

	function editWbill($data){		
		//echo "<script>alert('Edit wbill model: $wbillID')</script>";
		$this->db->replace('wbill', $data);
		
	}


	function getEStatistics($data){
		$startingDate = $data['start_date'];
		$endingDate = $data['end_date'];
			
		//echo "<script>alert('$startingDate'); </script>";		
		//echo "<script>alert('$endingDate'); </script>";	

		$array = array('ebill.startDate >=' => $startingDate, 'ebill.endDate <=' => $endingDate);
		$this->db->where($array);				
		$this->db->from('ebill');		
		$this->db->order_by('totalKwh DESC');	
		$this->db->join('ebillsubmeters', 'ebill.submeterID = ebillsubmeters.submeterID');
		$this->db->join('users', 'ebill.userID = users.userID');					
		$query = $this->db->get();		
		return $query->result_array();	
	}

	function getWStatistics($data){
		$startingDate = $data['start_date'];
		$endingDate = $data['end_date'];

		$array = array('wbill.startDate >=' => $startingDate, 'wbill.endDate <=' => $endingDate);
		$this->db->where($array);				
		$this->db->from('wbill');
		$this->db->order_by('totalCc DESC');	
		$this->db->join('users', 'wbill.userID = users.userID');			
		$query = $this->db->get();
		return $query->result_array();	
	}

	function getReportInfo($data){
		$startDate1 = $data['startDate1'];
		$startDate2 = $data['startDate2'];
		$userID = $data['userID'];
		$tableName = $data['table'];

		if($tableName == 'ebill')
			$this->db->where(array('ebill.userID' => $userID, 'startDate >=' => $startDate1, 'startDate <' => $startDate2));
		else
			$this->db->where(array('userID' => $userID, 'startDate >=' => $startDate1, 'startDate <' => $startDate2));	
		
		if($tableName == "ebill"){
			//echo "<script>alert('ebill report')</script>";
			$this->db->join('ebillsubmeters', 'ebillsubmeters.submeterID = ebill.submeterID');
		}

		$query = $this->db->get($tableName);

		$count = $query->num_rows();

		//echo "<script>alert('count: $count')</script>";

		if($count >= 1){
			//echo "<script>alert('has content')</script>";
			$result = $query->result_array();

			return $result;
			
		}
		else{
			//echo "<script>alert('is null')</script>";	
			return null;
		}

	}

	function getAllEbill(){
		$this->db->from('ebill');
		$this->db->join('users', 'ebill.userID = users.userID');
		$this->db->join('ebillsubmeters', 'ebill.submeterID = ebillsubmeters.submeterID');
		$query = $this->db->get();
		return $query->result_array();
	}

	function getAllWbill(){
		$this->db->from('wbill');
		$this->db->join('users', 'wbill.userID = users.userID');
		$query = $this->db->get();
		return $query->result_array();
	}


}
?>