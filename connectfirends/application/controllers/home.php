<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	
	 function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }
	 
	 
	
	 
	 private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect(base_url());
        }
    }
	  public function do_logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
	   function news_feeds(){
	 	$this->load->view('header');
		$this->load->view('header_navigation');
		$this->load->view('news_feeds');
		$this->load->view('footer');
	 }
}
?>