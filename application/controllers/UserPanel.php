<?php

class UserPanel extends CI_Controller{
	
	function __construct(){
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->model('shared_model');
        $this->load->model('users_model');
        $this->load->library(array('session', 'form_validation'));       
    }

    function isAuthorized(){
    	if($_SESSION['userType'] == "admin"){
    		redirect('/adminPanel/main');
    	}
    	else if($_SESSION['userType'] != "user"){
    		redirect('/index/view');
    	}
    }

	function main(){
		$this->isAuthorized();	
		$data['title'] = "UMTdb - User Panel";
		$this->load->view('inc/header_view', $data);
		
		$data['username'] = $this->session->username;
		$data['main'] = site_url('userPanel/main');
		$this->load->view('inc/navbar', $data);
		
		$data['buildingName'] = $this->session->buildingName;
		$userID = $this->session->userID;
		$data['ebillList'] = $this->shared_model->getEbillList($userID);
		$data['wbillList'] = $this->shared_model->getWbillList($userID);
		$data['userData'] = $this->users_model->getUserInfo($userID);
		$this->load->view('userPanel_view', $data);
		$this->load->view('inc/footer_view');
	}	

	function changeEmail(){
		$this->isAuthorized();
		//echo "<script>alert('change email controller'); </script>";
		$data = array(		
			'userID' => $this->session->userID,	
			'email' => $this->input->post('new_email')
		);

		$result = $this->users_model->changeEmail($data);
		$url = site_url('/userPanel/main');
		echo "<script>alert('Email changed successfully'); window.location = '$url'</script>";
		
	}

	function changePassword(){
		$this->isAuthorized();
		//echo "<script>alert('change password controller'); </script>";
		//error checking
		$pass = $this->input->post('current_p');
		$sesPass = $this->session->password;
		$url =site_url('/userPanel/main');
		if(!password_verify($pass, $sesPass)){			
			echo "<script>javascript:alert('Current password invalid'); window.location = '$url'</script>";	
		}
		else if($this->input->post('retype_p') != $this->input->post('new_p')){
			echo "<script>javascript:alert('Passwords do not match'); window.location = '$url'</script>";	
		}
		else{
			$data = array(		
				'userID' => $this->session->userID,	
				'password' => password_hash($this->input->post('new_p'), PASSWORD_BCRYPT)
			);

			$result = $this->users_model->changePassword($data);
			echo "<script>javascript:alert('Password changed successfully.'); window.location = '$url'</script>";	
			
		}		
	}
	
		
}

?>
