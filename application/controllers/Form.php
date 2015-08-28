<?php

class Form extends CI_Controller {

        public function index()
        {
                $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');
                
                $username = $this->input->post('username');
                $this->username_check($username);

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('myform');
                }
                else
                {
                        $this->load->view('formsuccess');
                }
        }

        public function username_check($str)
        {
                if ($str == 'test')
                {
                        $this->form_validation->set_message('username_check', 'The {field} field can not be the word "test"');
                        echo "ERROR";
                }
                else
                {
                        return TRUE;
                }
        }

}