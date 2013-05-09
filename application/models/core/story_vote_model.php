<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Story_Vote_Model extends CI_Model{
	
	//Table
	var $TABLE = "story_vote";
	//Fields

	
	function __construct(){	
		parent::__construct();
	}	
	
	function insert($storyId, $score)
	{
		$this->load->model('core/user_model');
		$this->load->model('core/story_model');

		$user = $this->user_model->get_by_name($this->session->userdata('name'));

		if($user != null){
			$userId = $user->id;
		}else{
			throw new Exception('Not logged in!');
		}
		//make sure story exists..
		$story = $this->story_model->get_by_id($storyId);
		
		if(strlen($userId) == 0){
			throw new Exception('Not logged in!');
		}
	
		if($story == null){
			throw new Exception('Story doesnt exist!');
		}
		
		$data = array(
			'userId'=>$userId,
			'storyId'=>$storyId,
			'score'=>$score
		);


		if($this->exists($storyId, $userId) == -1){		
			$this->db->insert($this->TABLE, $data);
		}else{
			$this->update($data);
		}
	}
	
	
	function get_by_storyId($storyId){
		$this->load->model('core/user_model');
		if($storyId == ''){return null;}
		$user = $this->user_model->get_by_name($this->session->userdata('name'));
		if($user != null){
			$userId = $user->id;
		}else{
			throw new Exception('Not logged in!');
		}
		return $this->db->where('storyId', $storyId)->where('userId', $userId)->get($this->TABLE)->row(0);
	}
	
	function get(){
	}
	
	function update($data)
	{		
		$valData = array(
            'score' => $data['score']             
        );
		$this->db->where('storyId', $data['storyId']);
		$this->db->where('userId', $data['userId']);
		$this->db->update($this->TABLE, $valData);
	}
	
	/*
		Check if User Exists.	
	*/
	function exists($storyId, $userId)
	{		
		if($storyId == "" || strlen($storyId) == 0){throw new Exception('Empty story');}
		$this->db->select('storyId');
		$this->db->from($this->TABLE);		
		$where = array('storyId'=>$storyId, 'userId'=>$userId);
		$this->db->where($where);
		$result = $this->db->get();
		
		foreach ($result->result() as $row){
			return $row->storyId;
		}		
		return -1;
	}
	
}

?>