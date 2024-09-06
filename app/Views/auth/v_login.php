<!DOCTYPE html>
<html lang="en">

<head>

  <title>Ablepro v8.0 bootstrap admin template by Phoenixcoded</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="" />
  <meta name="keywords" content="">
  <meta name="author" content="Phoenixcoded" />
  <link rel="icon" href="<?= base_url() ?>assets/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
</head>

<body>
  <div class="auth-wrapper">
    <div class="auth-content">
      <div class="card">
        <div class="row align-items-center text-center">
          <div class="col-md-12">
            <div class="card-body">
              <img src="<?= base_url() ?>assets/images/logo-disbudpar.png" alt="" class="img-fluid mb-4">
              <h4 class="mb-3 f-w-400">Login</h4>
              <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                  <?= session()->getFlashdata('error') ?>
                </div>
              <?php endif; ?>
              <form method="post" action="<?= base_url('Auth/login') ?>">
                <div class="form-group mb-3">
                  <label class="floating-label" for="username">Username</label>
                  <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="form-group mb-4">
                  <label class="floating-label" for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <button type="submit" class="btn btn-block btn-primary mb-4">Login</button>
              </form>
              <p class="mb-2 text-muted">Lupa Password? <a href="auth-reset-password.html" class="f-w-400">Reset Password</a></p>
              <p class="mb-0 text-muted">Belum Punya Akun? <a href="auth-signup.html" class="f-w-400">Register Akun</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url() ?>assets/js/vendor-all.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/js/ripple.js"></script>
  <script src="<?= base_url() ?>assets/js/pcoded.min.js"></script>
</body>

</html>