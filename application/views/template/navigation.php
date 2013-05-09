<!--<div id="navigation-header-categories"></div>-->

<div id="navigation-header-categories">
	<ul class="category-header-link">
		<li class="category-header-link-list"><a href="/" class="category-header-link-list">Home</a></li>
			<?php
				foreach($categoriesResult as $row){
					echo '<li class="category-header-link-list"><a href="/f/'.$row->name.'" class="category-header-link-list">'.$row->name.'</a></li>';
				}
			?>			
	</ul>
</div>

<div id="navigation-cover">
	<div class="navigation-user-container">
		<div id="navigation-header-user"></div>		
	</div>
	<div id="navigation-logo">
		<!--<img src="http://f.thumbs.redditmedia.com/5j2D-mwj6zafK81e.png">-->
		<label class="cms-label">CMS Fire</label>
	</div>
</div>