<?php

class AdminPanel extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper(array('url', 'form', 'date', 'text'));
		$this->load->library(array('session', 'form_validation'));
        //for navbar names or use sessions
        $this->load->model('admin_model');
    }

	function main(){		
		
		$data['studentList'] = $this->admin_model->allStudents();
		$data['subjectList'] = $this->admin_model->allSubjects();
		$data['main_content'] = 'adminPanel_view';

		$this->load->view('template', $data);
	}

	function students(){

		$data['title'] = "E-Stalker Board - Student";
		$this->load->view('inc/header_view', $data);
			
		$data['main'] = site_url('adminPanel/main');
		$this->load->view('inc/navbar', $data);

		$student_number = $this->uri->segment(3);
		$data['student'] = $this->admin_model->studentInfo($student_number);
		
		$sn = substr_replace($student_number, '-', 4, 0);
		$data['sn'] = $sn;

		$this->load->view('student', $data);

		$this->load->view('inc/footer_view');	
	}

	function subjects(){
		$data['title'] = "E-Stalker Board - Subject";
		$this->load->view('inc/header_view', $data);
			
		$data['main'] = site_url('adminPanel/main');
		$this->load->view('inc/navbar', $data);

		$class_code = $this->uri->segment(3);
		$subject = $this->admin_model->subjectInfo($class_code);
		$data['subject'] = $subject;
		$data['enrolledStudents'] = $this->admin_model->studentsEnrolled($subject['name']);
		$data['totalEnrolled'] = $this->admin_model->totalEnrolled($subject['name']);
		$this->load->view('subject', $data);

		$this->load->view('inc/footer_view');
			
	}

	public function sched_input() {
		
		$days = $this->input->post('day');
		$day = implode("", $days);
		
		$inputdata = array(
			'day' => $day,
			'start_time' => $this->input->post('start_time'),
			'end_time' => $this->input->post('end_time')
			);

		//call model function for this
		$freeStudents = $this->admin_model->availableStudents($inputdata);
		$totalAvailable = $this->admin_model->totalAvailable($inputdata);
		$data['totalAvailable'] = $totalAvailable;

		if($freeStudents === 'empty') {
			//do nothing
		}
		else {
			$data['freeStudents'] = $freeStudents;
			//load the data in views
			if ($this->input->post('ajax')) {
				$this->load->view('sched_result', $data);			
			}
		}
	}

		
		

}

?>