<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Offer_Ride_Model extends CI_Model
{
	private $table_name			= 'offer_ride';
	

	function __construct()
	{
		parent::__construct();
		$this->table_name		= $this->table_name;
	}
	
	function offer_ride($data){
		$this->db->insert($this->table_name, $data);
		$ride_id = $this->db->insert_id();
		$this->session->set_userdata(array(
								'last_insert_ride_id'	=> $ride_id,
						));
		
		return TRUE;
	}
	
	function publish_ride($data,$ride_id){
		
		$this->db->where('ride_id', $ride_id);	
		$this->db->update($this->table_name, $data);
		
		return TRUE;
	}
	
	function get_detail_offer_ride($data,$last_insert_id){
		
		$this->db->where('ride_id', $last_insert_id);

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}
	
	public function get_offer_full_details($offer_id='')
	{
		$this->db->where('ride_id', $offer_id);
		$this->db->join('personal_informations', 'personal_informations.fk_user_id =offer_ride.user_id');
		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}
	
	public function count_offers($user_id){
			
		$this->db->where('user_id', $user_id);

		$query = $this->db->get($this->table_name);
		return $query->num_rows(); 
		
	}
	public function user_login_details($user_id){
			
		$this->db->where('id', $user_id);

		$query = $this->db->get('users');
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
		
	}
	
	public function send_message($data){
		$this->db->insert('message', $data);
		return TRUE;
	}
	
	
}

