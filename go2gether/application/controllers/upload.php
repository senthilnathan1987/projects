<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Upload extends CI_Controller {

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

	public function upload_file()
{
    $status = "";
    $msg = "";
    $file_element_name = 'userfile';
	 if ($status != "error")
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1024 * 8;
        $config['encrypt_name'] = TRUE;
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload($file_element_name))
        {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
        }
        else
        {
            $upload_data = $this->upload->data();
			$image_config["image_library"] = "gd2";
$image_config["source_image"] = $upload_data["full_path"];
$image_config['create_thumb'] = FALSE;
$image_config['maintain_ratio'] = TRUE;
$image_config['new_image'] = $upload_data["file_path"] . $upload_data['file_name'];
$image_config['quality'] = "100%";
$image_config['width'] = 230;
$image_config['height'] = 260;
$dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
$image_config['master_dim'] = ($dim > 0)? "height" : "width";
 
$this->load->library('image_lib');
$this->image_lib->initialize($image_config);
 
if(!$this->image_lib->resize()){ //Resize image
    redirect("errorhandler"); //If error, redirect to an error page
}else{

			
			
            $file_id = $this->dashboard_model->upload_profile_pic($upload_data['file_name']);
           
                $status = "success";
                $msg = "File successfully uploaded";
            
        }
        
   $image_config['image_library'] = 'gd2';
$image_config['source_image'] = $upload_data["file_path"] . $upload_data['file_name'];
$image_config['new_image'] = $upload_data["file_path"] . $upload_data['file_name'];
$image_config['quality'] = "100%";
$image_config['maintain_ratio'] = FALSE;
$image_config['width'] = 230;
$image_config['height'] = 260;
$image_config['x_axis'] = '0';
$image_config['y_axis'] = '0';
 
$this->image_lib->clear();
$this->image_lib->initialize($image_config); 
 
if (!$this->image_lib->crop()){
        redirect("errorhandler"); //If error, redirect to an error page
}else{
   
}     
        
		
        @unlink($_FILES[$file_element_name]);
    }
    echo json_encode(array('status' => $status, 'msg' => $msg,'filename'=>$upload_data['file_name']));
    }
}



	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
