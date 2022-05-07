<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SPK Laptop | Admin Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/4251ba31dd.js" crossorigin="anonymous"></script>  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/jqvmap/jqvmap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/daterangepicker/daterangepicker.css') ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/summernote/summernote-bs4.min.css') ?>">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin')?>" class="brand-link">
      <img src="<?= base_url('assets/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SPK Laptop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <?php $request = $request = \Config\Services::request();
              $uri = $request->uri->getSegment(2);
              ?>
            <a href="<?= base_url('admin')?>" class="nav-link <?= ($uri == '') ? 'active' : '' ?>">
              <i class="nav-icon fa-solid fa-house"></i>
              <p>Home</p>
            </a>
        </li>
        <li class="nav-item">
          <?php $l='laptop';
          $uri_l = $request->uri->getSegment(2);
          ?>
            <a href="<?= base_url('admin/laptop')?>" class="nav-link <?= ($uri_l == $l) ? 'active' : '' ?>">
              <i class="nav-icon fa-solid fa-laptop"></i>
              <p>Laptop List</p>
            </a>
        </li>
        <li class="nav-item <?= ($uri_l == 'ram' || $uri_l == 'processor' || $uri_l == 'harga' || $uri_l == 'memori'|| $uri_l == 'gpu') ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= ($uri_l == 'ram' || $uri_l == 'processor' || $uri_l == 'harga' || $uri_l == 'memori'|| $uri_l == 'gpu') ? 'active' : '' ?> ">
            <i class="nav-icon fa-solid fa-list-check"></i>
              <p>
                Kriteria List
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/harga')?>" class="nav-link <?= ($uri_l == 'harga') ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Harga</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/processor')?>" class="nav-link <?= ($uri_l == 'processor') ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Processor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/memori')?>" class="nav-link <?= ($uri_l == 'memori') ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kapasitas Memori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/ram')?>" class="nav-link <?= ($uri_l == 'ram') ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>RAM</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/gpu')?>" class="nav-link <?= ($uri_l == 'gpu') ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>GPU</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <?php $u='user';
            $uri_l = $request->uri->getSegment(2);
            ?>
            <a href="<?= base_url('admin/user')?>" class="nav-link  <?= ($uri_l == $u) ? 'active' : '' ?>">
              <i class="nav-icon fa-solid fa-users"></i>
              <p>User List</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('logout')?>" onclick="return confirm('Are you sure want to Log Out  ?')"class="nav-link">
              <i class="nav-icon fa-solid fa-door-open"></i>
              <p>Log Out</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title ?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  <!-- /.content-wrapper -->

  <section class="content">
    <?= $this->renderSection('content') ?>   
  </section>
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 SPK LAPTOP.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.0.1
    </div>
  </footer>

  

<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/plugins/sparklines/sparkline.js') ?>"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.js') ?>"></script>
s
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/dist/js/pages/dashboard.js') ?>"></script>
<script>
  $(document).ready( function () {
    $('#table_id').DataTable();
} );

function previewImg(){
  const image = document.getElementById('image')
  const imageLabel = document.querySelector('.custom-file-label')
  const imgPreview = document.querySelector('.img-preview')

  
  imageLabel.textContent = image.files[0].name
  const fileImage = new FileReader()
  fileImage.readAsDataURL(image.files[0])

  fileImage.onload = function(e){
    imgPreview.src = e.target.result
  }
}
</script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</body>
</html>
