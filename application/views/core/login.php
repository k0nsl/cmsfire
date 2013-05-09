<div id="create_form">
<?php echo form_open(base_url(). 'login/submit'); ?>
<ul>
	<li>
		<label>Username</label>
		<div><?php echo form_input(array('id'=> 'name', 'name' => 'name')); ?></div>
	</li>
	
	<li>
		<label>Password</label>
		<div><?php echo form_password(array('id'=> 'password', 'name' => 'password')); ?></div>
	</li>

	<li>
		<?php echo form_submit(array('name'=> 'submit'), 'Create Account'); ?>
	</li>	
</ul>

<?php echo form_close(); ?>
</div>