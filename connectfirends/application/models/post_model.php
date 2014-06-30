<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	
	function insert_post($data){
		
		   $this->db->set($data);
		   $this->db->insert('users_posts',$data);
		   echo $this->db->insert_id();
	}
	
	function delete_post($data){
		   $this->db->delete('users_posts',$data);

	}
	
	public function view_post($userid)
	{
		
		$this->db->order_by("up_id", "desc");
		$this->db->where('user_id', $userid);
		$query = $this->db->get('users_posts');
		
		
		return $query->result();
		
		
	}
	
}