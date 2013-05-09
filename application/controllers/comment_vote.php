<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_Vote extends CI_Controller {	
	
	public function __construct(){
		parent::__construct();
	}	
	
	public function submit($commentId, $score){
		try{
			$this->load->model('core/comment_vote_model');
			if($score > 1 || $score < -1){
				$score = 0;
			}
								
			$this->comment_vote_model->insert($commentId, $score);
			$post_data['result'] = 'Success!';
			echo json_encode($post_data);
		}catch(Exception $e){
			$post_data = array('result'=>$e->getMessage());
			echo json_encode($post_data);
		}
	}

	public function hasUpvoted($commentId){
		try{
			$this->load->model('core/comment_vote_model');
			$comment_vote = $this->comment_vote_model->get_by_commentId($commentId);			
			
			if($comment_vote != null && $comment_vote->score == 1){
				$post_data['result'] = 'true';
			}else{
				$post_data['result'] = 'false';
			}			
			echo json_encode($post_data);
		}catch(Exception $e){
			$post_data = array('result'=>$e->getMessage());
			echo json_encode($post_data);
		}

	}
}

?>