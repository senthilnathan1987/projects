<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class List_users_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	function list_users($userid)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('work_education', 'work_education.user_id=users.uid');
		$this->db->join('users_profile_pic', 'users_profile_pic.user_id=users.uid','left');
		$this->db->where('uid !='.$userid);
		$result = $this->db->get();
		return $result->result();
		
		
		
	}
	
}
?>