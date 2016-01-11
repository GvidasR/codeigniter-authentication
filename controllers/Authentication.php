<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->model('usersModel');
        $this->load->helper('view');
    }
    
    public function login()
    {
        if(!$this->__redirectAccess())	
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|xss_clean');
            $this->form_validation->set_rules('passcode', 'Passcode', 'trim|required|callback_check_login|xss_clean');
            $this->form_validation->set_message('required', ' error ');
            
            $this->form_validation->set_error_delimiters('', '');
            if ($this->form_validation->run() === FALSE){
                loadView('authentication','index');
            }
            else
            {
                $this->login();
            }
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('YourPage');
		session_destroy();
		$this->login();
    }
    
    public function check_login($passcode){
        $email = $this->input->post('email',TRUE);
        $result = $this->usersModel->login($email, $passcode);
        if($result){
            $sess_array = array();
            $sess_array = array(
                    'id' => $result['id'],
                    'role' => $result['role']
            );
            $this->session->set_userdata('YourPage', $sess_array);
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_login', ' error ');
            return false;
        }
    }
    
    private function __redirectAccess()
    {
        if($this->session->userdata('YourPage')){	
            $session_data=$this->session->userdata('YourPage');
            if($session_data['role']==1){
                redirect(base_url().'administration', 'refresh'); /* REDIRECT USER WITH ROLE -> 1 (in this case administrator) */
            }
            else
            {
                redirect(base_url().'dashboard', 'refresh'); /* REDIRECT USER WITH ROLE OTHER THAN 1 (in this case simple user)  */
            }
        }
        else{
            return false;
        }
    }
}
