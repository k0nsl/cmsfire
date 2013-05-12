<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Initial extends CI_Controller {
	
	public function __construct(){
		parent::__construct();		
	}
	
	public function index(){		
		//now delete this file...
		$this->load->view("template/initial");
	}
	
	public function submit(){
		try{
			$post_data = array('result'=>'');
			$this->load->model('core/user_model');
			
			if($this->validate()){
				//create the tables..			
				$this->user_model->insert(true);
				$post_data['result'] = 'Success!';
				unlink(APPPATH."/controllers/initial.php");
				//then destroy it..
			}
			echo json_encode($post_data);
		}catch(Exception $e){
			$post_data = array('result'=>$e->getMessage());
			echo json_encode($post_data);
		}
	}

	public function userExists(){
		try{
			$post_data = array('result'=>'');
			$this->load->model('core/user_model');				
			
			if($this->user_model->exists($this->input->post('name')) == -1){
				$post_data['result'] = 'Name is available';
				$post_data['color'] = "green";
			}else{
				$post_data['result'] = 'Name is taken';
				$post_data['color'] = "red";
			}		
			
			echo json_encode($post_data);
		}catch(Exception $e){
			$post_data = array('result'=>$e->getMessage());
			echo json_encode($post_data);
		}		
	}
	
	private function validate(){
		$this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[50]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[50]|xss_clean');
		$this->form_validation->set_rules('repassword', 'Re-Password', 'required|trim|max_length[50]|xss_clean');		
		$this->form_validation->set_rules('email', 'Email', 'trim|max_length[50]|xss_clean');
		
		if($this->input->post('password') != $this->input->post('repassword')){
			throw new Exception("Passwords don't match");
		}
		
		if($this->form_validation->run()){
			return true;
		}
		
		throw new Exception(validation_errors());
	}
}

?>