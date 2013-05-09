<div id="create_form">
<?php echo form_open(base_url(). 'category/submit'); ?>
<ul>
	<li>
		<label>Name of Topic</label>
		<div><?php echo form_input(array('id'=> 'name', 'name' => 'name')); ?></div>
	</li>
	
	<li>
		<label>Description</label>
		<div>
			<textarea name="description" id="description" rows="4" cols="50"></textarea>
		</div>
	</li>
	
	<li>
		<?php echo form_submit(array('name'=> 'submit'), 'Create Category'); ?>
	</li>	
</ul>

<?php echo form_close(); ?>
</div>