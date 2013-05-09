<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//home page when user first views
class Logout extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->load->model('core/user_model');
		$this->user_model->logout();
		$post_data = array('result'=>'Success!');
		echo json_encode($post_data);
	}
}

?>