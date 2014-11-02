<?php $this->load->view('layouts/header');?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h2>Add User</h2>
				<?php if(isset($smsg)){ echo '<div class="alert alert-success" role="alert">'.$smsg.'</div>';}?>
				<?php if(isset($fmsg)){ echo '<div class="alert alert-danger" role="alert">'.$fmsg.'</div>';}?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8">
			<form role="form" class="col-md-6" action="<?php echo base_url();?>index.php/user/user_save" method="POST" enctype="multipart/form-data">

			  <div class="form-group">
			    <label for="first_name">First Name</label>
			    <input type="text" class="form-control" id="first_name"  name="first_name" value="<?php echo set_value('first_name'); ?>">
			  	<?php echo form_error('first_name', '<div class="alert alert-danger">', '</div>'); ?>
			  </div>

			  <div class="form-group">
			    <label for="last_name">Last Name</label>
			    <input type="text" class="form-control" id="last_name"  name="last_name" value="<?php echo set_value('last_name'); ?>">
			  	<?php echo form_error('last_name', '<div class="alert alert-danger">', '</div>'); ?>
			  </div>

			  <div class="form-group">
			    <label for="address">Address</label>
			    <textarea class="form-control" id="address"  name="address"><?php echo set_value('address'); ?></textarea>
			  	<?php echo form_error('address', '<div class="alert alert-danger">', '</div>'); ?>
			  </div>

			  <div class="form-group">
			    <label for="email">Email</label>
			    <input type="text" class="form-control" id="email"  name="email" value="<?php echo set_value('email'); ?>">
			  	<?php echo form_error('email', '<div class="alert alert-danger">', '</div>'); ?>
			  </div>

			  <div class="form-group">
			    <label for="phone_number">Phone Number</label>
			    <input type="text" class="form-control" id="phone_number"  name="phone_number" value="<?php echo set_value('phone_number'); ?>">
			  	<?php echo form_error('phone_number', '<div class="alert alert-danger">', '</div>'); ?>
			  </div>

			  <div class="form-group">
			    <label for="picture">Profile Picture</label>
			    <input type="file" id="picture" name="picture"/>
			    <?php echo form_error('picture', '<div class="alert alert-danger">', '</div>'); ?>
			    <?php if(isset($file_error)){ echo '<div class="alert alert-danger" role="alert">'.$file_error.'</div>';}?>
			    <p class="help-block">Upload jpg|png images.</p>
			  </div>
			  
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
			<div>
		</div>
	</div>
</body>
</html>