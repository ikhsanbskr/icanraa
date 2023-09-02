<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Icanraa Management</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
  <meta content="Coderthemes" name="author">

  <!-- App css -->
  <link href="<?= base_url() ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>/assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="light-style">
  <link href="<?= base_url() ?>/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

  <style>
    /* * {
      transition: 0.5s;
    } */

    /* .leftside-menu {
      transition: 0.3s;
    }
    .navbar-custom {
      transition: 0.3s;
    } */
  </style>
  <?= $this->renderSection('head') ?>
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
  <!-- Begin page -->
  <div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <div class="leftside-menu">

      <!-- LOGO -->
      <a href="/" class="logo text-center logo-light">
        <span class="logo-lg">
          <img src="assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
          <img src="assets/images/logo_sm.png" alt="" height="16">
        </span>
      </a>

      <!-- LOGO -->
      <a href="/" class="logo text-center logo-dark">
        <span class="logo-lg">
          <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
          <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
      </a>

      <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">
          <li class="side-nav-title side-nav-item">Menu</li>

          <li class="side-nav-item">
            <a href="/" class="side-nav-link">
              <i class="uil-calender"></i>
              <span> Dashboard </span>
            </a>
          </li>

          <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
              <i class="uil-atm-card"></i>
              <span> Tabungan </span>
              <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarEcommerce">
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
            <a href="apps-chat.html" class="side-nav-link">
              <i class="uil-calendar-alt"></i>
              <span> Agenda </span>
            </a>
          </li>

          <li class="side-nav-item">
            <a href="apps-chat.html" class="side-nav-link">
              <i class="uil-comments-alt"></i>
              <span> Postingan </span>
            </a>
          </li>

          <li class="side-nav-item">
            <a href="apps-chat.html" class="side-nav-link">
              <i class="mdi mdi-logout"></i>
              <span> Logout </span>
            </a>
          </li>
        </ul>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
      </div>
      <!-- Sidebar -left -->
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
      <div class="content">
        <!-- Topbar Start -->
        <div class="navbar-custom" style="background-color: #313a46; position: absolute;">
          <ul class="list-unstyled topbar-menu float-end mb-0">

          </ul>
          <button class="button-menu-mobile open-left">
            <i class="mdi mdi-menu text-white"></i>
          </button>
          <div class="d-flex justify-content-between">
            <div class="mt-3 text-white">
              Saldo Kita : <u>Rp<?= buatRupiah($saldo['isi_saldo']) ?></u>
            </div>
            <div class="mt-2 me-3">
              <img src="<?= base_url() ?>/assets/images/users/avatar.png" class="rounded-circle" width="38">
              <a class="text-white dropdown-toggle fs-4" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Hai <?= user()->nama ?>!</h6>
                </div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <i class="mdi mdi-account-circle me-1"></i>
                  <span>Profil</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <i class="mdi mdi-logout me-1"></i>
                  <span>Logout</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- end Topbar -->

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
              </script> © Icanraa - Built in Love By Us
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
  <!-- /End-bar -->


  <!-- js bundle -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/js/vendor/Chart.bundle.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/vendor.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/app.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/pages/demo.widgets.js"></script>

  <?= $this->renderSection('js_section'); ?>

</body>

</html>