<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Icanraa Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />

  <!-- Theme Config Js -->
  <script src="<?= base_url() ?>assets/js/hyper-config.js"></script>

  <!-- App css -->
  <link href="<?= base_url() ?>assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />

  <!-- Icons css -->
  <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg">
  <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xxl-4 col-lg-5">
          <div class="card">

            <!-- Logo -->

            <div class="card-body p-4">

              <div class="text-center w-75 m-auto">
                <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                <p class="text-muted mb-4">Masukkan username dan password yang valid untuk masuk.</p>
              </div>
              <?= view('Myth\Auth\Views\_message_block') ?>

              <form action="<?= url_to('login') ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                  <label for="emailaddress" class="form-label">Username</label>
                  <input class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" type="text" id="emailaddress" name="login" placeholder="Masukkan username..">
                  <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="Masukkan password..">
                    <div class="invalid-feedback">
                      <?= session('errors.password') ?>
                    </div>
                  </div>
                </div>

                <?php if ($config->allowRemembering) : ?>
                  <div class="mb-3 mb-3">
                    <div class="form-check">
                      <input type="checkbox" name="remember" class="form-check-input <?php if (old('remember')) : ?> checked <?php endif ?>" id="checkbox-signin">
                      <label class="form-check-label" for="checkbox-signin">Ingat saya</label>
                    </div>
                  </div>
                <?php endif ?>

                <div class="mb-3 mb-0 text-center">
                  <button class="btn btn-primary" type="submit"> Log In </button>
                </div>

              </form>
            </div> <!-- end card-body -->
          </div>
          <!-- end card -->
          <!-- end row -->

        </div> <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </div>
  <!-- end page -->

  <footer class="footer footer-alt">
    <script>
      document.write(new Date().getFullYear())
    </script> © Icanraa - Built With<i class="mdi mdi-cards-heart mx-1"></i>By Us.
  </footer>
  <!-- Vendor js -->
  <script src="assets/js/vendor.min.js"></script>

  <!-- App js -->
  <script src="assets/js/app.min.js"></script>

</body>

</html>