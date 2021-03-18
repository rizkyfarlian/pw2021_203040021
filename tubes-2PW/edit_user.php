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
      <li><a href="#">User</a></li>
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
            <h3 class="box-title">Tambah Data User</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php 
            $sql = "SELECT * FROM user WHERE id_user = '".$_GET['id_user']."'";
            $result = $conn->query($sql);
            while ($hasil = $result->fetch_assoc()) {
          ?>
          <form role="form" method="post" enctype="multipart/form-data" action="process.php?action=edit_user">
            <div class="box-body">
              <div class="form-group" hidden="">
                <label>ID User</label>
                <input type="text" name="id_user" value="<?php echo $hasil['id_user']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label>Nama User</label>
                <input type="text" name="nama_user" value="<?php echo $hasil['nama_user']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $hasil['username']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" value="<?php echo $hasil['password']; ?>" class="form-control">
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