<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	
	 function __construct(){
        parent::__construct();
		$this->load->model('post_model');
		$this->load->model('common_model');
		$this->load->model('profile_pic_model');
    }
	 
	 
	 function index(){
	 	
	
		
	 	$this->load->view('header');
		$data['menu'] = "profile";
		
		$data['session_user_id']=$this->session->userdata('user_id');
		$data['userid']=$this->session->userdata('user_id');
		$data['query_user_details']=$this->common_model->user_details($this->session->userdata('user_id'));
		$data['query_notifications']=$this->common_model->list_notifications($this->session->userdata('user_id'));
		$data ['query']=$this->post_model->view_post($this->session->userdata('user_id'));
		$data['query_friends']=$this->common_model->list_my_friends($this->session->userdata('user_id'));
		
		
		echo $this->uri->segment(4);
		
		$data['count_total_my_friends']=$this->common_model->total_my_friends($this->session->userdata('user_id'));
		
		
		$this->load->view('header_navigation',$data);
		$this->load->view('profile',$data);
		$this->load->view('footer');
	 }
	 function user($userid){
	 	
		
	 	$this->load->view('header');
		$data['menu'] = "profile";
		$requested_userId=$this->uri->segment(3);
		
		$data['session_user_id']=$this->session->userdata('user_id');
		$data ['query']=$this->post_model->view_post($userid);
		$data['userid']=$userid;
		
		$data['query_user_details']=$this->common_model->user_details($userid);
		$data['query_notifications']=$this->common_model->list_notifications($this->session->userdata('user_id'));
		$data['query_friends']=$this->common_model->list_my_friends($requested_userId);
		
		
		
		
		$data['count_total_my_friends']=$this->common_model->total_my_friends($requested_userId);
		
		
		$this->load->view('header_navigation',$data);
		$this->load->view('profile',$data);
		$this->load->view('footer');
	 }
	 
	 
	 function camera_profile_picture(){
	 	 $folder='./common/images/profile_pictures/original/';
		 $filename = md5($_SERVER['REMOTE_ADDR'].rand()).'.jpg';
	   $original = $folder.$filename;
		// The JPEG snapshot is sent as raw input:
      $input = file_get_contents('php://input');
	  
	  if(md5($input) == '7d4df9cc423720b7f1f3d672b89362be'){
				// Blank image. We don't need this one.
				echo "empty image";
				exit;
			}
	  $result = file_put_contents($original, $input);
		
		// Moving the temporary file to the originals folder:
		rename($original,'./common/images/profile_pictures/medium/'.$filename);
		$original = './common/images/profile_pictures/medium/'.$filename;
		
		$session_user_id=$this->session->userdata('user_id');
  $original_profile_pic_name= base_url()."common/images/profile_pictures/original/".$filename;
  $medium_profile_pic_name= base_url()."common/images/profile_pictures/medium/".$filename;
   $data = array(
                       'original_img_path'=>$original_profile_pic_name,
                         'medium_img_path'=>$medium_profile_pic_name,
                      'user_id'=>$session_user_id                         
                   );
   
 $data ['query']=$this->profile_pic_model->save_profile_pic_name($data,$session_user_id);
 echo $medium_profile_pic_name;
		
		
	
	
		
					
	 }
	 
	 
	 function profile_pic_change(){
	 	

		// Set the upload folder path
	$status = "";
   $msg = "";
   $file_element_name = 'profile_pic';
    
		 $config['upload_path'] = "./common/images/profile_pictures/original/";
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']  = 1024 * 800;
      $config['encrypt_name'] = TRUE;
	  
	   $this->load->library('upload', $config);
	  
	   
	   if (!$this->upload->do_upload($file_element_name))
      {
         $status = 'error';
         echo $msg = $this->upload->display_errors('', '');
      }
else{
	 $upload_data = $this->upload->data();
	$image_config["image_library"] = "gd2";
	$image_config["source_image"] = $upload_data["full_path"];
	
	$image_config['create_thumb'] = FALSE;
	$image_config['maintain_ratio'] = TRUE;
	$image_config['new_image'] = "./common/images/profile_pictures/medium/" . $upload_data['file_name'];
	$image_config['quality'] = "100%";
	$image_config['width'] = 380;
	$image_config['height'] = 400;
	$dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
	$image_config['master_dim'] = ($dim > 0)? "height" : "width";
	 
	$this->load->library('image_lib');
	$this->image_lib->initialize($image_config);
	

	if(!$this->image_lib->resize()){ //Resize image
   echo "no resized"; //If error, redirect to an error page
}else{
	$image_config['image_library'] = 'gd2';
	 $upload_data = $this->upload->data();
	$image_config['source_image'] = "./common/images/profile_pictures/medium/" . $upload_data['file_name'];
	$image_config['new_image'] = "./common/images/profile_pictures/medium/" . 'medium_'.$upload_data['file_name'];
	$image_config['quality'] = "100%";
	$image_config['maintain_ratio'] = FALSE;
	$image_config['width'] = 380;
	$image_config['height'] = 400;
	$image_config['x_axis'] = '0';
	$image_config['y_axis'] = '0';
	 
	$this->image_lib->clear();
	$this->image_lib->initialize($image_config); 
	
	 
if (!$this->image_lib->crop()){
        echo "no resizr and crop";
}else{
  	
   	
  $session_user_id=$this->session->userdata('user_id');
  $original_profile_pic_name= base_url()."common/images/profile_pictures/original/".$upload_data['file_name'];
  echo $medium_profile_pic_name= base_url()."common/images/profile_pictures/medium/".'medium_'.$upload_data['file_name'];
   $data = array(
                       'original_img_path'=>$original_profile_pic_name,
                         'medium_img_path'=>$medium_profile_pic_name,
                      'user_id'=>$session_user_id                         
                   );
   
 $data ['query']=$this->profile_pic_model->save_profile_pic_name($data,$session_user_id);
   
}
}
}
	  
	   
	   
		
	 }
	 
	 

	   
}
?>