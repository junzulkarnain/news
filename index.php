<?php 
include "koneksi.php";
session_start();
  if ($_SESSION['status'] != "login") {
    header("location:login.php");
  }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content=""> 

  <title>Web News</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-primary static-top" style="color:white">

    <a class="navbar-brand mr-1" href="index.php">Web News <img src="img/logo21.png" width="20px"></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="">
        <a class="nav-link" href="#">Hai <?php echo $_SESSION['username']; ?>
        </a>
      </li>
      <li class="">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-power-off fa-fw"></i> Logout
        </a>
      </li>
    </ul>
  </nav>

  <div id="wrapper">

  <?php
      $level  = $_SESSION['level'];
      switch ($level) {
        case '1':
          ?>
          <ul class="sidebar navbar-nav">
            <li class="nav-item <?php if (@$_GET['page'] == '' || @$_GET['page'] == 'dashboard') {
              echo "active";
            } ?>" >
              <a class="nav-link" href="?page=dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-fw fa-book"></i>
                <span>Master</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="?page=kategori"><i class="fa fa-sort"></i> Kategori</a>
                <a class="dropdown-item" href="?page=penulis"><i class="fa fa-sort"></i> Penulis</a>
              </div>
            </li>

            <li class="nav-item <?php if (@$_GET['page'] == 'artikel') {
              echo "active";
            } ?>">
              <a class="nav-link" href="?page=artikel">
                <i class="fas fa-fw fa-table"></i>
                <span>Artikel</span></a>
            </li>
            <li class="nav-item <?php if (@$_GET['page'] == 'user') {
              echo "active";
            } ?>">
              <a class="nav-link" href="?page=user">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span></a>
            </li>
            <li class="nav-item <?php if (@$_GET['page'] == 'user') {
              echo "active";
            } ?>">
              <a class="nav-link" href="?page=report">
                <i class="fas fa-fw fa-print"></i>
                <span>Report</span></a>
            </li>
            <li class="nav-item <?php if (@$_GET['page'] == 'grafik') {
              echo "active";
            } ?>">
              <a class="nav-link" href="?page=grafik">
                <i class="fas fa-fw fa-chart-pie"></i>
                <span>Grafik</span></a>
            </li>
          </ul> 
          <?php
          break;
          case '2':
            ?>
          <ul class="sidebar navbar-nav">
            <li class="nav-item <?php if (@$_GET['page'] == '' || @$_GET['page'] == 'dashboard') {
              echo "active";
            } ?>" >
              <a class="nav-link" href="?page=dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="nav-item <?php if (@$_GET['page'] == 'artikel') {
              echo "active";
            } ?>">
              <a class="nav-link" href="?page=artikel">
                <i class="fas fa-fw fa-table"></i>
                <span>Artikel</span></a>
            </li>
          </ul> 
            <?php
            break;
      }
      
  ?>
    <!-- Sidebar -->
    

    <!-- Content -->
    <div id="content-wrapper">

      <?php   
            //Menu dashboard
            if (@$_GET['page'] == '' || @$_GET['page'] == 'dashboard') {
              include "page/dashboard/dashboard.php";
            }
            //Menu Master Kategori
            elseif (@$_GET['page'] == 'kategori' AND @$_GET['aksi'] == ''  ) {
              include "page/master/kategori/tabel_kategori.php";
            }
            //Menu artikel
            elseif (@$_GET['page'] == 'artikel' AND @$_GET['aksi'] == ''  ) {
              include "page/artikel/tabel_artikel.php";
            }
            elseif (@$_GET['page'] == 'artikel' AND @$_GET['aksi'] == 'tambah_artikel'  ) {
              include "page/artikel/form_tambah_artikel.php";
            }
            elseif (@$_GET['page'] == 'artikel' AND @$_GET['aksi'] == 'tambah_artikel'  ) {
              include "page/artikel/form_tambah_artikel.php";
            }
            elseif (@$_GET['page'] == 'artikel' AND @$_GET['aksi'] == 'ubah_artikel'  ) {
              include "page/artikel/form_ubah_artikel.php";
            }
            elseif (@$_GET['page'] == 'artikel' AND @$_GET['aksi'] == 'hapus_artikel'  ) {
              include "page/artikel/hapus_artikel_aksi.php";
            }
            //Menu user
            elseif (@$_GET['page'] == 'user'  ) {
              if (@$_GET['aksi'] == '') {
                include "page/user/tabel_user.php";
              }
              if (@$_GET['aksi'] == 'tambah_user') {
                include "page/user/form_tambah_user.php";
              }
              if (@$_GET['aksi'] == 'ubah_user') {
                include "page/user/form_ubah_user.php";
              }
              if (@$_GET['aksi'] == 'hapus_user') {
                include "page/user/hapus_user.php";
              }
            }

            //Menu Report
            elseif (@$_GET['page'] == 'report' AND @$_GET['aksi'] == ''  ) {
              include "page/report/report.php";
            }
            //Menu Grafik
            elseif (@$_GET['page'] == 'grafik' AND @$_GET['aksi'] == ''  ) {
              include "page/grafik/grafik.php";
            }

            
       ?>

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © News Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="js/highcharts/highcharts.js"></script>
  <script src="js/highcharts/exporting.js"></script>
  <script src="js/highcharts/export-data.js"></script>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/data-table/jquery-3.3.1.js"></script>
  <script src="js/data-table/jquery.dataTables.min.js"></script>
  <!-- Data Table-->
  <script src="js/sb-admin.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable();
  } );
  </script> 
</body>

</html>
