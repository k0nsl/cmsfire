<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Story_Vote extends CI_Controller {	
	
	public function __construct(){
		parent::__construct();
	}	
	
	public function submit($storyId, $score){
		try{
			$this->load->model('core/story_vote_model');
			if($score > 1 || $score < -1){
				$score = 0;
			}
								
			$this->story_vote_model->insert($storyId, $score);
			$post_data['result'] = 'Success!';
			echo json_encode($post_data);
		}catch(Exception $e){
			$post_data = array('result'=>$e->getMessage());
			echo json_encode($post_data);
		}
	}

	public function hasUpvoted($storyId){
		try{
			$this->load->model('core/story_vote_model');
			$story_vote = $this->story_vote_model->get_by_storyId($storyId);			
			
			if($story_vote != null && $story_vote->score == 1){
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