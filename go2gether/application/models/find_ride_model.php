<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Find_Ride_Model extends CI_Model
{
	private $table_name			= 'offer_ride';
	

	function __construct()
	{
		parent::__construct();
		$this->table_name		= $this->table_name;
	}
	
	
	
	function get_ride_list($ride_departure,$ride_arrival,$rideDate){
		
		if($ride_departure=='' && $ride_arrival=="" && $rideDate==""){
			$this->db->join('personal_informations', 'personal_informations.fk_user_id =offer_ride.user_id');
		$query = $this->db->get($this->table_name);
		return $query->result();
			
		}else{
		
		$this->db->like('ride_departure', $ride_departure);
		$this->db->like('ride_arrival', $ride_arrival);
		$this->db->where('ride_pick_date', $rideDate);
		$this->db->join('personal_informations', 'personal_informations.fk_user_id =offer_ride.user_id');
		$query = $this->db->get($this->table_name);
		return $query->result();
		}
		
	}

	function get_ride_list_rangeFilter($minVal,$maxVal){

		$this->db->where('ride_price BETWEEN "'.$minVal.'" AND"'.$maxVal.'"');
		$this->db->join('personal_informations', 'personal_informations.fk_user_id =offer_ride.user_id');
		$query = $this->db->get($this->table_name);
		return $query->result();

	}

	function get_ride_list_GenderFilter($gender){
		if($gender!=="all"){
		$this->db->where('personal_gender',$gender);
	     }
		$this->db->join('personal_informations', 'personal_informations.fk_user_id =offer_ride.user_id');
		$query = $this->db->get($this->table_name);
		return $query->result();
	}

	
}

