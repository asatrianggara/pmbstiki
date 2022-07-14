<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_partials/side_nav.php') ?>

		<div class="content">
			<?php $this->load->view('admin/_partials/card_berkas.php') ?>
			<h1>Unggah Berkas</h1>

			<!-- <div class="card">
				<div class="card-header">
					<b>Avatar</b>
					<div style="display: flex; gap: 1em">
						<a href="<?= site_url('admin/setting/remove_avatar') ?>" class="txt-red">Remove Avatar</a>
						<a href="<?= site_url('admin/setting/upload_avatar') ?>">Change Avatar</a>
					</div>
				</div>
				<div class="card-body">
					<?php
					$avatar = $current_user->avatar ?
						base_url('upload/avatar/' . $current_user->avatar)
						: get_gravatar($current_user->email)
					?>
					<img src="<?= $avatar ?>" alt="<?= htmlentities($current_user->name, TRUE) ?>" height="80" width="80">
				</div>
			</div> -->
		<form action="" method="POST" enctype="multipart/form-data">

			<div class="card">
				<div class="card-header">
					<b>Ijazah</b>
					<!-- <a href="<?= site_url('admin/setting/edit_profile') ?>">Edit Profile</a> -->
				</div>
				<div class="card-body">
					<?php
					$berkas1 = $berkas->ijazah ?
						base_url('upload/berkas/' . $berkas->ijazah)
						: get_gravatar($current_user->email)
					?>

					<img src="<?= $berkas1 ?>" alt="<?= htmlentities($current_user->name, TRUE) ?>" height="80" width="80">

						<div>
						<label for="ijazah">Pilih File</label>
						<input type="file" name="ijazah" id="ijazah" accept="image/png, image/jpeg, image/jpg, application/pdf" <?php if($berkas->draft == "false") { echo "disabled";} ?>>
						</div>

						<?php if (isset($error)) : ?>
							<div class="invalid-feedback"><?= $error ?></div>
						<?php endif; ?>

						<div>
							<button 
							type="submit" name="jenis_file" class="button" value="ijazah"
							<?php if($berkas->draft == "false") { echo "disabled";} ?>
							>Upload</button>
						</div>
				</div>
			</div>


			<div class="card">
				<div class="card-header">
					<b>SKHUN</b>
					<!-- <a href="<?= site_url('admin/setting/edit_profile') ?>">Edit Profile</a> -->
				</div>
				<div class="card-body">
					<?php
					$berkas2 = $berkas->skhun ?
						base_url('upload/berkas/' . $berkas->skhun)
						: get_gravatar($current_user->email)
					?>
					<img src="<?= $berkas2 ?>" alt="<?= htmlentities($current_user->name, TRUE) ?>" height="80" width="80">

						<div>
						<label for="skhun">Pilih File</label>
						<input type="file" name="skhun" id="skhun" accept="image/png, image/jpeg, image/jpg, application/pdf" <?php if($berkas->draft == "false") { echo "disabled";} ?>>
						</div>

						<?php if (isset($error)) : ?>
							<div class="invalid-feedback"><?= $error ?></div>
						<?php endif; ?>

						<div>
							<button type="submit" name="jenis_file" class="button" value="skhun" 

							<?php if($berkas->draft == "false") { echo "disabled";} ?>

							>Upload</button>
						</div>
				</div>
			</div>

		</form>
			<div>

					<p>*Jika tekan Simpan, maka data telah fix dan tidak dapat diedit kembali</p>
				</div>

					<div>
					<form action="<?= site_url('admin/berkas/simpan_draft/') ?>" method="POST">
							<button type="submit" name="draft" class="button button-primary" value="false" 

							<?php if($berkas->draft == "false") { echo "disabled";} ?>

							>Simpan</button>
					</form>
					</div>

					<div class="invalid-feedback">
						<?= form_error('draft') ?>
					</div>
				</div>


			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
	</main>


	<?php if ($this->session->flashdata('message')) : ?>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script>
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'success',
				title: '<?= $this->session->flashdata('message') ?>'
			})
		</script>
	<?php endif ?>
</body>

</html>