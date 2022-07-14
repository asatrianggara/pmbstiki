<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('_partials/head.php'); ?>
</head>

<body>
	<?php $this->load->view('_partials/navbar.php'); ?>
	<div class="main">
	<div class="container">

	<div class="row">

		<div class="col-md-6">
		<h1>Sign Up</h1>
		<p>Daftar untuk login</p>

		<?php if($this->session->flashdata('message_register_error')): ?>
			<div class="invalid-feedback">
					<?= $this->session->flashdata('message_register_error') ?>
			</div>
		<?php endif ?>

		<form action="<?= site_url('/Register/register') ?>" method="post" style="max-width: 600px;">
			<div>
				<label for="name">Name*</label>
				<input type="text" name="name" class="<?= form_error('name') ? 'invalid' : '' ?>"
					placeholder="Your name" value="<?= set_value('name') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('name') ?>
				</div>
			</div>

			<div>
				<label for="username">Username*</label>
				<input type="text" name="username" class="<?= form_error('username') ? 'invalid' : '' ?>"
					placeholder="Your username" value="<?= set_value('username') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('username') ?>
				</div>
			</div>

			<div>
				<label for="email">Email*</label>
				<input type="text" name="email" class="<?= form_error('email') ? 'invalid' : '' ?>"
					placeholder="Your email" value="<?= set_value('email') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('email') ?>
				</div>
			</div>

			<div>
				<label for="password">Password*</label>
				<input type="password" name="password" class="<?= form_error('password') ? 'invalid' : '' ?>"
					placeholder="Enter your password" value="<?= set_value('password') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('password') ?>
				</div>
			</div>

			<div>
				<input type="submit" class="button button-primary" value="Register">
			</div>
		</form>
	</div>


	<div class="col-md-6">
		<div class="row-md-4" style="margin-bottom: 25%;">
			
		</div>
		<div class="row-md-4">
		<img src="<?php echo base_url('upload/undraw_sign_in_re_o58h.svg'); ?>" class="imgcard"
                alt="Sample photo" class="img-fluid" />
			
		</div>
		<div class="row-md-4" style="margin-top: 25%;">
			
		</div>
	</div>
	
	</div>
</div>
	</div>
	<?php $this->load->view('_partials/footer.php'); ?>
</body>

</html>