<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
	
	public function __construct(){
		parent::__construct();		
	}
	
	public function index(){		
		$this->redirect_not_admin();
		$this->load->view('core/category');//body content
	}
	
	public function get(){
		try{			
			$this->load->model('core/category_model');			
			echo json_encode($this->category_model->get());
		}catch(Exception $e){
			$post_data = array('result'=>$e->getMessage());
			echo json_encode($post_data);
		}		
	}

	public function submit(){
		try{
			$this->redirect_not_admin();
			$post_data = array('result'=>'');
			$this->load->model('core/category_model');
			
			if($this->validate()){
				$this->category_model->insert();
				$post_data['result'] = 'Success!';
			}
			echo json_encode($post_data);
		}catch(Exception $e){
			$post_data = array('result'=>$e->getMessage());
			echo json_encode($post_data);
		}
	}
	
	private function validate(){
		$this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[100]|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'required|trim|max_length[255]|xss_clean');

		if($this->form_validation->run()){
			return true;
		}
		
		throw new Exception(validation_errors());
	}			
}

?>