$(document).ready(
	function() {
		function convert_time_helper($day, $hour, $year, $minute, $second)
   		{						
			//echo $day;
			if($year == 0)
			{
				if($day == 0)
				{
					if($hour == 0)
					{
						if($minute == 0)
						{
							$timeToUse = $second + (($second == 1)? " second ago" :  " seconds ago");
						}
						else
						{
							$timeToUse = $minute + (($minute==1)?" minute ago": " minutes ago");
						}
					}
					else
					{
						$timeToUse = $hour + (($hour == 1)? " hour ago" : " hours ago");
					}
				}
				else
				{
					$timeToUse = $day + (($day == 1)?" day ago" : " days ago");
				}
			}
			else
			{
				$timeToUse = $year + (($year == 1)?" year ago" : " years ago");
			}						
		
			return $timeToUse;
		}

		//add event handler
		function addHandlers(isStory){
			var type = "story";
			if(!isStory){
				type = "comment";
			}

			$("." + type +"-link-upvote").die("click").live("click", function() {
				//if it has the log in thing generate this...
				if($("#log-in-or-register-modal").length > 0){
					$('.navigation-header-log-in-or-register').trigger('click');
					return;
				}
				var parentContainer = $(this).parent();
				var upvoteButton = $(this).parent().find("." + type + "-link-upvote");

				var storyIndex = upvoteButton.attr("value");
				
				var baseUrl = "/" + type + "_vote";
				var score = 0;



				if($('#' + type + '-link-upvote-' + storyIndex).hasClass("voted")){
					score = 0;
					$('#' + type + '-link-upvote-' + storyIndex).removeClass("voted");
				}else{
					score = 1;
					$('#' + type + '-link-upvote-' + storyIndex).addClass("voted");
				}


				var jqxhr = $.getJSON( baseUrl + "/submit/" + storyIndex + "/" + score, function() {})			
				.done(function(data) {
					if(data.result == 'Success!'){						
					}									
				})
				.fail(function() { console.log( "error voting for content" ); })
			});

			$("." + type + "-link-downvote").click(function() {
				//if it has the log in thing generate this...
				if($("#log-in-or-register-modal").length > 0){
					$('.navigation-header-log-in-or-register').trigger('click');
					return;
				}
				var parentContainer = $(this).parent();
				var downvoteButton = $(this).parent().find("." + type + "-link-downvote");
				var storyIndex = downvoteButton.attr("value");
				var baseUrl = "/" + type + "_vote";
				var score = -1;

				var jqxhr = $.getJSON( baseUrl + "/submit/" + storyIndex + "/" + score, function() {})			
				.done(function(data) {
					if(data.result == 'Success!'){
						parentContainer.fadeOut();
					}				
				})
				.fail(function() { console.log( "error voting for content" ); })  				
			});
		}

		function handleCommentVoted(data){
			var baseUrl = "/comment_vote";
			var jqxhr;
			$.each(data, function(i, item)
			{			
				jqxhr = $.getJSON( baseUrl + "/hasUpvoted/" + item.id, function() {})
				.done(function(data) {
					if(data.result == 'true'){					
						$('#comment-link-upvote-' + item.id).addClass("voted");
					}
				})
				.fail(function() { console.log( "error voting for content" ); })  			
			});
		}	

		function handleVoted(data){
			var baseUrl = "/story_vote";
			var jqxhr;
			$.each(data, function(i, item)
			{			
				jqxhr = $.getJSON( baseUrl + "/hasUpvoted/" + item.id, function() {})
				.done(function(data) {
					if(data.result == 'true'){					
						$('#story-link-upvote-' + item.id).addClass("voted");
					}
				})
				.fail(function() { console.log( "error voting for content" ); })  			
			});
		}
		
		window.handleCommentVoted = handleCommentVoted;
		window.handleVoted = handleVoted;
		window.addHandlers = addHandlers;
		window.convert_time_helper=convert_time_helper;
	}
);