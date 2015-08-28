<?php

class Index extends CI_Controller{
	function __construct(){	
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->model('users_model');
	}

	function view($errorMessage = ""){	
		$data['title'] = "UMTdb HOME";
		$data['errorMessage'] = $errorMessage;
		$this->load->view('inc/header_view', $data);
		$this->load->view('index_view');
		$this->load->view('inc/footer_view');
	}	

	function login(){				

		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		
		$result = $this->users_model->login($data);

		if($result != null){		

			$sess_array = array(
				'userID' => $result->userID,
				'username' => $result->username,
				'password' => $result->password,
				'buildingName' => $result->buildingName,
				'email' => $result->email,
				'address' => $result->address,
				'userType' => $result->userType
			);

			$this->session->set_userdata($sess_array);
			$userType = $_SESSION['userType'];
			
			if($_SESSION['userType'] == 'admin'){
				echo "<script>alert('admin'); </script>";
				redirect('/adminPanel/main');
			}
			else{
				echo "<script>alert('user'); </script>";
				redirect('/userPanel/main');	
			}
		}	
		else{
			$this->view("Error, invalid username and/or password");
		}
	}

	function forgotPassword(){
		$targetEmail = $this->input->post('email');
		$result = $this->users_model->emailVerif($targetEmail);
		$url = site_url('/index/view');
		if($result == "Invalid"){
			echo "<script>alert('Invalid email address.')</script>";
			echo "<script> window.location = '$url'</script>";
		}
		else{			
			$path = APPPATH;
			echo "<script>alert('$path')</script>";
			require_once(APPPATH . '\third_party\mailer\PHPMailerAutoload.php');

			$m = new PHPMailer;
		   $m->isSMTP();
		   $m->SMTPAuth = true;
		   //$m->SMTPDebug = 2;
		   $m->Host = "smtp.gmail.com";
		   $m->Username = "umtwebsite@gmail.com";
		   $m->Password = "utilitymanagementteam"; 	  
		   $m->SMTPSecure = "ssl";
		   $m->Port = 465;
		   
		   $m->From = "umtwebsite@gmail.com";
		   $m->FromName = "UMT";
		   $m->addAddress($targetEmail, "");;
		   //$m->$addCC("karisuma1010@gmail.com", "UMT");
		   //$m->addBCC("karisuma1010@gmail.com", "UMT");
		   
		   $m->Subject = "Password Recovery";
		   $m->Body = "Here is your password: '$result'. We recommend that you change it after logging-in.";
		   
		   $m->send();

		   echo "<script>javascript:alert('Sent successfully')</script>";		   
		   echo "<script> window.location = '$url'</script>";
		}
		

	}	

	function logout(){
		$this->session->sess_destroy();
		redirect('/index/view');
	}

}

?>