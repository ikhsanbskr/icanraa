<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Dashboard Tabungan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Theme Config Js -->
  <script src="<?= base_url() ?>/assets/js/hyper-config.js"></script>
  <!-- App css -->
  <link href="<?= base_url() ?>/assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />
  <!-- Icons css -->
  <link href="<?= base_url() ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- Fullcalendar css -->
  <link href="<?= base_url() ?>assets/vendor/fullcalendar/main.min.css" rel="stylesheet" type="text/css" />
  <style>
    body {
      transition: background 0.3s;
    }
  </style>
</head>

<body>
  <!-- Begin page -->
  <div class="wrapper">
    <!-- ========== Topbar Start ========== -->
    <div class="navbar-custom" style="background-color: #313a46;">
      <div class="topbar container-fluid">
        <div class="d-flex align-items-center gap-lg-2 gap-1">
          <!-- Sidebar Menu Toggle Button -->
          <button class="button-toggle-menu text-white">
            <i class="mdi mdi-menu"></i>
          </button>

          <!-- Horizontal Menu Toggle Button -->
          <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
            <div class="lines">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </button>
        </div>

        <ul class="topbar-menu d-flex align-items-center gap-3">
          <li class="d-sm-inline-block">
            <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left" title="Mode Tema">
              <i class="ri-moon-line font-22"></i>
            </div>
          </li>


          <!-- <li class="d-none d-md-inline-block">
            <a class="nav-link" href="" data-toggle="fullscreen">
              <i class="ri-fullscreen-line font-22"></i>
            </a>
          </li> -->

          <li class="dropdown">
            <a class="nav-link dropdown-toggle arrow-none px-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <img src="<?= base_url() ?>/assets/images/users/avatar.png" class="rounded-circle" width="38">
              <span class="text-white dropdown-toggle fs-4 ms-2"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
              <!-- item-->
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Hai <?= user()->nama ?> !</h6>
                <h6>Saldo Kita: <u>Rp<?= buatRupiah($saldo['isi_saldo']) ?></u></h6>
              </div>

              <!-- item-->
              <a href="/profil" class="dropdown-item">
                <i class="mdi mdi-account-circle me-1"></i>
                <span>Profil</span>
              </a>

              <!-- item-->
              <span style="cursor: pointer;" id="logout1" class="dropdown-item">
                <i class="mdi mdi-logout me-1"></i>
                <span>Logout</span>
              </span>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <!-- ========== Topbar End ========== -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="leftside-menu">

      <!-- Brand Logo Light -->
      <!-- <a href="/" class="logo logo-light">
        <span class="logo-lg">
          <img src="<?= base_url() ?>/assets/images/logo.png" alt="logo">
        </span>
        <span class="logo-sm">
          <img src="<?= base_url() ?>/assets/images/logo-sm.png" alt="small logo">
        </span>
      </a> -->

      <!-- Brand Logo Dark -->
      <!-- <a href="/" class="logo logo-dark">
        <span class="logo-lg">
          <img src="<?= base_url() ?>/assets/images/logo-dark.png" alt="dark logo">
        </span>
        <span class="logo-sm">
          <img src="<?= base_url() ?>/assets/images/logo-dark-sm.png" alt="small logo">
        </span>
      </a> -->

      <!-- Sidebar Hover Menu Toggle Button -->
      <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
      </div>

      <!-- Full Sidebar Menu Close Button -->
      <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
      </div>

      <!-- Sidebar -left -->
      <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav mt-4">
          <li class="side-nav-title">Menu</li>

          <li class="side-nav-item">
            <a href="/" class="side-nav-link">
              <i class="uil-calender"></i>
              <span> Dashboard </span>
            </a>
          </li>

          <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarTabungan" aria-expanded="false" aria-controls="sidebarTabungan" class="side-nav-link">
              <i class="uil-moneybag"></i>
              <span> Tabungan </span>
              <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarTabungan">
              <ul class="side-nav-second-level">
                <li>
                  <a href="/deposit">Deposit</a>
                </li>
                <li>
                  <a href="/pengeluaran">Pengeluaran</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="side-nav-item">
            <a href="/celengan" class="side-nav-link">
              <i class="mdi mdi-piggy-bank"></i>
              <span> Celengan </span>
            </a>
          </li>

          <li class="side-nav-item">
            <a href="/agenda" class="side-nav-link">
              <i class="uil-calendar-alt"></i>
              <span> Agenda </span>
            </a>
          </li>

          <li class="side-nav-item">
            <a href="/posts" class="side-nav-link">
              <i class="uil-comments-alt"></i>
              <span> Postingan </span>
            </a>
          </li>

          <li class="side-nav-item">
            <span id="logout" class="side-nav-link" style="cursor: pointer;">
              <i class="mdi mdi-logout"></i>
              <span> Logout </span>
            </span>
          </li>
        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
      </div>
    </div>
    <!-- ========== Left Sidebar End ========== -->


    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
      <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

          <!-- start page title -->
          <?= $this->renderSection('content') ?>
          <!-- end page title -->

        </div> <!-- container -->

      </div> <!-- content -->

      <!-- Footer Start -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <script>
                document.write(new Date().getFullYear())
              </script> © Icanraa - Built With <i class="mdi mdi-cards-heart"></i> By Us.
            </div>
          </div>
        </div>
      </footer>
      <!-- end Footer -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
  </div>
  <!-- END wrapper -->

  <!-- Resource JS -->
  <script src="<?= base_url() ?>/assets/js/vendor.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/app.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/jquery.mask.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="<?= base_url() ?>/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <?= $this->renderSection('js_section') ?>

  <script>
    <?php if (session()->getFlashdata('login')) : ?>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
      })

      Toast.fire({
        icon: 'success',
        title: '<?= session('login') ?>!',
        didOpen: (toast) => {
          toast.addEventListener('click', Swal.close);
        }
      })
    <?php endif ?>

    $('#logout, #logout1').click(function() {
      Swal.fire({
        icon: 'warning',
        title: 'Apakah Anda yakin ingin logout?',
        showCancelButton: true,
        confirmButtonText: 'Konfirmasi',
        cancelButtonText: `Batal`,
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '/logout';
        }
      })
    });
  </script>
  <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" defer></script>
  <script>
    window.OneSignal = window.OneSignal || [];
    OneSignal.push(function() {
      OneSignal.init({
        appId: "822ce939-c793-4412-9b06-69530f71fe99",
        safari_web_id: "web.onesignal.auto.1de7b938-6047-48aa-bcdd-0245aac21a82",
        notifyButton: {
          enable: true,
        },
        allowLocalhostAsSecureOrigin: true,
      });
    });
  </script>
</body>

</html>