<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginmodel extends CI_Model{
    function __construct(){
        parent::__construct();
    }
public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('email'));
        $password = md5($this->security->xss_clean($this->input->post('password')));
		
		echo $username;
		
		$this->db->where('username', $username);
		 $this->db->or_where('email', $username);
        $this->db->where('password', $password);
        
        // Run the query
        $query = $this->db->get('users');
		
		 if($query->num_rows == 1)
        {
        	$row = $query->row();
			$data = array(
                    'username' => $row->username,
                    'user_id' => $row->uid,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
			
            return true;
		}
		return FALSE;
}


	public function register_user($data1='',$data2='',$data3='',$data4='')
	{
		
		   $this->db->set($data1);
		   $this->db->insert('users',$data1);
		   $user_tbl_insert_id=$this->db->insert_id();
		    $this->db->set('user_id',$user_tbl_insert_id);
		   $this->db->insert('users_basic_info',$data2);
		    $this->db->set('user_id',$user_tbl_insert_id);
		   $this->db->insert('work_education',$data3);
		  $this->db->set('user_id',$user_tbl_insert_id);
		   $this->db->insert('users_profile_pic',$data4);
		   
		   
		
		
	}


}

 ?>