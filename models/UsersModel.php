<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class UsersModel extends CI_Model {
    
    public function login($email, $passcode){
		$this->db->select('id,role');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('password', hash('SHA512',$passcode));
		$this->db->where('status', 1);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() == 1){
            return $query->row_array();
		}
		else{
            return false;
		}
	}
}