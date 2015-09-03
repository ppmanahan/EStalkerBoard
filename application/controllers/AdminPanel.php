<?php

class AdminPanel extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper(array('url', 'form', 'date', 'text'));
		$this->load->library(array('session', 'form_validation'));
        //for navbar names or use sessions
        $this->load->model('shared_model');
        $this->load->model('admin_model');
        $this->load->model('users_model');
    }

	function main(){		

		$data['title'] = "E-Stalker Board";
		$this->load->view('inc/header_view', $data);
		
		$data['main'] = site_url('adminPanel/main');
		$this->load->view('inc/navbar', $data);

		$data['studentList'] = $this->admin_model->allStudents();
		$data['subjectList'] = $this->admin_model->allSubjects();
		$this->load->view('adminPanel_view', $data);

		$this->load->view('inc/footer_view');
	}

	function students(){

		$data['title'] = "E-Stalker Board - Student";
		$this->load->view('inc/header_view', $data);
			
		$data['main'] = site_url('adminPanel/main');
		$this->load->view('inc/navbar', $data);

		$student_number = $this->uri->segment(3);
		$data['student'] = $this->admin_model->studentInfo($student_number);
		$this->load->view('student', $data);

		$this->load->view('inc/footer_view');
			
	}

	function subjects(){
		$data['title'] = "E-Stalker Board - Subject";
		$this->load->view('inc/header_view', $data);
			
		$data['main'] = site_url('adminPanel/main');
		$this->load->view('inc/navbar', $data);

		$class_code = $this->uri->segment(3);
		$data['subject'] = $this->admin_model->subjectInfo($class_code);
		$data['enrolledStudents'] = $this->admin_model->studentsEnrolled($class_code);
		$data['totalEnrolled'] = $this->admin_model->totalEnrolled($class_code);
		$this->load->view('subject', $data);

		$this->load->view('inc/footer_view');
			
	}

}

?>