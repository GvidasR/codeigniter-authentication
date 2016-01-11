<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
    function checkSession($role)
    {
        $ci =&get_instance();
        if($ci->session->userdata('YourPage')){	
            $session_data=$ci->session->userdata('YourPage');
            if($session_data['role']==$role){
                return $session_data['id'];
            }
            else
            {
                redirect(base_url().'logout', 'refresh');
            }
        }
        else{
            redirect(base_url().'logout', 'refresh');
        }
    }

