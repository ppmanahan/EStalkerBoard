<?php

class Model_caller extends CI_controller{
	function buildings_table(){
		$this->load->model('buildings');
		$data['buildings'] = $this->buildings->building_list();
		$this->load->view('buildings_view', $data);
	}	

	function submeters_table($userID = 23){
		$this->load->model('buildings');
		$data['submeters'] = $this->buildings->submeter_list($userID);
		$this->load->view('submeters_view', $data);
	}	

	function ebill_table($userID = 23){
		$this->load->model('buildings');
		$data['ebills'] = $this->buildings->ebill_list($userID);
		$this->load->view('ebill_view', $data);
	}
}

?>