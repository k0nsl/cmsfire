<div id="navigation-tabs">
	<div class="navigation-link-container hot-link <?php 
		echo ((isset($navigationSelectedHot) && strlen($navigationSelectedHot) > 0) ? 'navigation-selected' : '');
	?>">
	<?php
	 	echo '<a href="'.((isset($category) && strlen($category) > 0) ? '/f/'.$category :  '/home').'" class="nav-link '.((isset($navigationSelectedHot) && strlen($navigationSelectedHot) > 0) ? "navigation-selected-label" : "").'"><b>Hot</b></a>';
	?>
	</div>
	<div class="navigation-link-container latest-link <?php 
		echo ((isset($navigationSelectedLatest) && strlen($navigationSelectedLatest) > 0) ? 'navigation-selected' : '');
	?>">
	<?php
	 	echo '<a href="'.((isset($category) && strlen($category) > 0) ? '/f/'.$category.'/latest' :  '/home/latest').'" class="nav-link '.((isset($navigationSelectedLatest) && strlen($navigationSelectedLatest) > 0) ? "navigation-selected-label" : "").'"><b>Latest</b></a>';
	?>
	</div>
</div>