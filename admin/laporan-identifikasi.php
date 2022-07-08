<?php session_start(); ?>
<?php if (isset($_SESSION['username'])) { ?>
  <?php include "../koneksi.php"; ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pekata - Halaman Admin</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="http://code.highcharts.com/highcharts.src.js" type="text/javascript"></script>
    <script type="text/javascript">
      var chart3;
      $(document).ready(function() {
        chart3 = new Highcharts.Chart({
          chart: {
            renderTo: 'identifikasi',
            type: 'column'
          },
          title: {
            text: 'Grafik Identifikasi Kebutuhan Pelanggan'
          },
          xAxis: {
            categories: ['Bulan']
          },
          yAxis: {
            title: {
              text: 'Jumlah Kebutuhan'
            }
          },
          series: [
            <?php
            $sql   = "SELECT distinct MONTH(tanggal) as bulan FROM identifikasi_kebutuhan_pelanggan ORDER BY 1 ASC";
            $query = mysql_query($sql)  or die(mysql_error());
            while (list($bulan) = mysql_fetch_array($query)) {
              $sql_jumlah   = "SELECT count(id_kebutuhan) as jumlah FROM identifikasi_kebutuhan_pelanggan WHERE MONTH(tanggal)='$bulan'";
              $query_jumlah = mysql_query($sql_jumlah) or die(mysql_error());
              switch ($bulan) {
                case "01";
                  $bulan = "Januari";
                  break;
                case "02";
                  $bulan = "Februari";
                  break;
                case "03";
                  $bulan = "Maret";
                  break;
                case "04";
                  $bulan = "April";
                  break;
                case "05";
                  $bulan = "Mei";
                  break;
                case "06";
                  $bulan = "Juni";
                  break;
                case "07";
                  $bulan = "Juli";
                  break;
                case "08";
                  $bulan = "Agustus";
                  break;
                case "09";
                  $bulan = "September";
                  break;
                case "10";
                  $bulan = "Oktober";
                  break;
                case "11";
                  $bulan = "November";
                  break;
                case "12";
                  $bulan = "Desember";
                  break;
              }
              while ($data = mysql_fetch_array($query_jumlah)) {
                $jumlah = $data['jumlah'];
              }
            ?> {
                name: '<?php echo $bulan; ?>',
                data: [<?php echo $jumlah; ?>]
              },
            <?php } ?>
          ]
        });
      });
    </script>
  </head>

  <body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="index.php">Pekata</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="index.php">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data Master">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMas" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-table"></i>
              <span class="nav-link-text">Data Master</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseMas">
              <li>
                <a href="user.php">Master User</a>
              </li>
              <li>
                <a href="pelanggan.php">Master Pelanggan</a>
              </li>
            </ul>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Transaksi">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTran" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-wrench"></i>
              <span class="nav-link-text">Transaksi</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseTran">
              <li>
                <a href="buku-tamu.php">Buku Tamu</a>
              </li>
              <li>
                <a href="keluhan-pelanggan.php">Keluhan Pelanggan</a>
              </li>
              <li>
                <a href="identifikasi-kebutuhan-pelanggan.php">Identifikasi Kebutuhan Pelanggan</a>
              </li>
            </ul>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Laporan">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseLap" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-list-alt"></i>
              <span class="nav-link-text">Laporan</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseLap">
              <li>
                <a href="laporan-tamu.php">Laporan Tamu Per Periode</a>
              </li>
              <li>
                <a href="laporan-keluhan.php">Laporan Keluhan Pelanggan Per Periode</a>
              </li>
              <li>
                <a href="laporan-identifikasi.php">Laporan Identifikasi Kebutuhan Pelanggan Per Periode</a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <!-- <li class="nav-item dropdown"> -->
          <!-- <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
          <!-- <i class="fa fa-fw fa-envelope"></i> -->
          <!-- <span class="d-lg-none">Messages -->
          <!-- <span class="badge badge-pill badge-primary">12 New</span> -->
          <!-- </span> -->
          <!-- <span class="indicator text-primary d-none d-lg-block"> -->
          <!-- <i class="fa fa-fw fa-circle"></i> -->
          <!-- </span> -->
          <!-- </a> -->
          <!-- <div class="dropdown-menu" aria-labelledby="messagesDropdown"> -->
          <!-- <h6 class="dropdown-header">New Messages:</h6> -->
          <!-- <div class="dropdown-divider"></div> -->
          <!-- <a class="dropdown-item" href="#"> -->
          <!-- <strong>David Miller</strong> -->
          <!-- <span class="small float-right text-muted">11:21 AM</span> -->
          <!-- <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div> -->
          <!-- </a> -->
          <!-- <div class="dropdown-divider"></div> -->
          <!-- <a class="dropdown-item" href="#"> -->
          <!-- <strong>Jane Smith</strong> -->
          <!-- <span class="small float-right text-muted">11:21 AM</span> -->
          <!-- <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div> -->
          <!-- </a> -->
          <!-- <div class="dropdown-divider"></div> -->
          <!-- <a class="dropdown-item" href="#"> -->
          <!-- <strong>John Doe</strong> -->
          <!-- <span class="small float-right text-muted">11:21 AM</span> -->
          <!-- <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div> -->
          <!-- </a> -->
          <!-- <div class="dropdown-divider"></div> -->
          <!-- <a class="dropdown-item small" href="#">View all messages</a> -->
          <!-- </div> -->
          <!-- </li> -->
          <!-- <li class="nav-item dropdown"> -->
          <!-- <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
          <!-- <i class="fa fa-fw fa-bell"></i> -->
          <!-- <span class="d-lg-none">Alerts -->
          <!-- <span class="badge badge-pill badge-warning">6 New</span> -->
          <!-- </span> -->
          <!-- <span class="indicator text-warning d-none d-lg-block"> -->
          <!-- <i class="fa fa-fw fa-circle"></i> -->
          <!-- </span> -->
          <!-- </a> -->
          <!-- <div class="dropdown-menu" aria-labelledby="alertsDropdown"> -->
          <!-- <h6 class="dropdown-header">New Alerts:</h6> -->
          <!-- <div class="dropdown-divider"></div> -->
          <!-- <a class="dropdown-item" href="#"> -->
          <!-- <span class="text-success"> -->
          <!-- <strong> -->
          <!-- <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong> -->
          <!-- </span> -->
          <!-- <span class="small float-right text-muted">11:21 AM</span> -->
          <!-- <div class="dropdown-message small">This is an automated server response message. All systems are online.</div> -->
          <!-- </a> -->
          <!-- <div class="dropdown-divider"></div> -->
          <!-- <a class="dropdown-item" href="#"> -->
          <!-- <span class="text-danger"> -->
          <!-- <strong> -->
          <!-- <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong> -->
          <!-- </span> -->
          <!-- <span class="small float-right text-muted">11:21 AM</span> -->
          <!-- <div class="dropdown-message small">This is an automated server response message. All systems are online.</div> -->
          <!-- </a> -->
          <!-- <div class="dropdown-divider"></div> -->
          <!-- <a class="dropdown-item" href="#"> -->
          <!-- <span class="text-success"> -->
          <!-- <strong> -->
          <!-- <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong> -->
          <!-- </span> -->
          <!-- <span class="small float-right text-muted">11:21 AM</span> -->
          <!-- <div class="dropdown-message small">This is an automated server response message. All systems are online.</div> -->
          <!-- </a> -->
          <!-- <div class="dropdown-divider"></div> -->
          <!-- <a class="dropdown-item small" href="#">View all alerts</a> -->
          <!-- </div> -->
          <!-- </li> -->
          <li class="nav-item">

          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-fw fa-sign-out"></i>Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <div class="row">
          <div class="col-lg-12" id="identifikasi">

          </div>
        </div>
      </div>
      <!-- /.container-fluid-->
      <!-- /.content-wrapper-->
      <footer class="sticky-footer">
        <div class="container">
          <div class="text-center">
            <small>Copyright © Your Website 2021 | Repost by <a href="" title="StokCoding.com" target="_blank">Bayu Tutor</a></small>
          </div>
        </div>
      </footer>
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Page level plugin JavaScript-->
      <script src="vendor/chart.js/Chart.min.js"></script>
      <script src="vendor/datatables/jquery.dataTables.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin.min.js"></script>
      <!-- Custom scripts for this page-->
      <script src="js/sb-admin-datatables.min.js"></script>
      <script src="js/sb-admin-charts.min.js"></script>
    </div>
  </body>

  </html>
<?php
} else {
  header("location:login.php");
}
?>