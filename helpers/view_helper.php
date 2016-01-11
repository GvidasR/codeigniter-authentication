<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
    function loadView($controller = 'login',$view = 'index', $data = array())
    {
        $ci =&get_instance();
        $data['active'] = $view;
        $ci->load->view('layout/header',$data);
        $ci->load->view($controller.'/'.$view,$data);
        $ci->load->view('layout/footer',$data);
    }
    
    function loadViewReturn($controller = 'login',$view = 'index', $data = array())
    {
        $ci =&get_instance();
        $html = $ci->load->view($controller.'/'.$view,$data,true);
        return $html;
    }

