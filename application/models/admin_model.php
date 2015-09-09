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


	/****************STUDENT PAGE***********************/

	function studentInfo($student_number) {
		
		$query = $this->db->get_where('students', array('student_number' => $student_number));
		$result =  $query->result_array();
		foreach ($result as $row) {
			return $row;
		}
	}

	function studentSubjects($student_number){
		
		$this->db->join('classes', 'classes.class_code = schedule.class_code');
		$query = $this->db->get_where('schedule', array('schedule.student_number' => $student_number));

		return $query->result_array();
	}

	function totalUnits($student_number){
		$this->db->select_sum('units');
		$this->db->join('classes', 'classes.class_code = schedule.class_code');
		$query = $this->db->get_where('schedule', array('schedule.student_number' => $student_number));
		$result = $query->result_array();
		
		return $result[0];
	}


	/****************SUBJECT PAGE***********************/

	function subjectInfo($class_code) {
		
		$query = $this->db->get_where('classes', array('class_code' => $class_code));
		$result =  $query->row_array();
		return $result;
	}

	//funtion to get the students enrolled in a subject
	function enrolled($subject_name){
		$this->db->select('students.name, students.student_number');
		$this->db->join('schedule', 'classes.class_code = schedule.class_code');
		$this->db->join('students', 'students.student_number = schedule.student_number');
		$this->db->group_by('students.name');
		$query = $this->db->get_where('classes', array('classes.name' => $subject_name));

		return $query;
	}

	//to store the query in nested array
	function studentsEnrolled($subject_name) {
		
		$query = $this->enrolled($subject_name);
		return $query->result_array();
	}

	//to get the total of students taking that subject
	function totalEnrolled($subject_name) {

		$query = $this->enrolled($subject_name);
		return $query->num_rows();
	}


	/****************SEARCH BY SCHEDULE***********************/

	//function to get the set of students without classes
	function freeStudents($data) {
		$days = $data['day'];
		$start_time = $data['start_time'];
		$end_time = $data['end_time'];

		$hasClass = array();
		$duplicates = array();

		//query to get students with class during the time interval
		foreach($days as $day){ //iterate all the checked days
			if($day === 'M'){
				$array = array('classes.start_time >=' => $start_time, 'classes.end_time <=' => $end_time);
				$this->db->where($array);
				$this->db->like('classes.day', $day);		
				$this->db->from('classes');		
				$this->db->order_by('students.name asc');	
				$this->db->join('schedule', 'classes.class_code = schedule.class_code');
				$this->db->join('students', 'students.student_number = schedule.student_number');				
				$query1 = $this->db->get();

				$res = $query1->result_array();
			}else if($day === 'T'){
				$array = array('classes.start_time >=' => $start_time, 'classes.end_time <=' => $end_time);
				$this->db->where($array);
				$this->db->like('classes.day', $day);		
				$this->db->from('classes');		
				$this->db->order_by('students.name asc');	
				$this->db->join('schedule', 'classes.class_code = schedule.class_code');
				$this->db->join('students', 'students.student_number = schedule.student_number');				
				$query1 = $this->db->get();

				$res = $query1->result_array();
			}else if($day === 'W'){
				$array = array('classes.start_time >=' => $start_time, 'classes.end_time <=' => $end_time);
				$this->db->where($array);
				$this->db->like('classes.day', $day);		
				$this->db->from('classes');		
				$this->db->order_by('students.name asc');	
				$this->db->join('schedule', 'classes.class_code = schedule.class_code');
				$this->db->join('students', 'students.student_number = schedule.student_number');				
				$query1 = $this->db->get();

				$res = $query1->result_array();
			}else if($day === 'Th'){
				$array = array('classes.start_time >=' => $start_time, 'classes.end_time <=' => $end_time);
				$this->db->where($array);
				$this->db->like('classes.day', $day);		
				$this->db->from('classes');		
				$this->db->order_by('students.name asc');	
				$this->db->join('schedule', 'classes.class_code = schedule.class_code');
				$this->db->join('students', 'students.student_number = schedule.student_number');				
				$query1 = $this->db->get();

				$res = $query1->result_array();
			}else if($day === 'F'){
				$array = array('classes.start_time >=' => $start_time, 'classes.end_time <=' => $end_time);
				$this->db->where($array);
				$this->db->like('classes.day', $day);		
				$this->db->from('classes');		
				$this->db->order_by('students.name asc');	
				$this->db->join('schedule', 'classes.class_code = schedule.class_code');
				$this->db->join('students', 'students.student_number = schedule.student_number');				
				$query1 = $this->db->get();

				$res = $query1->result_array();
			}else if($day === 'S'){
				$array = array('classes.start_time >=' => $start_time, 'classes.end_time <=' => $end_time);
				$this->db->where($array);
				$this->db->like('classes.day', $day);		
				$this->db->from('classes');		
				$this->db->order_by('students.name asc');	
				$this->db->join('schedule', 'classes.class_code = schedule.class_code');
				$this->db->join('students', 'students.student_number = schedule.student_number');				
				$query1 = $this->db->get();

				$res = $query1->result_array();
			}
			
			//store the student number of mems with classes
			foreach($res as $row){
				array_push($duplicates, $row['student_number']); 
			}
		}

		//get the intersection of the set of students
		$countStudents = array_count_values($duplicates); //to count the occurence of student.
		foreach($countStudents as $key=>$countStudent){
			if($countStudent > 1){						//if more than 1, then store it
				array_push($hasClass, $key);
			}
		}

		//get the students with no enlisted class/mga di nagpasa ng form 5!!!
		$this->db->select('students.student_number as student_number');
		$this->db->where('schedule.class_code', NULL);	
		$this->db->from('students');		
		$this->db->order_by('students.name asc');	
		$this->db->join('schedule', 'students.student_number = schedule.student_number', 'left');			
		$query3 = $this->db->get();

		$empty = $query3->result_array();
		foreach($empty as $emp){
			array_push($hasClass, $emp['student_number']);
		}
		
		//query to get students without class
		if(empty($hasClass)){ //if empty, all student are available
			$this->db->order_by('name', 'asc');
			$query2 = $this->db->get('students');
		} else {
			$this->db->where_not_in('student_number', $hasClass);
			$this->db->order_by('name asc');	
			$this->db->group_by('student_number');
			$query2 = $this->db->get('students');
		}
		return $query2;
	}

	//to store the query in nested array
	function availableStudents($data){
		$query = $this->freeStudents($data);
		return $query->result_array();	
	}

	//to get the total of available students
	function totalAvailable($data){
		$query = $this->freeStudents($data);
		return $query->num_rows();
	}

}
?>