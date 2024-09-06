<?php
$uri = service('uri');
$menu_model = new \App\Models\M_Users_Menu();
$sub_menu_model = new \App\Models\M_Users_Menu_Sub();

$id_role = session()->get('role');
$segment_1 = $uri->getSegment(1);
$segment_2 = $uri->getSegment(2);
if ($segment_2 == NULL) {
  $title = $menu_model->getMenuByURL($segment_1)['nama_menu'];
} else {
  $title = $sub_menu_model->getSubMenuByURL($segment_1 . '/' . $segment_2)['nama_menu'];
}

$menu = $menu_model->getMenuByRole($id_role);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?= $title ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="" />
  <meta name="keywords" content="">
  <meta name="author" content="Phoenixcoded" />
  <link rel="icon" href="<?= base_url() ?>assets/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
  <style>
    .alert {
      margin-top: 10px;
    }

    .dt-responsive {
      margin-top: 10px;
    }

    .table th {
      text-align: center;
    }
  </style>
</head>

<body class="">
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
      <div class="navbar-content scroll-div ">
        <div class="">
          <div class="main-menu-header">
            <img class="img-radius" src="<?= base_url() ?>assets/images/user/avatar-2.jpg" alt="User-Profile-Image">
            <div class="user-details">
              <div id="more-details">UX Designer</div>
            </div>
          </div>
        </div>
        <ul class="nav pcoded-inner-navbar ">
          <li class="nav-item pcoded-menu-caption">
            <label>Menu</label>
          </li>
          <?php
          foreach ($menu as $m):
            $sub_menu = $sub_menu_model->getSubMenuByIdMenu($m['id_menu']);
            if ($sub_menu) :
          ?>
              <li class="nav-item pcoded-hasmenu">
                <a href="#" class="nav-link ">
                  <span class="pcoded-micon"><i class="<?= $m['icon_menu'] ?>"></i></span>
                  <span class="pcoded-mtext"><?= $m['nama_menu'] ?></span>
                </a>
                <ul class="pcoded-submenu">
                  <?php
                  foreach ($sub_menu as $sm) :
                  ?>
                    <li><a href="<?= base_url($sm['url_menu']) ?>"><?= $sm['nama_menu'] ?></a></li>
                  <?php
                  endforeach;
                  ?>
                </ul>
              </li>
            <?php
            else:
            ?>
              <li class="nav-item">
                <a href="<?= base_url($m['url_menu']) ?>" class="nav-link ">
                  <span class="pcoded-micon"><i class="<?= $m['icon_menu'] ?>"></i></span>
                  <span class="pcoded-mtext"><?= $m['nama_menu'] ?></span>
                </a>
              </li>
            <?php
            endif;
            ?>
          <?php
          endforeach;
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
    <div class="m-header">
      <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
      <a href="#" class="b-brand">
        <img src="<?= base_url() ?>assets/images/logo-disbudpar.png" alt="" class="logo" style="max-width: 150px;">
      </a>
      <a href="#!" class="mob-toggler">
        <i class="feather icon-more-vertical"></i>
      </a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li>
          <div class="dropdown drp-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="feather icon-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-notification">
              <div class="pro-head">
                <img src="<?= base_url() ?>assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                <span>John Doe</span>
                <a href="auth-signin.html" class="dud-logout" title="Logout">
                  <i class="feather icon-log-out"></i>
                </a>
              </div>
              <ul class="pro-body">
                <li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </header>
  <div class="pcoded-main-container">
    <div class="pcoded-content">
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10"><?= $title ?></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?= $this->renderSection('content'); ?>
    </div>
  </div>
  <script src="<?= base_url() ?>assets/js/vendor-all.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/js/ripple.js"></script>
  <script src="<?= base_url() ?>assets/js/pcoded.min.js"></script>
  <script src="<?= base_url() ?>assets/js/app.js"></script>

  <script src="<?= base_url() ?>assets/js/plugins/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/sweetalert.min.js"></script>

</body>

</html>