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
		<h1>Login</h1>
		<p>Masuk ke Dashboard</p>

		<?php if($this->session->flashdata('message_login_error') != ''): ?>
			<div class="invalid-feedback">
					<?php echo $this->session->flashdata('message_login_error') ?>
			</div>
		<?php endif ?>

		<form action="<?= site_url('/auth/login') ?>" method="post" style="max-width: 600px;">
			<div>
				<label for="name">Email/Username*</label>
				<input type="text" name="username" class="<?= form_error('username') ? 'invalid' : '' ?>"
					placeholder="Your username or email" value="<?= set_value('username') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('username') ?>
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
				<input type="submit" class="button button-primary" value="Login">
			</div>
		</form>

		<a href="<?= site_url('/register') ?>">Daftar</a>
		</div>

		<div class="col-md-6">
			<img src="<?php echo base_url('upload/undraw_my_password_re_ydq7 .svg'); ?>" class="imgcard"
                alt="Sample photo" class="img-fluid" />
		</div>

	</div>
	</div>
</div>
	<?php $this->load->view('_partials/footer.php'); ?>
</body>

</html>