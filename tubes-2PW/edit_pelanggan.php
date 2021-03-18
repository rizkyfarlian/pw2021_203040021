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
      <li><a href="#">Pelanggan</a></li>
      <li class="active">Edit</li>
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
            <h3 class="box-title">Edit Data Pelanggan</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php 
            $sql = "SELECT * FROM pelanggan WHERE id_pelanggan = '".$_GET['id_pelanggan']."'";
            $result = $conn->query($sql);
            while ($hasil = $result->fetch_assoc()) {
          ?>
          <form role="form" method="post" enctype="multipart/form-data" action="process.php?action=edit_pelanggan">
            <div class="box-body">
              <div class="form-group" hidden="">
                <label>ID Pelanggan</label>
                <input type="text" name="id_pelanggan" value="<?php echo $hasil['id_pelanggan']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label>Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" value="<?php echo $hasil['nama_pelanggan']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" value="<?php echo $hasil['alamat']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telepon" value="<?php echo $hasil['telepon']; ?>" class="form-control">
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        <?php } ?>
        </div>

      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>