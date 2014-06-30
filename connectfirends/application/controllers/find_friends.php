<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Find_friends extends CI_Controller {

	
	 function __construct(){
        parent::__construct();
		$this->load->model('common_model');
		$this->load->model('list_users_model');
		$this->load->model('add_friends');
		
    }


 function index(){
 	    $this->load->view('header');
		$data['menu'] = "find_friends";
		
		$data['session_user_id']=$this->session->userdata('user_id');
		$data['userid']=$this->session->userdata('user_id');
		$data['query_user_details']=$this->common_model->user_details($this->session->userdata('user_id'));
		
		 $data['users_query']=$this->list_users_model->list_users($this->session->userdata('user_id'));
		 
		 $query= $this->common_model->user_details($this->session->userdata('user_id'));
		 
		$data['query_notifications']=$this->common_model->list_notifications($this->session->userdata('user_id'));
		 
		 
		$data['query_school_count']=$this->common_model->count_school($query[0]->school);
		$data['query_high_school_count']=$this->common_model->count_high_school($query[0]->high_school);
		$data['query_company_count']=$this->common_model->count_company($query[0]->company);
		
		
		
	    $data['count_total_my_friends']=$this->common_model->total_my_friends($this->session->userdata('user_id'));
		
		
		$this->load->view('header_navigation',$data);
		$this->load->view('find_friends',$data);
		$this->load->view('footer');
	 }
 
 
 function add_friend(){
 	
	$session_user_id=$this->session->userdata('user_id');
 	 $friend_id=$_POST['fid'];
	$data = array(
                        'user_id'=>$session_user_id,
                        'friend_id'=>$friend_id                         
                    );
	 echo $query= $this->add_friends->add_as_friends($data);

 }
 
 function notifi_confirm(){
 	
	$notification_id=$_POST['notifiId'];
	$notifiId_userid=$_POST['notifiId_userid'];
	$notifiId_friendid=$_POST['notifiId_friendid'];
	$data = array(
                       'friend_status'=>1,
                                              
                   );
	$data2 = array(
                        'user_id'=>$notifiId_friendid,
                        'friend_id'=> $notifiId_userid,
                        'friend_status'=>1                        
                    );
	 $query=$this->add_friends->confirm_notification($data,$notification_id,$data2);
 	
 }
 


 
}


?>