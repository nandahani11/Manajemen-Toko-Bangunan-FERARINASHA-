<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FERARINASHA - Toko Bangunan</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('css/'); ?>sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-cash-register"></i>
        </div>
        <div class="sidebar-brand-text mx-3">FERARINASHA</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Dashboard
      </div>
      
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Data Barang Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('barang') ?>">
          <i class="fas fa-fw fa-store"></i>
          <span>Data Barang</span></a>
      </li>

      <!-- Nav Item - Data Karyawan Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('karyawan') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Karyawan</span></a>
	  </li>
	  
	  <!-- Nav Item - Data Karyawan Transaksi Menu -->
	  <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pembelian') ?>">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Transaksi</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          
          <div class="copyright text-center my-auto">
            <span>TOKO BANGUNAN</span>
          </div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="container">

<div class="row mt-3">
    <div class="col-md-6">

    <div class="card">
        <div class="card-header">
            Form Tambah Data Transaksi
        </div>
        <div class="card-body">
            <form action="" method="post">
            <div class="form-group">
                <label for="exampleFormControlSelect1">ID BARANG</label>
                <input class="form-control" id="id_barang" name="id_barang">
                </select>
            </div>
                <div class="form-group">
                    <label for="tgl_transaksi">Tanggal Transaksi </label>
                    <input type="date" name="tgl_transaksi"class="form-control" id="tgl_transaksi">
                    <small class="form-text text-danger"><?= form_error('tgl_transaksi'); ?></small>
                </div>
                <div class="form-group">
                    <label for="stok">Jumlah Barang </label>
                    <input type="number" name="stok"class="form-control" id="stok">
                    <small class="form-text text-danger"><?= form_error('stok'); ?></small>
                </div>
                <div class="form-group">
                    <label for="harga">Harga </label>
                    <input type="text" name="harga"class="form-control" id="harga">
                    <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                </div>
                <div class="form-group">
                    <label for="total">Total </label>
                    <input type="text" name="total"class="form-control" id="total">
                    <small class="form-text text-danger"><?= form_error('total'); ?></small>
                </div>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Transaksi</button>
            </form>
        </div>
    </div>

    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <?php if(empty($barang)) : ?>
            <div class="alert alert-danger" role="alert">
            Data Barang Tidak Ditemukan!
            </div>
        <?php endif; ?> 
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAMA BARANG</th>
                    <th scope="col">HARGA</th>
                    <th scope="col">STOK</th>
                    </tr>
                </thead>
                <tbody>
            <?php foreach($barang as $brg) : ?>
                    <tr>
                    <td><?= $brg['id']; ?></td>
                    <td><?= $brg['nama']; ?></td>
                    <td><?= $brg['harga']; ?></td>
                    <td><?= $brg['stok']; ?></td>
                    </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; FERARINASHA 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

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
  <script src="<?= base_url('assets/'); ?>jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('js/'); ?>sb-admin-2.min.js"></script>

</body>

</html>
