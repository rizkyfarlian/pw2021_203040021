<?php include("connection.php"); ?>
<?php if (empty($_SESSION['username']) || $_SESSION['username'] == ""){
  echo '<script language="javascript">';
  echo 'alert("Silahkan login terlebih dahulu");';
  echo 'window.location.href = "index.php";';
  echo '</script>';
  } ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi POS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="addon/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="addon/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="addon/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="addon/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="addon/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="addon/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="addon/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="addon/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="addon/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="addon/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="addon/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="addon/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="addon/index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>POS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Point</b> Of Sale</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="addon/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">
                <?php 
                  $sql = "SELECT * FROM user WHERE username = '".$_SESSION['username']."'";
                  $result = $conn->query($sql);
                  while ($hasil = $result->fetch_assoc()) {
                 ?>
                <?php echo $hasil['nama_user'] ?>
              <?php } ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="addon/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php 
                  $sql = "SELECT * FROM user WHERE username = '".$_SESSION['username']."'";
                  $result = $conn->query($sql);
                  while ($hasil = $result->fetch_assoc()) {
                 ?>
                <?php echo $hasil['nama_user'] ?>
              <?php } ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <a href="process.php?action=logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="addon/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            <?php 
                  $sql = "SELECT * FROM user WHERE username = '".$_SESSION['username']."'";
                  $result = $conn->query($sql);
                  while ($hasil = $result->fetch_assoc()) {
                 ?>
                <?php echo $hasil['nama_user'] ?>
              <?php } ?>
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="home.php">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="list_barang.php"><i class="fa fa-circle-o"></i> List Barang</a></li>
            <li><a href="add_barang.php"><i class="fa fa-circle-o"></i> Tambah Barang</a></li>
<!--             <li><a href="list_kategori.php"><i class="fa fa-circle-o"></i> List Kategori Barang</a></li>
            <li><a href="add_kategori.php"><i class="fa fa-circle-o"></i> Tambah Kategori Barang</a></li> -->
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Supplier</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="list_supplier.php"><i class="fa fa-circle-o"></i> List Supplier</a></li>
            <li><a href="add_supplier.php"><i class="fa fa-circle-o"></i> Tambah Supplier</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="list_user.php"><i class="fa fa-circle-o"></i> List User</a></li>
            <li><a href="add_user.php"><i class="fa fa-circle-o"></i> Tambah User</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Pembelian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="list_pembelian.php"><i class="fa fa-circle-o"></i> List Pembelian</a></li>
            <li><a href="transaksi_pembelian.php"><i class="fa fa-circle-o"></i> Transaksi Pembelian</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Penjualan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="list_penjualan.php"><i class="fa fa-circle-o"></i> List Penjualan</a></li>
            <li><a href="transaksi_penjualan.php"><i class="fa fa-circle-o"></i> Transaksi Penjualan</a></li>
          </ul>
        </li>
        <li>
          <a href="before_laporan_profit.php">
            <i class="fa fa-dashboard"></i> <span>Laporan Profit</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>