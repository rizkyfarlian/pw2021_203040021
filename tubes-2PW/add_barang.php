<?php include("header.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      &nbsp;
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Barang</a></li>
      <li class="active">Tambah</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Barang</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="post" enctype="multipart/form-data" action="process.php?action=tambah_barang">
            <div class="box-body">
              <div class="form-group">
                <label>Kode Barang</label>
                <input type="text" name="kode_barang" class="form-control">
              </div>
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control">
              </div>
              <div class="form-group">
                <label>Harga Beli</label>
                <input type="text" name="harga_beli" class="form-control">
              </div>
              <div class="form-group">
                <label>Harga Jual</label>
                <input type="text" name="harga_jual" class="form-control">
              </div>
              <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control">
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>

      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>