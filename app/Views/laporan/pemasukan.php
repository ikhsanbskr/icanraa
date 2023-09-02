<?= $this->extend('layout/base') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-sm-12">
    <div class="page-title-box">
      <h4 class="page-title">Tahap Pengembangan</h4>
    </div>
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-lg-4">
    <div class="text-center">
      <img src="assets/images/svg/file-searching.svg" height="90" alt="File not found Image">

      <h1 class="text-error mt-4">406</h1>
      <h4 class="text-uppercase text-danger mt-3">Dalam Tahap Pengembangan</h4>
      <p class="text-muted mt-3">Sebentar yaa fitur barunya lagi dibuat.</p>

      <a class="btn btn-info mt-3" href="/"><i class="mdi mdi-reply"></i> Dashboard</a>
    </div> <!-- end /.text-center-->
  </div> <!-- end col-->
</div>
<?= $this->endSection() ?>