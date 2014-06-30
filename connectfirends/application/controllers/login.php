<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	
	 function __construct(){
        parent::__construct();
		 $this->load->model('Loginmodel');
    }
	 
	public function index()
	{
		$this->load->view('header');
		$data['menu'] = "loginpage";
		$this->load->view('header_navigation',$data);
		$this->load->helper('form');
		$this->load->view('login');
		$this->load->view('footer');
		
	}
	public function process(){
		
        // Validate the user can login
        $result = $this->Loginmodel->validate();
		if(! $result){
              redirect(base_url()."?e=1");
        }else{
            // If user did validate, 
            // Send them to members area
            redirect('profile');
        }      
	}
	
	public function register_users ()
	{
		
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$re_email=$_POST['re_email'];
		$password=md5($_POST['password']);
		$month=$_POST['month'];
		$day=$_POST['day'];
		$year=$_POST['year'];
		$gender=$_POST['gender'];
		$create_date=date("F j, Y, g:i a");
		
		$split = explode('@',$email);
        $username = $split[0];
		
		
		$data1 = array(
						'username'=>$username,
                        'fname'=>$fname,
                        'lname'=>$lname,
                        'email'=>$email,
                        'password'=>$password,
                                                 
                    );
		$data2 = array(
		                 
                        'birth_month'=>$month,
                        'birth_day'=>$day,
                        'birth_year'=>$year,
                        'gender'=>$gender,
                        'register_date'=>$create_date
                                                  
                    );
		$data3 = array(
		                 
                        'school'=>0,
                        'high_school'=>0,
                        'company'=>0,
                     
                    );
		
		if($gender=='male'){
		
		$data4 = array(
		                 
                        'original_img_path'=>base_url().'common/images/profile_pictures/default-male.png',
                        'medium_img_path'=>base_url().'common/images/profile_pictures/default-male.png',
                        'thumb_img_path'=>base_url().'common/images/profile_pictures/default-male.png',
                     
                    );
		}else{
			
			$data4 = array(
		                 
                        'original_img_path'=>base_url().'common/images/profile_pictures/default-female.jpg',
                        'medium_img_path'=>base_url().'common/images/profile_pictures/default-female.jpg',
                        'thumb_img_path'=>base_url().'common/images/profile_pictures/default-female.jpg',
                     
                    );
			
		}
					
	   
		 $result = $this->Loginmodel->register_user($data1,$data2,$data3,$data4);
		
	}
	
}
?>