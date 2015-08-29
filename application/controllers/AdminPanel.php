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
		//$this->isAuthorized();
		//$url = site_url('adminPanel/main');
		//$url = base_url();
		unset($_SESSION['targetID']);

		$data['title'] = "E-Stalker Board";
		$this->load->view('inc/header_view', $data);
		
		$data['main'] = site_url('adminPanel/main');
		$this->load->view('inc/navbar', $data);

		$data['buildingList'] = $this->admin_model->getBuildingNames();
		$this->load->view('adminPanel_view', $data);

		$this->load->view('inc/footer_view');
	}

	function students(){
		$data['title'] = "E-Stalker Board - Student";
		$this->load->view('inc/header_view', $data);
			
			$data['main'] = site_url('adminPanel/main');
			$this->load->view('inc/navbar', $data);

			$this->load->view('student');

			$this->load->view('inc/footer_view');
			
	}


	function selectBuilding(){	
		//$this->isAuthorized();
		$buildingName = $this->input->post('viewBuilding');
		$result = $this->admin_model->getUserID($buildingName);		
		$userID = $result;
		$this->session->set_userdata('targetID', $userID);			

		redirect('/adminPanel/buildingView');
	}

	function buildingView(){
		//$this->isAuthorized();
		$userID = $this->session->targetID;

		$url = site_url('/adminPanel/main');
		if($userID == ""){
			echo "<script>alert('No Building Selected!'); window.location = '$url' </script></script>";
		}
		else{
			$data['title'] = "UMTdb - Building View";
			$this->load->view('inc/header_view', $data);
			
			$data['username'] = $this->session->username;
			$data['main'] = site_url('adminPanel/main');
			$this->load->view('inc/navbar', $data);

			$data['submeterList'] = $this->admin_model->getSubmeterNames($userID);
			$data['ebillList'] = $this->shared_model->getEbillList($userID);
			$data['wbillList'] = $this->shared_model->getWbillList($userID);
			$this->load->view('adminPanel_view2', $data);

			$this->load->view('inc/footer_view');
		}		
	}

	function addSubmeter(){
		//$this->isAuthorized();
		$userID = $this->session->targetID;
		$data = array(
			'userID' => $userID,
			'submeterName' => $this->input->post('submeterName'),
		);

		$url = site_url('adminPanel/buildingView');
		if($this->admin_model->addSubmeter($data)){
			echo "<script>javascript:alert('Entry added successfully.'); window.location = '$url' </script>";	
		}	
		else{			
			echo "<script>javascript:alert('Invalid Submeter Name: Name is already used.'); window.location = '$url' </script>";	
		}		
	}

	function editSubmeter(){
		$url = site_url('/adminPanel/buildingView');
		//$this->isAuthorized();
		$userID = $this->session->targetID;
		$sName = $this->input->post('submeterName1');
		//echo "<script>alert('$sName')</script>";
		
		$data = array(
			'userID' => $userID,
			'oldName' => $this->input->post('sName'),
			'submeterName' => $sName
		);

		$this->admin_model->editSubmeter($data);
		echo "<script>alert('Submeter entry edited successfully.'); window.location = '$url'</script>";
		//redirect('/adminPanel/buildingView');
	}

	function addBuilding(){
		//$this->isAuthorized();
		$buildingName = $this->input->post('buildingName');
		if($this->input->post('username') == ""){			
			$username = strtolower($buildingName); 			
		}
		else{
			$username = $this->input->post('username'); 				
		}
		if($this->input->post('password') == ""){		
			$password = password_hash(strtolower($buildingName), PASSWORD_BCRYPT);
		}
		else{
			$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
		}
		
		$data = array(
			'username' => $username,
			'password' => $password,
			'buildingName' => $buildingName,
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'userType' => "user"
		);

		$ans = $this->admin_model->addBuilding($data);
		//echo "<script>alert($ans)</script>";
		$url = site_url('/adminPanel/main');
		if($ans){
			echo "<script>javascript:alert('Building entry added successfully.'); window.location = '$url'</script>";
		}
		else{
			echo "<script>javascript:alert('Building name is not unique. Entry not added.'); window.location = '$url'</script>";
		}		
	}

	function editBuilding(){
		//$this->isAuthorized();
		$url = site_url('/adminPanel/main');
		if(($this->input->post('username1') == "") and ($this->input->post('buildingName1') == "")){
			echo "<script>alert('Nothing changed!'); window.location = '$url'</script>" ;
		}
		else{
			$buildingName = $this->input->post('bName');			
			$result = $this->admin_model->getUserID($buildingName);		
			$userID = $result;

			$data = array(
				'userID' => $userID,
				'buildingName' => $this->input->post('buildingName1'),
				'username' => $this->input->post('username1')
			);

			$this->admin_model->editBuilding($data);
			echo "<script>javascript: alert('Building entry edited successfully.'); window.location = '$url'</script>";
		}			
	}

	function addEbill(){
		$this->isAuthorized();
		$userID = $this->session->targetID;
		$submeterName = $this->input->post('submeterName');
		$serviceID = $this->input->post('serviceID');
		$submeterID = $this->input->post('submeterID');
		$name = $serviceID . "_" . $submeterID;
		$data = array(
			'serviceID' => $serviceID,
			'submeterID' => $submeterID,
			'userID' => $userID,
			'startDate' => $this->input->post('startDate1'),
			'endDate' => $this->input->post('endDate1'),
			'totalKwh' => $this->input->post('totalKwh'),
			'totalCost' => $this->input->post('totalCost'),
			'genCharge' => $this->input->post('gcharge'),
			'transCharge' => $this->input->post('tcharge'),
			'distCharge' => $this->input->post('dcharge'),
			'imgDest' => $serviceID . ".jpg"
		);


		$config['upload_path']          = './public/db_img/ebill/';
		$config['file_name']          	= $serviceID;
		$config['allowed_types']        = 'jpg';

        $this->load->library('upload', $config);
        $url = site_url('/adminPanel/buildingView#ebill');
        if ( ! $this->upload->do_upload()){            
        	echo "<script>alert('Error uploading image! Should be in .jpg file format.')</script>"	;
        	echo "<script>javescript:window.location = '".$url."'</script>";
		}
		else{                        
			
        	if($this->admin_model->addEbill($data)){
				echo "<script>javascript:alert('Data added successfully!');</script>";
				echo "<script>javescript:window.location = '".$url."'</script>";
			}
			else{     
				echo "<script>javascript:alert('Error: Invalid input. Data not added');</script>";
				echo "<script>javescript:window.location = '".$url."'</script>";
			}   
		}		
	}

	function addWbill(){
		//$this->isAuthorized();
		$userID = $this->session->targetID;		
		$serviceID = $this->input->post('serviceID');
		
		$data = array(
			'serviceID' => $serviceID,			
			'userID' => $userID,
			'startDate' => $this->input->post('startDate2'),
			'endDate' => $this->input->post('endDate2'),
			'totalCc' => $this->input->post('totalCc'),
			'totalCost' => $this->input->post('totalCost'),
			'imgDest' => $serviceID . ".jpg"
		);


		$config['upload_path']          = './public/db_img/wbill';
		$config['file_name']          	= $serviceID;
		$config['allowed_types']        = 'jpg';

        $this->load->library('upload', $config);

        $url = site_url('/adminPanel/buildingView#wbill');
        if ( ! $this->upload->do_upload()){            
        	echo "<script>javascript:alert('Error uploading image!');</script>";
				echo "<script>javescript:window.location = '".$url."'</script>";
		}
		else{			
			if($this->admin_model->addWbill($data)){
				echo "<script>javascript:alert('Data added successfully!');</script>";
				echo "<script>javescript:window.location = '".$url."'</script>";
			}
			else{     
				echo "<script>javascript:alert('Error: Invalid input. Data not added');</script>";
				echo "<script>javescript:window.location = '".$url."'</script>";
			}       	
		}		
	}

	function editEbill(){		
		//$this->isAuthorized();
		$serviceID = $this->input->post('serviceID1');
		$name = $serviceID . "_" . $this->input->post('submeterID1');
		$data = array(
			'ebillID' => $this->input->post('ebillID'),
			'serviceID' => $serviceID,
			'submeterID' => $this->input->post('submeterID1'),
			'userID' => $this->session->targetID,
			'startDate' => $this->input->post('startDate1'),
			'endDate' => $this->input->post('endDate1'),
			'totalKwh' => $this->input->post('totalKwh1'),
			'totalCost' => $this->input->post('totalCost1'),
			'genCharge' => $this->input->post('gcharge1'),
			'transCharge' => $this->input->post('tcharge1'),
			'distCharge' => $this->input->post('dcharge1'),
			'imgDest' => $name . ".jpg"
		);
		$submeterID = $this->input->post('submeterID1');
		//echo "<script>alert('$name')</script>";
		$config['upload_path']          = './public/db_img/ebill/';
		$config['file_name']          	= $name;
		$config['allowed_types']        = 'jpg';
		$config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        $url = site_url('adminPanel/buildingView#ebill');
        if ( ! $this->upload->do_upload()){     
        	$error = array('error' => $this->upload->display_errors());  
        	echo "<script>alert('$error')</script>";     
        	echo "<script>alert('Error uploading image!')</script>"	;
        	echo "<script>window.location = '$url'</script>";
		}
		else{                        
        	echo "<script>alert('Success!')</script>";     
        	$this->admin_model->editEbill($data);
			echo "<script>window.location = '$url'</script>";
		}	
	}

	function editWbill(){
		//$this->isAuthorized();
		$serviceID = $this->input->post('serviceID2');
		//echo "<script>alert('service id: $serviceID')</script>"; 

		$data = array(
			'wbillID' => $this->input->post('wbillID'),
			'serviceID' => $serviceID,			
			'userID' => $this->session->targetID,
			'startDate' => $this->input->post('startDate2'),
			'endDate' => $this->input->post('endDate2'),
			'totalCc' => $this->input->post('totalCc1'),
			'totalCost' => $this->input->post('totalCost2'),
			'imgDest' => $serviceID . ".jpg"
		);
		
		$config['upload_path']          = './public/db_img/wbill';
		$config['file_name']          	= $serviceID;
		$config['allowed_types']        = 'jpg';
		$config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        $url = site_url('adminPanel/buildingView#wbill');
        if ( ! $this->upload->do_upload()){            
        	echo "<script>alert('Error uploading image!')</script>"	;
        	echo "<script>window.location = '$url'</script>";
		}
		else{                        
        	echo "<script>alert('Success!')</script>";     
        	$this->admin_model->editWbill($data);
			echo "<script>window.location = '$url'</script>";
		}
	}

	function statistics(){
		//$this->isAuthorized();
		$startingMonth = $this->input->post('s_month');
		$endingMonth = $this->input->post('e_month');
		$startingYear = $this->input->post('s_year');
		$endingYear = $this->input->post('e_year');

		//empty fields
		if($startingYear == ""){
			$startingYear = 2010;
		}
		$string = date(DATE_ATOM);
		$now = substr($string, 0, 10);
		if($endingMonth == ""){
			$endingMonth = substr($now, 5, 2);
		}
		if($endingYear == ""){
			$endingYear = substr($now, 0, 4);
		}


		//error checking
		if($startingYear == $endingYear && $startingMonth > $endingMonth){
			echo "<script>alert('Invalid dates'); </script>";					
		}
		else{
			$start_date = $startingMonth . "-" . "01-" . $startingYear;
			$start_date = nice_date($start_date, 'Y-m-d');
			$end_date = $endingMonth . "-" . "01-" . $endingYear;
			$end_date = nice_date($end_date, 'Y-m-d');

			//echo "<script>alert('$start_date'); </script>";		
			//echo "<script>alert('$end_date'); </script>";	

			$data = array(
				'start_date' => $start_date,
				'end_date' => $end_date
			);	

			$newData = array(
				'title' => "Statistics Page",
				'username' => "admin",
				'ebillStat' => $this->admin_model->getEStatistics($data), 
				'wbillStat' => $this->admin_model->getWStatistics($data), 
				'main' => site_url('adminPanel/main')
			);

			$this->load->view('inc/header_view', $newData);
			$this->load->view('inc/navbar', $newData);
			$this->load->view('statistics_view', $newData);
			$this->load->view('inc/footer_view');
		}
	}	

	function dlReport(){
		//$this->isAuthorized();
		if($this->input->post('r_type') == 1){		
			$rType = "ELECTRICITY";
			$unit = "KWH";
			$data['table'] = "ebill";			
		}
		else{
			$rType = "WATER";
			$unit = "m3";
			$data['table'] = "wbill";
		}

		//echo "<script>javascript:alert('rType: $rType unit: $unit table: $table')</script>";

		$buildingName = $this->input->post('b_name');		
		
		//echo "<script>alert('$buildingName')</script>";

		$data['userID'] = $this->admin_model->getUserID($buildingName);
		$userID = $data['userID'];
		//echo "<script>alert('$userID')</script>";

		$startMonth = $this->input->post('s_month');
		$year = $this->input->post('year');
		$startDate1 = $year . "-" . $startMonth . "-01";
		$data['startDate1'] = nice_date($startDate1, 'Y-m-d');
		$startMonth2 = $startMonth + 1;
		$startDate2 = $year . "-" . $startMonth2 . "-01";
		$data['startDate2'] = nice_date($startDate2, 'Y-m-d');			
		//$startDate1 = $data['startDate1'];
		//$startDate2 = $data['startDate2'];
		//echo "<script>alert('start: $startDate1 end: $startDate2')</script>";

		$newData = $this->admin_model->getReportInfo($data);		

		header("Content-Type: text/csv");		
		header("Content-Disposition: attachment; filename=report.csv");
		header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
		header("Pragma: no-cache"); // HTTP 1.0
		header("Expires: 0"); // Proxies

		function outputCSV($data) {	    
			$output = fopen("php://output", "a");
		    foreach ($data as $row) {
		        fputcsv($output, $row); // here you can change delimiter/enclosure
		    }
		    fclose($output);
		}

		$i = 0;		
		$totalCost = 0;
		$totalCons = 0;
		
		foreach ($newData as $row) {
			if($i == 0){
				$serviceID = $row['serviceID'];
				$startDate = $row['startDate'];
				$endDate = $row['endDate'];

				outputCSV(array(
				    array("", "", "", "               UTILITIES MANAGEMENT TEAM", "", "", "", "", ""),
				    array("", "", "", "Office of the Vice Chancellor for Administration", "", "", "", "", ""),
				    array("", "", "", "                  University of the Philippines", "", "", "", "", ""),
				    array("", "", "", "", "     Diliman, Quezon City", "", "", "", ""),
				    array("", "", "", "", "", "", "", "", ""),
				    array("", "", "", "", "", "", "", "", ""),
				    array("BREAKDOWN OF $rType BILL:", "", "", "", "", "", "SERVICE ID# $serviceID", "", ""),
				    array("", "", "", "", "", "", "", "", ""),
				    array("", "", "", "", "", "", "", "", ""),
				    array("FOR THE PERIOD $startDate TO $endDate", "", "", "", "", "", "", "", ""),
				    array("", "", "", "", "", "", "", "", "")
				));   
			}
			if($rType == "ELECTRICITY"){
				$submeterName = $row['submeterName'];
				$kwh = $row['totalKwh'];
				$cost = $row['totalCost'];

				outputCSV(array(
					array("", "$submeterName", "", "", "", "", "$kwh $unit", "", "P $cost"),	
					array("", "", "", "", "", "", "", "", "")
				));		
				$totalCost += $cost;
				$totalCons += $kwh;
			}	
			else{
				$totalCost = $row['totalCost'];
				$totalCons = $row['totalCc'];
			}					
			$i += 1;
		}

		$pName = $this->input->post('p_name');
		$pTitle = $this->input->post('p_title');
		$nName = $this->input->post('n_name');
		$nTitle = $this->input->post('n_title');
		
		outputCSV(array(
		    array("", "TOTAL", "", "", "", "", "$totalCons $unit", "", "P $totalCost"),
		    array("", "", "", "", "", "", "", "", ""),
		    array("", "", "", "", "", "", "", "", ""),
		    array("Prepared by:", "", "", "", "", "", "", "", ""),
		    array("", "", "", "", "", "", "", "", ""),
		    array("", "", "", "", "", "", "", "", ""),
		    array("$pName", "", "", "", "", "", "Noted:", "", ""),
		    array("$pTitle", "", "", "", "", "", "", "", ""),
		    array("", "", "", "", "", "", "", "", ""),
		    array("", "", "", "", "", "", "$nName", "", ""),
		    array("", "", "", "", "", "", "$nTitle", "", "")
		));
		  
	}
	
	function getElecDb(){
		//$this->isAuthorized();
		$newdata = $this->admin_model->getAllEbill();

		header("Content-Type: text/csv");		
		header("Content-Disposition: attachment; filename=eDatabase.csv");
		header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
		header("Pragma: no-cache"); // HTTP 1.0
		header("Expires: 0"); // Proxies

		function outputCSV($data) {	    
			$output = fopen("php://output", "a");
		    foreach ($data as $row) {
		        fputcsv($output, $row); // here you can change delimiter/enclosure
		    }
		    fclose($output);
		}

		outputCSV(array(
		    array("Service ID", "Building Name", "Submeter Name", "Start Date", "End Date", "Total KWH", "Total Cost", "Generation Charge", "Transmission Charge", "Distribution Charge")	    
		));   

		foreach ($newdata as $row){
			$buildingName = $row['buildingName'];
			$submeterName = $row['submeterName'];
			$serviceID = $row['serviceID'];
			$startDate = $row['startDate'];
			$endDate = $row['endDate'];
			$totalKwh = $row['totalKwh'];
			$totalCost = $row['totalCost'];
			$genCharge = $row['genCharge'];
			$transCharge = $row['transCharge'];
			$distCharge = $row['distCharge'];

			outputCSV(array(		    		    
			    array($serviceID, $buildingName, $submeterName, $startDate, $endDate, $totalKwh, $totalCost, $genCharge, $transCharge, $distCharge)
			));   
		}
	}

	function getWaterDb(){
		//$this->isAuthorized();
		$newdata = $this->admin_model->getAllWbill();

		header("Content-Type: text/csv");		
		header("Content-Disposition: attachment; filename=wDatabase.csv");
		header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
		header("Pragma: no-cache"); // HTTP 1.0
		header("Expires: 0"); // Proxies

		function outputCSV($data) {	    
			$output = fopen("php://output", "a");
		    foreach ($data as $row) {
		        fputcsv($output, $row); // here you can change delimiter/enclosure
		    }
		    fclose($output);
		}

		outputCSV(array(
		    array("Service ID", "Building Name", "Start Date", "End Date", "Total Cubic Meters", "Total Cost")	    
		));   

		foreach ($newdata as $row){
			$buildingName = $row['buildingName'];
			$serviceID = $row['serviceID'];
			$startDate = $row['startDate'];
			$endDate = $row['endDate'];
			$totalCc = $row['totalCc'];
			$totalCost = $row['totalCost'];

			outputCSV(array(		    		    
			    array($serviceID, $buildingName, $startDate, $endDate, $totalCc, $totalCost)
			));
		}
	}

	function changeEmail(){
		$this->isAuthorized();
		//echo "<script>alert('change email controller'); </script>";
		$data = array(		
			'userID' => $this->session->userID,	
			'email' => $this->input->post('new_email')
		);

		$result = $this->users_model->changeEmail($data);
		$url = site_url('/adminPanel/main');
		echo "<script>alert('Email changed successfully'); window.location = '$url'</script>";
		
	}


	function changePassword(){
		$this->isAuthorized();
		//echo "<script>alert('change password controller'); </script>";
		//error checking
		$pass = $this->input->post('current_p');
		$sesPass = $this->session->password;
		$url =site_url('/adminPanel/main');
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