<?= $this->extend('layout/base') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-sm-12">
    <div class="page-title-box">
      <h4 class="page-title">Dashboard</h4>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 col-xl-3">
    <div class="card bg-success">
      <div class="card-body text-white">
        <div class="row align-items-center">
          <div class="col-8">
            <h5 class="fw-normal mt-0 text-truncate">Balance</h5>
            <h3>Rp<?= buatRupiah($saldo['isi_saldo']) ?></h3>
          </div>
          <div class="col-4 text-end">
            <i class="ri-money-dollar-circle-fill fs-1"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-xl-3">
    <div class="card bg-danger">
      <div class="card-body text-white">
        <div class="row align-items-center">
          <div class="col-8">
            <h5 class="fw-normal mt-0 text-truncate">Pengeluaran Bulan Ini</h5>
            <h3>Rp<?= buatRupiah($pengeluaran['tarik_pengeluaran']) ?></h3>
          </div>
          <div class="col-4 text-end">
            <i class="mdi mdi-cash-minus mdi-36px"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-xl-3">
    <div class="card bg-info">
      <div class="card-body text-white">
        <div class="row align-items-center">
          <div class="col-8">
            <h5 class="fw-normal mt-0 text-truncate">Pemasukan Vera</h5>
            <h3>Rp<?= buatRupiah($pemasukan_vera['deposit_pemasukan']) ?></h3>
          </div>
          <div class="col-4 text-end">
            <i class="mdi mdi-credit-card-plus mdi-36px"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-xl-3">
    <div class="card bg-primary">
      <div class="card-body text-white">
        <div class="row align-items-center">
          <div class="col-8">
            <h5 class="fw-normal mt-0 text-truncate">Pemasukkan Ikhsan</h5>
            <h3>Rp<?= buatRupiah($pemasukan_ikhsan['deposit_pemasukan']) ?></h3>
          </div>
          <div class="col-4 text-end">
            <i class="mdi mdi-credit-card-plus mdi-36px"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xl-6 col-sm-12">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title mb-4">Pemasukan Tahun Ini</h4>
        <div id="stat-pemasukan" class="apex-charts"></div>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-sm-12">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title mb-4">Pemasukan Kita</h4>
        <div id="stat-kita" class="apex-charts"></div>
      </div>
    </div>
  </div>
</div>

<div class="row">

</div>
<?= $this->endSection() ?>

<?= $this->section('js_section') ?>
<script src="<?= base_url() ?>/assets/js/vendor/chartjs.min.js"></script>
<script>
  var pemasukan = [
    <?= intval($pemasukan1['deposit_pemasukan']) ?>,
    <?= intval($pemasukan2['deposit_pemasukan']) ?>,
    <?= intval($pemasukan3['deposit_pemasukan']) ?>,
    <?= intval($pemasukan4['deposit_pemasukan']) ?>,
    <?= intval($pemasukan5['deposit_pemasukan']) ?>,
    <?= intval($pemasukan6['deposit_pemasukan']) ?>,
    <?= intval($pemasukan7['deposit_pemasukan']) ?>,
    <?= intval($pemasukan8['deposit_pemasukan']) ?>,
    <?= intval($pemasukan9['deposit_pemasukan']) ?>,
    <?= intval($pemasukan10['deposit_pemasukan']) ?>,
    <?= intval($pemasukan11['deposit_pemasukan']) ?>,
    <?= intval($pemasukan12['deposit_pemasukan']) ?>,
  ];

  var pemasukanIcan = [
    <?= intval($pemasukan_ican1['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_ican2['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_ican3['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_ican4['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_ican5['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_ican6['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_ican7['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_ican8['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_ican9['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_ican10['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_ican11['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_ican12['deposit_pemasukan']) ?>,
  ];

  var pemasukanVera = [
    <?= intval($pemasukan_vera1['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_vera2['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_vera3['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_vera4['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_vera5['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_vera6['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_vera7['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_vera8['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_vera9['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_vera10['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_vera11['deposit_pemasukan']) ?>,
    <?= intval($pemasukan_vera12['deposit_pemasukan']) ?>,
  ];

  var statPemasukan = {
    series: [{
      name: 'Pemasukan',
      data: [
        pemasukan[0],
        pemasukan[1],
        pemasukan[2],
        pemasukan[3],
        pemasukan[4],
        pemasukan[5],
        pemasukan[6],
        pemasukan[7],
        pemasukan[8],
        pemasukan[9],
        pemasukan[10],
        pemasukan[11],
      ]
    }],
    chart: {
      height: 350,
      type: 'area'
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth'
    },
    yaxis: {
      title: {
        text: 'Rupiah'
      }
    },
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des']
    },
    tooltip: {
      x: {
        format: 'dd/MM/yy HH:mm'
      },
    },
  };

  new ApexCharts(document.querySelector("#stat-pemasukan"), statPemasukan).render();

  var statKita = {
    series: [{
      name: 'Ikhsan',
      data: [
        pemasukanIcan[0],
        pemasukanIcan[1],
        pemasukanIcan[2],
        pemasukanIcan[3],
        pemasukanIcan[4],
        pemasukanIcan[5],
        pemasukanIcan[6],
        pemasukanIcan[7],
        pemasukanIcan[8],
        pemasukanIcan[9],
        pemasukanIcan[10],
        pemasukanIcan[11],
      ]
    }, {
      name: 'Vera',
      data: [
        pemasukanVera[0],
        pemasukanVera[1],
        pemasukanVera[2],
        pemasukanVera[3],
        pemasukanVera[4],
        pemasukanVera[5],
        pemasukanVera[6],
        pemasukanVera[7],
        pemasukanVera[8],
        pemasukanVera[9],
        pemasukanVera[10],
        pemasukanVera[11],
      ]
    }],
    chart: {
      type: 'bar',
      height: 350
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '80%',
        endingShape: 'rounded'
      },
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      show: true,
      width: 2,
      colors: ['transparent']
    },
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
    },
    yaxis: {
      title: {
        text: 'Rupiah'
      }
    },
    fill: {
      opacity: 1
    },
    tooltip: {
      y: {
        formatter: function(val) {
          return "Rp" + val
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#stat-kita"), statKita);
  chart.render();
</script>
<?= $this->endSection() ?>