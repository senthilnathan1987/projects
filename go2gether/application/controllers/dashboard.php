<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		parent::__construct();
		$this -> load -> helper(array('form', 'url'));
		$this -> load -> model('dashboard_model');
		$this -> load -> library('tank_auth');
		$this -> load->model('tank_auth/users');

	}

	public function index() {
		$this -> load -> view('header');
		$this -> load -> view('navigation');
		$data['result']=$this->dashboard_model->user_detail($this->session->userdata('user_id'));
		$data['ride_list']=$this->dashboard_model->get_ride_list($this->session->userdata('user_id'));
		$data['carDetail']=$this->dashboard_model->get_car_Details($this->session->userdata('user_id'));
		$data['messages']=$this->dashboard_model->get_messages($this->session->userdata('user_id'));
		
		
		//print_r($data);
		$this -> load -> view('dashboard',$data);
		$this -> load -> view('footer');
	}

	public function update_personal_info() {
			$data = array(
					'personal_fname'=> $this->input->post('fname'),
					'personal_lname'=>$this->input->post('lname'),
					'personal_email'=>$this->input->post('email'),
					'personal_company'=>$this->input->post('working'),
					'personal_gender'=>$this->input->post('gender'),
					'personal_mobile'=>$this->input->post('mobile'),
					'personal_dob'=>$this->input->post('dob'),
					'personal_biography'=>$this->input->post('bio'),
					
				);
				
				//print_r($data);
				$this->users->update_personal_data($data);
		}
	
	public function preference() {
			$data = array(
					'chat'=> $this->input->post('chat_preference'),
					'music'=>$this->input->post('music_preference'),
					'pet'=>$this->input->post('pet_preference'),
					'smoke'=>$this->input->post('smoke_preference')
					
				);
				
				//print_r($data);
				$this->users->update_preference_data($data);
		}
	public function deleteOffer()
	{
		$offerId=$this->input->post('OfferId');
		$result=$this->dashboard_model->deleteOffer($offerId);
		//print_r($result);
	}
	
	public function delete_message(){
		
		$message_id=$this->input->post('message_id');
		$result=$this->dashboard_model->deleteMessages($message_id);
		
	}
	
	public function update_user_car_details(){
		
		$data = array(
					'car_make'=> $this->input->post('make'),
					'car_model'=>$this->input->post('model'),
					'car_comfort'=>$this->input->post('comfort'),
					'car_seats'=>$this->input->post('seats'),
					'car_color'=>$this->input->post('color'),
					'car_type'=>$this->input->post('type')
					
				);
		$result=$this->dashboard_model->updateCarDetails($data);
		
	}
	
	public function message_details(){
		
		$message_id=$this->input->post('msgId');
		echo json_encode(array($this->dashboard_model->get_messages_details($message_id)));
	}
	

	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
