<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('_partials/head.php'); ?>
</head>

<body>
	<?php $this->load->view('_partials/navbar.php'); ?>

	<div class="main">
		<div class="content">

			<div class="row slide">
				<div class="col-md-6">
					<div class="row-md-6">

						<div id='child' style=' height: auto;'>
							<div class="col-md-6">
					<img src="<?php echo base_url('upload/logo.png'); ?>" width="50" height="50"  alt="" class="logo">
							</div>
							<div class="col-md-6">
							<h1><b>IT Professional? Start's Here!</b></h1>
							</div>
						</div>
					</div>

					<div class="row-md-3">
						<div id='child2' style=' height: auto;'>
							<p>Organizing quality education, service and research as well as being able to work with other leading institutions to respond to challenges and local and global developments through the ICT approach</p>
						</div>
					</div>

					<div class="row-md-3">
						<div id='child2' style=' height: auto;'>
							<button  class="btn btn-primary">get more info..</button>
						</div>
					</div>


				</div>



				<div class="col-md-6 imgcardxs">
					<div class="row-md-4" style="margin-bottom: 20%;">

						
					</div>
					<div class="row-md-4">
					<img src="<?php echo base_url('upload/undraw_education_f8ru.svg'); ?>" 
                alt="Sample photo" class="img-fluid" />
                 </div>
					<div class="row-md-4" style="margin-top: 10%;">
						
					</div>
				</div>
			</div>
			




			
			<!-- <h1>Home Page</h1> -->
		</div>
	</div>

	<?php $this->load->view('_partials/footer.php'); ?>
</body>

</html>