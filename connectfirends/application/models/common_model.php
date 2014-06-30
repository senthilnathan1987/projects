<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	function user_details($userid=NULL){
		
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('work_education', 'work_education.user_id=users.uid');
		$this->db->join('users_profile_pic', 'users_profile_pic.user_id=users.uid','left');
		$this->db->where('uid', $userid);
		$result = $this->db->get();
		return $result->result();
	
	}
	
	function count_school($attr){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('work_education', 'work_education.user_id=users.uid');
		$this->db->where('school', $attr);
		$result = $this->db->get();
		return count($result->result());
		
	}
	function count_high_school($attr){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('work_education', 'work_education.user_id=users.uid');
		$this->db->where('high_school', $attr);
		$result = $this->db->get();
		return count($result->result());
		
	}
function count_company($attr){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('work_education', 'work_education.user_id=users.uid');
		$this->db->where('company', $attr);
		$result = $this->db->get();
		return count($result->result());
		
	}
function list_notifications($user_id){
	
	    $this->db->select('*');
		$this->db->from('users_friends');
		$this->db->join('users','users_friends.user_id=users.uid','left');
		$this->db->where('friend_id', $user_id);
		$this->db->where('friend_status','0');
		$result = $this->db->get();
		return $result->result();
}

 function list_my_friends($user_id){
 	    $this->db->select('*');
		
		$this->db->from('users AS A');
		$this->db->join('users_friends AS B', 'A.uid = B.friend_id', 'INNER');
		$this->db->join('users_profile_pic AS C', 'C.user_id=A.uid', 'INNER');
		$this->db->where('B.user_id', $user_id);
		$this->db->where('B.friend_status','1');
		$result = $this->db->get();
		return $result->result();
 	
 }
 function total_my_friends($user_id){
 	 $this->db->select('*');
		$this->db->from('users_friends');
		$this->db->where('user_id', $user_id);
		 
		$this->db->where('friend_status','1');
		$result = $this->db->get();
		return count($result->result());
 	
 }
 
	
	
	
}
?>