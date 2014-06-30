<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
	private $table_users			= 'users';
	private $table_personal_info	= 'personal_informations';
	private $table_ride_info	= 'offer_ride';
	

	function __construct()
	{
		parent::__construct();
		
	}
	
	
	public function user_detail($user_id){
		
		$this->db->where('id', $user_id);
		$this->db->join('personal_informations', 'personal_informations.fk_user_id =users.id');
		$query = $this->db->get('users');
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
		
	}
	
	public function get_ride_list($user_id){
		
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('offer_ride');
		return $query->result();
		
		
	}
	public function upload_profile_pic($filename){
		
		    $this->db->set('profile_pic', $filename);
			$this->db->where('fk_user_id', $this -> session -> userdata('user_id'));
			$this->db->update('personal_informations');
		
	}

	public function deleteOffer($offerId){
		$this->db->where('ride_id', $offerId);
		if($this->db->delete('offer_ride')){
			return TRUE;
		}else{
			return FALSE;
		}
		
	}

	public function updateCarDetails($data){
		
		$this->db->where('user_id', $this -> session -> userdata('user_id'));
		if($this->db->update('user_car',$data)){
		return TRUE;
		}else{
			return FALSE;
		}
	}
	public function get_car_Details($user_id){
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('user_car');
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
		
	}
	
	
	public function get_messages($user_id){
		$this->db->where('msg_to', $user_id);
		$this->db->where('action', '0');
		$this->db->join('personal_informations', 'personal_informations.fk_user_id =message.msg_from');
		$query = $this->db->get('message');
	    return $query->result();
		
		
	}
	
	public function sent_messages($user_id){
		$this->db->where('msg_from', $user_id);
		$this->db->where('action', '0');
		$this->db->join('personal_informations', 'personal_informations.fk_user_id =message.msg_from');
		$query = $this->db->get('message');
	    return $query->result();
		
		
	}
	
   public function get_messages_details($msgId){
   	$this->db->where('message_id', $msgId);
	$this->db->join('personal_informations', 'personal_informations.fk_user_id =message.msg_from');
		$query = $this->db->get('message');
		
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
   }
	
	public function deleteMessages($msgId){
		$this->db->where('message_id', $msgId);
		$this->db->set('Action', '1');
		if($this->db->update('message')){
		return TRUE;
		}else{
			return FALSE;
		}
		
	}
	
	
	
	
}

