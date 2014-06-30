<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offer_ride extends CI_Controller {

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
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('offer_ride_model');
		$this->load->library('tank_auth');
		
		
	}
	
	
	public function index()
	{
		
		
		$data = array(
					'ride_departure'=> $this->input->post('departure'),
					'ride_arrival'=>$this->input->post('arrival'),
					'ride_pick_date'=>$this->input->post('rideDate'),
					'ride_pick_time'=>$this->input->post('rideTime'),
					'user_id'=>$this->session->userdata('user_id')
				);
		if($this->offer_ride_model->offer_ride($data)){
			redirect('/offer_ride/ride_step2');
		}
		
	}

	public function ride_step2()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('navigation');
		$data=$this->offer_ride_model->get_detail_offer_ride($this->session->userdata('user_id'),$this->session->userdata('last_insert_ride_id'));
		$this->load->view('offer_ride_step2',$data);
		$this->load->view('common_model_popup');
		$this->load->view('footer');
	
	}
	
	public function publish_ride()
	{
		$data = array(
					'ride_price'=> $this->input->post('price'),
					'ride_description'=>$this->input->post('rideDesc'),
					'ride_seats'=>$this->input->post('passanger'),
					'ride_luggage_size'=>$this->input->post('luggageSize'),
					'ride_leave'=>$this->input->post('rideLeave'),
					'ride_detour'=>$this->input->post('detour'),
					'ride_created_date'=> date('Y-m-d H:i:s')
				);
		$ride_id=$this->session->userdata('last_insert_ride_id');
		$this->offer_ride_model->publish_ride($data,$ride_id);
		
		if ($this->tank_auth->is_logged_in()) {
			$this->load->helper('url');
			$this->load->view('header');
			$this->load->view('navigation');
			$data=$this->offer_ride_model->get_detail_offer_ride($this->session->userdata('user_id'),$this->session->userdata('last_insert_ride_id'));
			$this->load->view('published',$data);
			$this->load->view('common_model_popup');
			$this->load->view('footer');
			
		}else{
			
			redirect('/home/register');
		}	
		
		
		
		
	
	}
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */