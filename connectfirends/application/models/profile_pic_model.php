<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_pic_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	
	function save_profile_pic_name($data,$session_user_id){
		  $this->db->where('user_id', $session_user_id);
         $this->db->update('users_profile_pic', $data);
	}
	
	
	
	
}