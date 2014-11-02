<?php
class User extends CI_Controller{
	//Construct function
	function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->gallery_path = realpath(APPPATH.'../assets/uploads');
		$this->load->library('form_validation');
	}

	//Index function
	public function index(){

		$this->load->view('user_register');
	}

	public function user_save(){
		//Get form data
		$first_name   = $this->input->post('first_name');
		$last_name    = $this->input->post('last_name');
		$address      = $this->input->post('address');
		$email        = $this->input->post('email');
		$phone_number = $this->input->post('phone_number');
		$picture      = $this->input->post('picture');

		//Define array to pass data to view and define variable for image upload status
		$pass_data    = array();
		$image_upload_status = FALSE;


		//Set validation rules
		$config =  array(
			array('field' => 'first_name','label' => 'First Name', 'rules' => 'required|trim|max_length[100]'),
			array('field' => 'last_name','label' => 'Last Name', 	'rules' => 'required|trim|max_length[100]'),
			array('field' => 'address','label' => 'Address','rules' => 'required|trim|max_length[200]'),
			array('field' => 'email', 'label' => 'Email', 	'rules' => 'required|trim|max_length[100]|valid_email'),
			array('field' => 'phone_number', 'label' => 'Phone Number','rules' => 'required|trim|max_length[15]|numeric'),
		);
		//print_r($_FILES);exit();
		//Check image file isset and upload that image to gallery
		if(isset($_FILES['picture']['name']))
		{
			$config['upload_path']   = $this->gallery_path;
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	     = '1024';
			

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('picture'))
			{
				$image_upload_status     =FALSE;
				$pass_data['file_error'] = $this->upload->display_errors();
			}
			else
			{
				$image_upload_status     =TRUE;
				$image_data = $this->upload->data();
			}
			
		}
		
		//Set validation rules
		$this->form_validation->set_rules($config);
		
		//Check form validtion and image uploaded status
		if($this->form_validation->run($this)==TRUE && $image_upload_status==TRUE)
		{
			//Create array to save data to user_tbl
			$data = array(
						'first_name'=>$first_name,
						'last_name'=>$last_name,
						'address'=>$address,
						'address'=>$address,
						'email'=>$email,
						'phone_number'=>$phone_number
						);

			$result = $this->User_model->save($data);

			if(count($result)>0)
			{
				$pass_data['smsg']= 'Record Added successfull';

			}
			else
			{
				$pass_data['fmsg'] = 'Record Added failed';

			}
		}

		$this->load->view('user_register',$pass_data);
		
		//echo $first_name.$last_name.$address.$email.$phone_number.$picture;
		//exit();
	}
}
?>