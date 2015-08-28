<?php
class Sample extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url', 'form', 'date', 'text'));
		$this->load->library(array('session', 'form_validation'));
	}

	function select(){
		$this->load->view('select');
	}

	function overwrite(){
		$this->load->view('overwrite', "");
	}

	function edit(){
		$config['upload_path']          = './public/db_img/ebill/';
		$config['file_name']          	=  'hello.jpg';
		$config['allowed_types']        = 'jpg';

        $this->load->library('upload', $config);
        $url = site_url('/sample/overwrite#ebill');
        if ( ! $this->upload->do_upload()){            
        	$error = array('error' => $this->upload->display_errors());
        	$this->load->view('overwrite', $error);
		}
		else{
			echo "<script>alert('SUCCESS.')</script>"	;
        	echo "<script>javescript:window.location = '".$url."'</script>";
		}
	}
}

?>