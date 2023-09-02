<?= $this->extend('/layout/base') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-sm-12">
    <div class="page-title-box">
      <h4 class="page-title">Transaksi Celengan</h4>
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
        <h5 class="fw-normal mt-0" title="Saldo Balance">Saldo Balance</h5>
        <h3 class="mt-3 mb-3 text-white">Rp<?= buatRupiah($saldo['isi_saldo']) ?></h3>
        <p class="mb-0">
          <span class="badge bg-info me-1">
            <i class=""></i> 100%</span>
          <span class="text-nowrap">Terpercaya &#128077;</span>
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
        <h5 class="fw-normal mt-0" title="Saldo Celengan">Saldo Celengan</h5>
        <h3 class="mt-3 mb-3 text-white">Rp<?= buatRupiah($pemasukan['nominal_transaksi']) ?></h3>
        <p class="mb-0">
          <span class="badge bg-info me-1">
            <i class="mdi mdi-arrow-up-bold"></i> <?= $peningkatan ?>%</span>
          <span class="text-nowrap">Dari bulan lalu</span>
        </p>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6 mb-3">
    <button type="button" class="btn btn-danger rounded-pill w-100" data-bs-toggle="modal" data-bs-target="#penarikan-modal"><i class="uil-minus mx-1"></i>TARIK CELENGAN</button>
  </div>
  <div class="col-sm-6 mb-3">
    <button type="button" class="btn btn-success rounded-pill w-100" data-bs-toggle="modal" data-bs-target="#deposit-modal"><i class="uil-plus-circle mx-1"></i>DEPOSIT CELENGAN</button>
  </div>

  <!-- Modal Deposit -->
  <div id="deposit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="standard-modalLabel">Deposit</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <form action="/celengan/deposit" method="POST">
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                <label>Nominal Deposit</label>
                <div class="input-group mt-1">
                  <label class="input-group-text">Rp</label>
                  <input type="text" id="nominal" class="form-control" required placeholder="Masukkan nominal.." name="nominal_transaksi">
                </div>
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

  <!-- Modal Penarikan -->
  <div id="penarikan-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="standard-modalLabel">Penarikan</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <form action="/celengan/penarikan" method="POST">
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12 mb-2">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan" rows="3" placeholder="Masukkan keterangan.."></textarea>
              </div>
              <div class="col-sm-12">
                <label>Nominal Pengeluaran</label>
                <div class="input-group mt-1">
                  <label class="input-group-text">Rp</label>
                  <input type="text" id="nominal_pengeluaran" class="form-control" required placeholder="Masukkan nominal.." name="nominal_transaksi">
                </div>
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
        <h4 class="header-title mb-3">PEMASUKAN CELENGAN</h4>

        <div data-simplebar style="max-height: 320px; overflow-x: hidden;">
          <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
              <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
              <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;">
                  <div class="simplebar-content" style="padding: 0px;">
                    <?php foreach ($deposit as $row) : ?>
                      <?php if ($row['status'] == 'deposit') : ?>
                        <div class="row py-1 align-items-center">
                          <div class="col-auto">
                            <i class="mdi mdi-cash-plus text-success mdi-24px"></i>
                          </div>
                          <div class="col ps-0">
                            <a class="text-body">Celengan ditambahkan</a>
                            <?php
                            if ($row['tgl_transaksi'] == date('Y-m-d')) {
                              $tanggal = "Hari Ini";
                            } else {
                              $tanggal = date('d M Y', strtotime($row['tgl_transaksi']));
                            }
                            ?>
                            <p class="mb-0 text-muted"><small><?= $tanggal ?>, <?= date('H:i', strtotime($row['jam_transaksi'])) ?> WIB</small></p>
                          </div>
                          <div class="col-auto">
                            <span class="text-success fw-bold pe-2">+ Rp<?= buatRupiah($row['nominal_transaksi']) ?></span>
                          </div>
                        </div>
                      <?php else : ?>
                        <?php
                        $nominal = str_replace('-', '', $row['nominal_transaksi']);
                        ?>
                        <div class="row py-1 align-items-center">
                          <div class="col-auto">
                            <i class="mdi mdi-cash-minus text-danger mdi-24px"></i>
                          </div>
                          <div class="col ps-0">
                            <a class="text-body"><?= (empty($row['keterangan']) || $row['keterangan'] == '' ? 'Celengan ditarik' :  $row['keterangan']) ?></a>
                            <?php
                            if ($row['tgl_transaksi'] == date('Y-m-d')) {
                              $tanggal = "Hari Ini";
                            } else {
                              $tanggal = date('d M Y', strtotime($row['tgl_transaksi']));
                            }
                            ?>
                            <p class="mb-0 text-muted"><small><i class="mdi mdi-calendar"></i> <?= $tanggal ?>, <?= date('H:i', strtotime($row['jam_transaksi'])) ?> WIB</small></p>
                          </div>
                          <div class="col-auto">
                            <span class="text-danger fw-bold pe-2">- Rp<?= buatRupiah($nominal) ?></span>
                          </div>
                        </div>
                      <?php endif ?>
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
  console.log('Hello');
  $(document).ready(function() {
    $('#nominal, #nominal_pengeluaran').mask('000.000.000', {
      reverse: true
    });

    <?php if (session()->getFlashdata('pesan')) : ?>
      Swal.fire(
        'Sukses',
        '<?= session()->getFlashdata('pesan') ?>',
        'success'
      )
    <?php endif ?>

    <?php if (session()->getFlashdata('error')) : ?>
      Swal.fire(
        'Error',
        '<?= session()->getFlashdata('error') ?>',
        'error'
      )
    <?php endif ?>
  })
</script>
<?= $this->endSection() ?>