<div id="navigation-tabs">
	<div class="navigation-link-container user-comments-link <?php 
		echo ((isset($type) && $type == "comments") ? 'navigation-selected' : '');
	?>">
	<?php
	 	echo '<a href="/user/'.$loadedUsername.'/comments"  class="nav-link '.((isset($type) && $type == "comments") ? "navigation-selected-label" : "").'"><b>Comments</b></a>';
	?>
	</div>

	<div class="navigation-link-container user-submitted-link <?php 
		echo ((isset($type) && $type == "submitted") ? 'navigation-selected' : '');
	?>">
	<?php
	 	echo '<a href="/user/'.$loadedUsername.'/submitted" class="nav-link '.((isset($type) && $type == "submitted") ? "navigation-selected-label" : "").'"><b>Submitted</b></a>';
	?>
	</div>	

	<div class="navigation-link-container user-liked-link <?php 
		echo ((isset($type) && $type == "liked") ? 'navigation-selected' : '');
	?>">
	<?php
	 	echo '<a href="/user/'.$loadedUsername.'/liked"class="nav-link '.((isset($type) && $type == "liked") ? "navigation-selected-label" : "").'"><b>Stories &hearts;</b></a>';
	?>
	</div>		

	<div class="navigation-link-container user-comments-liked-link <?php 
		echo ((isset($type) && $type == "comments-liked") ? 'navigation-selected' : '');
	?>">
	<?php
	 	echo '<a href="/user/'.$loadedUsername.'/commentsLiked"class="nav-link '.((isset($type) && $type == "comments-liked") ? "navigation-selected-label" : "").'"><b>Comments &hearts;</b></a>';
	?>
	</div>			
</div>