<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_friends extends CI_Model{
	
	function add_as_friends($data)
	{
		
		
		   $this->db->set($data);
		   $this->db->insert('users_friends',$data);
		   $this->db->insert_id();
	}
	
	function confirm_notification($data,$ftbl_id,$data2){
		
		
		
		 $this->db->where('tbl_fid', $ftbl_id);
         $this->db->update('users_friends', $data);
		 
		  $this->db->insert('users_friends',$data2);       
	}
	
	
}
?>