
<aside class="side-nav">
	<div class="brand">
		<img src="<?php echo base_url('upload/logo.png'); ?>" width="50" height="50"  alt="" class="logo">
		<div style="display: flex; gap: 0.8rem; margin:1rem 0;">
			<?php
			$avatar = $current_user->avatar ?
				base_url('upload/avatar/' . $current_user->avatar)
				: get_gravatar($current_user->email)
			?>
			<img src="<?= $avatar ?>" alt="<?= htmlentities($current_user->name, TRUE) ?>" height="32" width="32">
			<div>
				<b><?= htmlentities($current_user->name) ?></b>
				<small><?= htmlentities($current_user->email) ?></small>
			</div>
		</div>
	</div>
	<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse">
		<div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
		<a href="<?= site_url('admin/dashboard') ?>" class="<?php echo ($jenis_page == 'dashboard') ? 'active' : ''; ?>"><i class=" bi-speedometer bi-fw me-3"></i>Overview</a>
		
		<a href="<?= site_url('admin/datadiri/edit/'.$current_user->id) ?>" class="<?php echo ($jenis_page == 'datadiri') ? 'active' : ''; ?>"><i class="bi bi-person-badge bi-fw me-3"></i>Data Diri</a>

		<a href="<?= site_url('admin/berkas/upload_berkas/') ?>" class="<?php echo ($jenis_page == 'berkas') ? 'active' : ''; ?>"><i class="bi bi-files bi-fw me-3"></i>Unggah Berkas</a>

		<a href="#" class="<?php echo ($jenis_page == 'validasi') ? 'active' : ''; ?>"><i class="bi bi-clock-fill bi-fw me-3"></i>Menunggu Validasi</a>


		<!-- <a href="<?= site_url('admin/post') ?>" class="<?php echo ($jenis_page == 'post') ? 'active' : ''; ?>"><i class="bi bi-person-badge bi-fw me-3"></i>Post</a>

		<a href="<?= site_url('admin/feedback') ?>" class="<?php echo ($jenis_page == 'feedback') ? 'active' : ''; ?>"><i class="bi bi-files bi-fw me-3"></i>Feedback</a> -->

		<a href="<?= site_url('admin/setting') ?>" class="<?php echo ($jenis_page == 'setting') ? 'active' : ''; ?>"><i class="bi bi-gear-fill bi-fw me-3"></i>Setting</a>
		<a href="<?= site_url('auth/logout') ?>"><i class="bi bi-arrow-bar-left bi-fw me-3"></i>Logout</a>
	</div>
</div>
	</nav>
</aside>
