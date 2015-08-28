<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('ebillupload', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $filename = $this->input->post('eImg');
                echo "<script>alert('$filename')</script>";

                $config['upload_path']          = './public/db_img';
                $config['allowed_types']        = 'jpg';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('ebillupload', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('ebillsuccess', $data);
                }
        }
}
?>