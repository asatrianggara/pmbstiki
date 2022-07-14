<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('staff/_partials/head.php') ?>
</head>

<body>
  <main class="main">
    <?php $this->load->view('staff/_partials/side_nav.php') ?>

    <div class="content">
      <?php $this->load->view('staff/_partials/card.php') ?>
      <h1>Overview</h1>


<div class="row" style="min-height:55vh;">

<!--       <div class="col-md-3">
        <div class="card text-center" style="width: 200px;">
          <img class="card-img-top center-cropped" src="<?php echo base_url('upload/profilcard.svg'); ?>" alt="Card image">
          <h2>
            
          </h2>
          <p><a href="<?= site_url('admin/post') ?>">Profil</a></p>
        </div>
      </div> -->

      <div class="col-md-3"><div class="card text-center" style="width:200px">
  <img class="card-img-top center-cropped" src="<?php echo base_url('upload/profilcard.svg'); ?>" alt="Card image">
  <div class="card-body">
    <h4 class="card-title"><?= $user_count ?></h4>
    <p class="card-text">Isi data diri</p>
    <a href="<?= site_url('admin/datadiri'.$current_user->id) ?>" class="btn btn-primary">Lengkapi profil</a>
  </div>
</div></div>

<div class="col-md-3"><div class="card text-center" style="width:200px">
  <img class="card-img-top center-cropped" src="<?php echo base_url('upload/dokumencard.svg'); ?>" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">Lengkapi Dokumen</h4>
    <p class="card-text">Unggah Berkas</p>
    <a href="<?= site_url('admin/berkas/') ?>" class="btn btn-primary">Unggah</a>
  </div>
</div></div>

<!--       <div class="col-md-3">
        <div class="card text-center" style="width: 200px;">
          <img class="card-img-top center-cropped" src="<?php echo base_url('upload/dokumencard.svg'); ?>" alt="Card image">
          <h2>
            
          </h2>
          <p><a href="<?= site_url('admin/feedback') ?>">Berkas</a></p>
        </div>
      </div>
       -->

</div>

      <?php $this->load->view('admin/_partials/footer.php') ?>
    </div>
  </main>
</body>

</html>