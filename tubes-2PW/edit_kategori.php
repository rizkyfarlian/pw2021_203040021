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
      <li><a href="#">Kategori</a></li>
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
            <h3 class="box-title">Edit Data Kategori</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php 
            $sql = "SELECT * FROM kategori WHERE id_kategori = '".$_GET['id_kategori']."'";
            $result = $conn->query($sql);
            while ($hasil = $result->fetch_assoc()) {
          ?>
          <form role="form" method="post" enctype="multipart/form-data" action="process.php?action=edit_kategori">
            <div class="box-body">
              <div class="form-group" hidden="">
                <label>ID Kategori</label>
                <input type="text" name="id_kategori" value="<?php echo $hasil['id_kategori']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label>Kode Kategori</label>
                <input type="text" name="kode_kategori" value="<?php echo $hasil['kode_kategori']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" value="<?php echo $hasil['nama_kategori']; ?>" class="form-control">
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          <?php 
            }
           ?>
        </div>

      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>