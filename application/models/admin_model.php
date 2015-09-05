<?php
class Admin_Model extends CI_Model{

	function allStudents() {
		$this->db->order_by('name', 'asc');
		$query = $this->db->get('students');
		return $query->result_array();
	}

	function allSubjects() {
		$this->db->order_by('name', 'asc');
		$this->db->group_by('name');
		$query = $this->db->get('classes');
		return $query->result_array();
	}

	function studentInfo($student_number) {
		
		$query = $this->db->get_where('students', array('student_number' => $student_number));
		$result =  $query->result_array();
		foreach ($result as $row) {
			return $row;
		}
	}

	function subjectInfo($class_code) {
		
		$query = $this->db->get_where('classes', array('class_code' => $class_code));
		$result =  $query->row_array();
		return $result;
	}

	function studentsEnrolled($subject_name) { //$class_code
		/*
		$this->db->select('students.name');
		$this->db->join('students', 'students.student_number = schedule.student_number');
		$query = $this->db->get_where('schedule', array('class_code' => $class_code));

		return $query->result_array();
		*/
		$this->db->select('students.name');
		$this->db->join('schedule', 'classes.class_code = schedule.class_code');
		$this->db->join('students', 'students.student_number = schedule.student_number');
		$this->db->group_by('students.name');
		$query = $this->db->get_where('classes', array('classes.name' => $subject_name));

		return $query->result_array();
	}

	function totalEnrolled($subject_name) { //$class_code
		/*
		$this->db->select('students.name');
		$this->db->join('students', 'students.student_number = schedule.student_number');
		$query = $this->db->get_where('schedule', array('class_code' => $class_code));
		*/

		$this->db->select('students.name');
		$this->db->join('schedule', 'classes.class_code = schedule.class_code');
		$this->db->join('students', 'students.student_number = schedule.student_number');
		$this->db->group_by('students.name');
		$query = $this->db->get_where('classes', array('classes.name' => $subject_name));
		return $query->num_rows();
	}

	function availableStudents($data) {
		$day = $data['day'];
		$start_time = $data['start_time'];
		$end_time = $data['end_time'];

				
		//echo "<script>alert('$endingDate'); </script>";	

		$array = array('classes.start_time >=' => $start_time, 'classes.end_time <=' => $end_time);
		$this->db->where($array);				
		$this->db->from('classes');		
		$this->db->order_by('name asc');	
		$this->db->join('schedule', 'classes.class_code = schedule.class_code');
		$this->db->join('students', 'students.student_number = schedule.student_number');				
		$query = $this->db->get();		
		return $query->result_array();
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