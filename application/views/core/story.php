<div id="create_form">
<?php echo form_open(base_url(). 'story/submit'); ?>
<ul>
	<li>
		<label>Title</label>
		<div><?php echo form_input(array('id'=> 'name', 'name' => 'name')); ?></div>
	</li>

	<li>
		<label>Link</label>
		<div><?php echo form_input(array('id'=> 'link', 'name' => 'link')); ?></div>
	</li>
	
	<li>
		<label>Category</label>
		<div><?php echo form_input(array('id'=> 'category', 'name' => 'category')); ?></div>
	</li>
		
	<li>
		<label>Description / Comment</label>
		<div>
			<textarea name="description" id="description" rows="4" cols="50"></textarea>
		</div>
	</li>
	
	<li>
		<?php echo form_submit(array('name'=> 'submit'), 'Post a story'); ?>
	</li>	
</ul>

<?php echo form_close(); ?>
</div>