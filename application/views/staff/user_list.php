<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('staff/_partials/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('staff/_partials/side_nav.php') ?>

		<div class="content">
			<h1>List Pendaftar</h1>


			<table class="table">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Asal Sekolah</th>
						<th style="width: 15%;" class="text-center">Status</th>
						<!-- <th style="width: 25%;" class="text-center">Action</th> -->
					</tr>
				</thead>
				<tbody>
					<?php foreach($user as $calon): ?>
					<tr>
						<td>
							<?php echo $calon->name ?>
						</td>
						<td>
							
							<div><?php echo $calon->asal_sekolah ?></div>
						</td>
						<?php if($calon->draft === 'true'): ?>
							<td class="text-center text-gray">Draft</td>
						<?php else: ?>
							<td class="text-center text-green">Submitted</td>
						<?php endif ?>
						<td>
							<!-- <div class="action">
								<a href="<?= site_url('article/'.$article->slug) ?>" class="button button-small" target="_blank" role="button">Preview</a>
								<a href="<?= site_url('admin/post/edit/'.$article->id) ?>" class="button button-small" role="button">Edit</a>
								<a href="#" 
									data-delete-url="<?= site_url('admin/post/delete/'.$article->id) ?>" 
									class="button button-small button-danger" 
									role="button"
									onclick="deleteConfirm(this)">Delete</a>
							</div> -->
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>

			<?php $this->load->view('staff/_partials/footer.php') ?>
		</div>
	</main>

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		function deleteConfirm(event){
			Swal.fire({
				title: 'Delete Confirmation!',
				text: 'Are you sure to delete the item?',
				icon: 'warning',
				showCancelButton: true,
				cancelButtonText: 'No',
				confirmButtonText: 'Yes Delete',
				confirmButtonColor: 'red'
			}).then(dialog => {
				if(dialog.isConfirmed){
					window.location.assign(event.dataset.deleteUrl);
				}
			});
		}
	</script>

	<?php if($this->session->flashdata('message')): ?>
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