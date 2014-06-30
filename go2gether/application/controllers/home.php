<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this -> load -> model('find_ride_model');
	}
	
	
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$data['home']="active";
		
		//$this->load->view('navigation',$data);
		$this->load->view('home_page',$data);
		
		
	}



	public function test(){
		$ride_departure= $this->input->post('start-input');
		$ride_arrival= $this->input->post('end-input');
		$rideDate= $this->input->post('rideDate');

		echo  json_encode( $this -> find_ride_model -> get_ride_list($ride_departure,$ride_arrival,$rideDate));
	}

	public function CostRangeFilter(){

		$minVal= $this->input->post('minVal');
		$maxVal= $this->input->post('maxVal');
		$ride_departure= $this->input->post('start-input');
		$ride_arrival= $this->input->post('end-input');
		$rideDate= $this->input->post('rideDate');

		echo  json_encode( $this -> find_ride_model -> get_ride_list_rangeFilter($minVal,$maxVal));


        //$rangeVal=$arrayName = array('minVal'=>$minVal,'maxVal'=>$maxVal);
		//echo  json_encode($rangeVal);
	}


	public function FilterByGender(){
	$gender=$this->input->post('gender');
	echo  json_encode( $this -> find_ride_model -> get_ride_list_GenderFilter($gender));	
	}
	
	
	public function find_ride()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$data['find_ride']="active";
		$this->load->view('navigation',$data);
		
		if(isset($_POST['searchOffers'])) {
            $ride_departure= $this->input->post('start-input');
		    $ride_arrival= $this->input->post('end-input');
		    $rideDate= $this->input->post('rideDate');
         }else{
         	 $ride_departure= "";
		    $ride_arrival= "";
		    $rideDate= "";
         }
		
		
		
		$data['arrival_point']=$ride_arrival;
		$data['departure_point']=$ride_departure;
		$data['rideDate']=$rideDate;
		$data['result'] = $this -> find_ride_model -> get_ride_list($ride_departure,$ride_arrival,$rideDate);
		//print_r($data);
		$this->load->view('find_ride',$data);
		$this->load->view('common_model_popup');
		
	}

   public function find_ride_result() {
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('navigation');
		$ride_departure= $this->input->post('start-input');
		$ride_arrival= $this->input->post('end-input');
		$data['arrival_point']=$ride_arrival;
		$data['departure_point']=$ride_departure;
		//$data['result'] = $this -> find_ride_model -> get_ride_list($ride_departure,$ride_arrival);
		//print_r($data);
		$this->load->view('ride_search_result');
		
		$this->load->view('footer');
	}
	
	public function offer_ride()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$data['offer_ride']="active";
		$this->load->view('navigation',$data);
		$this->load->view('offer_ride');
		$this->load->view('common_model_popup');
		$this->load->view('footer');
	}
	
	public function register()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('register');
		$this->load->view('common_model_popup');
		$this->load->view('footer');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */