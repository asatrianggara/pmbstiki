<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_partials/side_nav.php') ?>

		<div class="content">
			<?php $this->load->view('admin/_partials/card_datadiri.php') ?>
			<h1>Lengkapi Data Diri</h1>

			<form action="" method="POST">
				<div>

			<div class="card">
				<div class="card-header">
					<b>Data Calon Mahasiswa</b>
					<div style="display: flex; gap: 1em">
						<a href="<?= site_url('admin/datadiri/remove_avatar') ?>" class="txt-red">Remove Avatar</a>
						<a href="<?= site_url('admin/datadiri/upload_avatar') ?>">Change Avatar</a>
					</div>
				</div>

				<div class="card-body">
					<?php
					$avatar = $current_user->avatar ?
						base_url('upload/avatar/' . $current_user->avatar)
						: get_gravatar($current_user->email)
					?>
					<img src="<?= $avatar ?>" alt="<?= htmlentities($current_user->name, TRUE) ?>" height="80" width="80">

					<form action="" method="POST">
						<div>
						<label for="name">Nama*</label>
							<input
						  type="text"
						  name="name"
						  class="<?= form_error('name') ? 'invalid' : '' ?>"
						  value="<?= form_error('name') ? set_value('name') : $current_user->name ?>"
						  required
						  maxlength="128"

						  <?php if($datadiri->draft == "false") { echo "disabled";} ?>
						/>
							<div class="invalid-feedback">
								<?= form_error('name') ?>
							</div>
						</div>

						<div>
						<label for="name">Email*</label>
							<input
						  type="text"
						  name="email"
						  class="<?= form_error('email') ? 'invalid' : '' ?>"
						  value="<?= form_error('email') ? set_value('email') : $current_user->email ?>"
						  required
						  maxlength="128"

						  <?php if($datadiri->draft == "false") { echo "disabled";} ?>
						/>
							<div class="invalid-feedback">
								<?= form_error('email') ?>
							</div>
						</div>
						

				<div style="margin-top: 10px;">
					<button type="submit" name="draft" class="button" value="true" <?php if($datadiri->draft == "false") { echo "disabled";} ?> >Save to Draft</button>
			</div>


					</form>
				</div>
			</div>

			<div class="card">

				<div class="card-header">
					<b>Data Lengkap</b>
					<div style="display: flex; gap: 1em">
					</div>
				</div>
			
				<div class="card-body">
				<div>
					<label for="alamat">Alamat*</label>
					<input
				  type="textarea"
				  name="alamat"
				  class="<?= form_error('alamat') ? 'invalid' : '' ?>"
				  value="<?= form_error('alamat') ? set_value('alamat') : $datadiri->alamat ?>"

				  maxlength="128"

				  <?php if($datadiri->draft == "false") { echo "disabled";} ?>
				/>
					<div class="invalid-feedback">
						<?= form_error('alamat') ?>
					</div>
				</div>
				

				<div>
					<label for="tanggal_lahir">Tanggal Lahir*</label>
					<input
				  type="date"
				  name="tanggal_lahir"
				  class="<?= form_error('tanggal_lahir') ? 'invalid' : '' ?>"
				  value="<?php echo isset($datadiri->tanggal_lahir) ? set_value('tanggal_lahir', date('Y-m-d', strtotime($datadiri->tanggal_lahir))) : set_value('tanggal_lahir'); ?>"

				  maxlength="128"

				  <?php if($datadiri->draft == "false") { echo "disabled";} ?>
				/>
					<div class="invalid-feedback">
						<?= form_error('tanggal_lahir') ?>
					</div>
				</div>



				<div>
					<label for="tempat_lahir">Tempat Lahir*</label>
					<input
				  type="text"
				  name="tempat_lahir"
				  class="<?= form_error('tempat_lahir') ? 'invalid' : '' ?>"
				  value="<?= form_error('tempat_lahir') ? set_value('tempat_lahir') : $datadiri->tempat_lahir ?>"

				  maxlength="128"
				  <?php if($datadiri->draft == "false") { echo "disabled";} ?>
				/>
					<div class="invalid-feedback">
						<?= form_error('tempat_lahir') ?>
					</div>
				</div>

				<div>
					<label for="asal_sekolah">Asal Sekolah*</label>
					<input
				  type="text"
				  name="asal_sekolah"
				  class="<?= form_error('asal_sekolah') ? 'invalid' : '' ?>"
				  value="<?= form_error('asal_sekolah') ? set_value('asal_sekolah') : $datadiri->asal_sekolah ?>"

				  maxlength="128"

				  <?php if($datadiri->draft == "false") { echo "disabled";} ?>
				/>
					<div class="invalid-feedback">
						<?= form_error('asal_sekolah') ?>
					</div>
				</div>

				<div>
					<label for="asal_sekolah">No. Telp*</label>
					<input
				  type="text"
				  name="no_telp"
				  class="<?= form_error('no_telp') ? 'invalid' : '' ?>"
				  value="<?= form_error('no_telp') ? set_value('no_telp') : $datadiri->no_telp ?>"

				  maxlength="128"

				  <?php if($datadiri->draft == "false") { echo "disabled";} ?>
				/>
					<div class="invalid-feedback">
						<?= form_error('no_telp') ?>
					</div>
				</div>

				<div style="margin-top: 10px;">
					<button type="submit" name="draft" class="button" value="true" <?php if($datadiri->draft == "false") { echo "disabled";} ?> >Save to Draft</button>
			</div>
			</div>
				<div>
					<p>*Jika tekan Simpan, maka data telah fix dan tidak dapat diedit kembali</p>
				</div>
					<button type="submit" name="draft" class="button button-primary" value="false">Publish Update</button>
					<div class="invalid-feedback">
						<?= form_error('draft') ?>
					</div>
				</div>
			</form>
		</div>
			<?php $this->load->view('admin/_partials/footer.php') ?>
			
		</div>
	</main>
</body>

</html>