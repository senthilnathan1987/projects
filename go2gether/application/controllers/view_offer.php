<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class View_offer extends CI_Controller {

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
		$this -> load -> model('offer_ride_model');
		$this -> load -> library('tank_auth');

	}

	public function index() {

		
		$this -> load -> view('header');
		$this -> load -> view('navigation');
		$offer_id= $this->uri->segment(2);
		
		$data['result']=$this->offer_ride_model->get_offer_full_details($offer_id);
		$user_id=$data['result']->user_id;
		$data['offer_count_user']=$this->offer_ride_model->count_offers($user_id);
		$data['user_detail']=$this->offer_ride_model->user_login_details($user_id);
		
	//print_r($data);
		
		$this -> load -> view('view_offer',$data);


	}

	public function send_message(){
		
		$data = array(
					'subject'=> $this->input->post('subject'),
					'message_desc'=>$this->input->post('message'),
					'msg_from'=>$this->input->post('from'),
					'msg_to'=>$this->input->post('to'),
					'created_date'=>date('Y-m-d H:i:s')
				);
		if($this->offer_ride_model->send_message($data)){
			
		}
	}

	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
