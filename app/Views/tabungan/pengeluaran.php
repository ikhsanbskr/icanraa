<?= $this->extend('/layout/base') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-sm-12">
    <div class="page-title-box">
      <h4 class="page-title">Pengeluaran</h4>
    </div>
    <?php if (validation_errors()) : ?>
      <div class="alert alert-danger" role="alert">
        <?= validation_list_errors() ?>
      </div>
    <?php endif ?>
  </div>
</div>

<div class="row">
  <div class="col-xxl-6 col-lg-6">
    <div class="card widget-flat bg-primary text-white">
      <div class="card-body">
        <div class="float-end">
          <i class="mdi mdi-currency-usd widget-icon bg-light-lighten rounded-circle text-white"></i>
        </div>
        <h5 class="fw-normal mt-0" title="Revenue">Saldo Balance</h5>
        <h3 class="mt-3 mb-3 text-white">Rp<?= buatRupiah($saldo['isi_saldo']) ?></h3>
        <p class="mb-0">
          <span class="badge bg-info me-1">
            <i class="mdi mdi-arrow-up-bold"></i> <?= ($peningkatan_saldo < 0) ? '0' : round($peningkatan_saldo, 2) ?>%</span>
          <span class="text-nowrap">Dari bulan lalu</span>
        </p>
      </div>
    </div>
  </div>
  <div class="col-xxl-6 col-lg-6">
    <div class="card widget-flat bg-primary text-white">
      <div class="card-body">
        <div class="float-end">
          <i class="mdi mdi-credit-card-plus widget-icon bg-light-lighten rounded-circle text-white"></i>
        </div>
        <h5 class="fw-normal mt-0" title="Revenue">Total Pengeluaran</h5>
        <h3 class="mt-3 mb-3 text-white">Rp<?= buatRupiah($jml_pengeluaran['tarik_pengeluaran']) ?></h3>
        <p class="mb-0">
          <span class="badge bg-danger me-1">
            <i class="mdi mdi-arrow-up-bold"></i> <?= ($peningkatan_pengeluaran < 0) ? '0' : round($peningkatan_pengeluaran, 2) ?>%</span>
          <span class="text-nowrap">Dari Bulan lalu</span>
        </p>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12 mb-3">
    <button type="button" class="btn btn-primary rounded-pill w-100" data-bs-toggle="modal" data-bs-target="#pengeluaran-modal"><i class="uil-minus mx-1"></i>TARIK PENGELUARAN</button>
  </div>

  <!-- Modal Deposit -->
  <div id="pengeluaran-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="standard-modalLabel">Tarik Pengeluaran</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <form action="/pengeluaran/tambah" method="POST">
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12 mb-2">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3" placeholder="Masukkan keterangan.." required></textarea>
              </div>
              <div class="col-sm-12 mb-2">
                <label>Nominal Pengeluaran</label>
                <div class="input-group mt-1">
                  <label class="input-group-text">Rp</label>
                  <input type="text" placeholder="Masukkan nominal.." id="nominal" class="form-control" name="nominal_pengeluaran" required>
                </div>
              </div>
              <div class="col-sm-12 mb-2">
                <label>Lokasi</label>
                <input type="text" class="form-control" name="lokasi" placeholder="Masukkan lokasi..">
                <span class="text-muted">
                  <small?>* Dapat Dikosongkan</small>
                </span>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Konfirmasi</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="dropdown float-end">
          <i class="mdi mdi-note-text-outline mdi-24px"></i>
        </div>
        <h4 class="header-title mb-3">TRANSAKSI PENGELUARAN</h4>

        <div data-simplebar style="max-height: 320px; overflow-x: hidden;">
          <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
              <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
              <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;">
                  <div class="simplebar-content" style="padding: 0px;">
                    <?php foreach ($pengeluaran as $row) : ?>
                      <div class="row py-1 align-items-center">
                        <div class="col-auto">
                          <i class="mdi mdi-cash-minus text-danger mdi-24px"></i>
                        </div>
                        <div class="col ps-0">
                          <a class="text-body"><?= $row['keterangan'] ?></a>
                          <p class="mb-0 text-muted"><small><i class="mdi mdi-map-marker"></i> <?= $row['lokasi'] ?></small></p>
                          <?php
                          if ($row['tgl_pengeluaran'] == date('Y-m-d')) {
                            $tanggal = "Hari Ini";
                          } else {
                            $tanggal = date('d M Y', strtotime($row['tgl_pengeluaran']));
                          }
                          ?>
                          <p class="mb-0 text-muted"><small><i class="mdi mdi-calendar"></i> <?= $tanggal ?>, <?= date('H:i', strtotime($row['jam_pengeluaran'])) ?> WIB</small></p>
                        </div>
                        <div class="col-auto">
                          <span class="text-danger fw-bold pe-2">- Rp<?= buatRupiah($row['tarik_pengeluaran']) ?></span>
                        </div>
                      </div>
                    <?php endforeach ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="simplebar-placeholder" style="width: 308px; height: 550px;"></div>
          </div>
          <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
          </div>
          <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar" style="height: 186px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
          </div>
        </div> <!-- end slimscroll -->
      </div>
      <!-- end card-body -->
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js_section') ?>
<script>
  $(document).ready(function() {
    $('#nominal').mask('000.000.000', {
      reverse: true
    });
  })

  <?php if (session()->getFlashdata('pesan')) : ?>
    Swal.fire(
      'Sukses',
      '<?= session()->getFlashdata('pesan') ?>',
      'success'
    )
  <?php endif ?>
</script>
<?= $this->endSection() ?>