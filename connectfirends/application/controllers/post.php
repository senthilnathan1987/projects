<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	
	function __construct(){
        parent::__construct();
    }
	 
	 
	 
	 function new_post(){
		  $post_description=$_POST['status_desc'];
		  $user_id=$this->session->userdata('user_id');
		  $data = array(
                        'post_description'=>$post_description,
                        'user_id'=>$user_id                         
                    );
		$this->load->model('Post_model');
		$this->Post_model->insert_post($data);
	 }
	 function delete_post(){
		   $delete_post_Id=$_POST['delete_post_Id'];
		   $data = array('up_id'=>$delete_post_Id);
		   $this->load->model('Post_model');
		   $this->Post_model->delete_post($data);
	 }
	 
	 
	 
}
?>