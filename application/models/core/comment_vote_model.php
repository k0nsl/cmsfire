<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_Vote_Model extends CI_Model{
	
	//Table
	var $TABLE = "comment_vote";
	//Fields

	
	function __construct(){	
		parent::__construct();
	}	
	
	function insert($commentId, $score)
	{
		$this->load->model('core/user_model');
		$this->load->model('core/comment_model');

		$user = $this->user_model->get_by_name($this->session->userdata('name'));

		if($user != null){
			$userId = $user->id;
		}else{
			throw new Exception('Not logged in!');
		}
		//make comment exists..		
		$comment = $this->comment_model->get_by_commentId($commentId);

		if(strlen($userId) == 0){
			throw new Exception('Not logged in!');
		}
	
		if($comment == null){
			throw new Exception('comment doesnt exist!');
		}
		
		$data = array(
			'userId'=>$userId,
			'commentId'=>$commentId,
			'score'=>$score
		);


		if($this->exists($commentId, $userId) == -1){		
			$this->db->insert($this->TABLE, $data);
		}else{
			$this->update($data);
		}
	}
	
	function get(){
	}

	function get_by_commentId($commentId, $isYours=true){
		
		$this->load->model('core/user_model');
		if($commentId == ''){return null;}
		$user = $this->user_model->get_by_name($this->session->userdata('name'));
		if($user != null){
			$userId = $user->id;
		}else{
			throw new Exception('Not logged in!');
		}
		return $this->db->where('commentId', $commentId)->where('userId', $userId)->get($this->TABLE)->row(0);
	}	

	
	function update($data)
	{		
		$valData = array(
            'score' => $data['score']             
        );
		$this->db->where('commentId', $data['commentId']);
		$this->db->where('userId', $data['userId']);
		$this->db->update($this->TABLE, $valData);
	}
	
	/*
		Check if User Exists.	
	*/
	function exists($commentId, $userId)
	{		
		if($commentId == "" || strlen($commentId) == 0){throw new Exception('Empty comment');}
		$this->db->select('commentId');
		$this->db->from($this->TABLE);		
		$where = array('commentId'=>$commentId, 'userId'=>$userId);
		$this->db->where($where);
		$result = $this->db->get();
		
		foreach ($result->result() as $row){
			return $row->commentId;
		}		
		return -1;
	}
	
}

?>