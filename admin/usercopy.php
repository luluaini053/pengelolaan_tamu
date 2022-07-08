<?php session_start(); ?>
<?php if (isset($_SESSION['username'])) { ?>
  <?php
  include "../koneksi.php";
  error_reporting(0);
  ?>
  <?php
  if (isset($_GET['username'])) {
    $a = "SELECT username, nama, password, hak_akses FROM user WHERE username = '$_GET[username]'";
    $b = mysql_query($a);
    list($usernameedit, $namaedit, $passwordedit, $hakedit) = mysql_fetch_row($b);
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
    <title>Pekata - Data Master User</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
  </head>

  <body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="index.html">Pekata</a>
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
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Data Master User</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i> Data Master User
          </div>
          <div class="col-md-4">
            <br>
            <h4><?php if (isset($_GET['username'])) {
                  echo "Edit Data User";
                } else {
                  echo "Tambah Data User";
                } ?></h4>
            <form action="user_proses.php" method="POST">
              <?php
              if (isset($_GET['username'])) {
                echo "<input type='hidden' name='aksi' value='Ubah'>";
              } else {
                echo "<input type='hidden' name='aksi' value='Tambah'>";
              }
              ?>
              <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" value="<?php if (isset($_GET['username'])) {
                                                                                                        echo $usernameedit;
                                                                                                      } ?>">
              </div>
              <div class="form-group">
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php if (isset($_GET['username'])) {
                                                                                                echo $namaedit;
                                                                                              } ?>">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group">
                <input type="text" name="hak_akses" class="form-control" placeholder="Hak Akses" value="<?php if (isset($_GET['username'])) {
                                                                                                          echo $hakedit;
                                                                                                        } ?>">
              </div>
              <button type="submit" class="btn btn-primary"><?php if (isset($_GET['username'])) {
                                                              echo "Ubah";
                                                            } else {
                                                              echo "Tambah";
                                                            } ?></button>
            </form>
          </div>
          <hr>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Hak Akses</th>
                    <th colspan="2" style="text-align:center;">Opsi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Hak Akses</th>
                    <th colspan="2" style="text-align:center;">Opsi</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $query = "SELECT * FROM user";
                  $sql = mysql_query($query);
                  while ($row = mysql_fetch_array($sql)) {
                  ?>
                    <tr>
                      <td><?php echo $row['username']; ?></td>
                      <td><?php echo $row['nama']; ?></td>
                      <td><?php echo $row['hak_akses']; ?></td>
                      <td align="center"><a href="user.php?username=<?php echo $row['username']; ?>" type="button" class="btn btn-success btn-sm" href=""><i class="fa fa-fw fa-pencil"></i><br> Edit</a></td>
                      <td align="center"><a href="#" onclick="javascript: if (confirm('Data dengan username <?php echo $row['username']; ?> akan dihapus?')){ window.location.href='user_proses.php?aksi=Hapus&username=<?php echo $row['username']; ?>';}" type="button" class="btn btn-danger btn-sm" href=""><i class="fa fa-fw fa-trash"></i><br> Hapus</a></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
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
                <span aria-hidden="true">�</span>
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
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Page level plugin JavaScript-->
      <script src="vendor/datatables/jquery.dataTables.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin.min.js"></script>
      <!-- Custom scripts for this page-->
      <script src="js/sb-admin-datatables.min.js"></script>
    </div>
  </body>

  </html>
<?php
} else {
  header("location:login.php");
}
?>