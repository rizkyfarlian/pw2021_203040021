<?php include("header.php"); ?>
<?php 
    
    if($_SESSION['no_nota'] == ""){
      if (empty($_POST['no_nota'])) {
        echo '<script language="javascript">';
        echo 'window.location.href = "transaksi_pembelian.php";';
        echo '</script>';
      }else{
        $_SESSION['no_nota'] = $_POST['no_nota'];
        $id_supplier = $_POST['id_supplier'];
        $id_user = $_POST['id_user'];
        $no_nota = $_POST['no_nota'];
        $tanggal_nota = date_format(date_create($_POST['tanggal_nota']), 'Y-m-d');
        $sql = "SELECT * FROM transaksi_pembelian WHERE no_nota = '".$_POST['no_nota']."'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) < 1) {
          $sql2 = "INSERT INTO transaksi_pembelian VALUES (null, '$id_supplier', '$id_user', '$no_nota', '$tanggal_nota')";
          $result2 = $conn->query($sql2);
        }
        while ($hasil = $result->fetch_assoc()) {
          $id_pembelian = $hasil['id_pembelian'];
        }
      }
    }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Detail Transaksi Pembelian
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Detail Transaksi Pembelian</a></li>
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
            <h3 class="box-title">Tambah Item</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="post" enctype="multipart/form-data" action="process.php?action=tambah_detail_transaksi_pembelian">
            <div class="box-body">
              <div class="form-group">
                <label>No Nota</label>
                  <input type="text" name="no_nota" value="<?php echo $_SESSION['no_nota'] ?>" class="form-control" readonly="">
              </div>
              <div class="form-group">
                <label>Nama Barang</label>
                <select type="text" name="kode_barang" class="form-control">
                  <?php 
                    $sql = "SELECT * FROM barang";
                    $result = $conn->query($sql);
                    while ($hasil = $result->fetch_assoc()) {
                  ?>
                    <option value="<?php echo $hasil['id_barang'] ?>"><?php echo $hasil['nama_barang'] ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                  <input type="text" name="jumlah" class="form-control">
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Tambah Item</button>
              <a href="process.php?action=end_transaksi_pembelian&no_nota=<?php echo $_SESSION['no_nota'] ?>" style="float: right;" type="submit" class="btn btn-success">Selesai</a>
            </div>
          </form>
        </div>
        <!-- List -->
        <div class="box box-primary">
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $id_pembelian = "";
                  $sql = "SELECT * FROM transaksi_pembelian WHERE no_nota = '".$_SESSION['no_nota']."'";
                  $result = $conn->query($sql);
                  while ($hasil = $result->fetch_assoc()) {
                    $id_pembelian = $hasil['id_pembelian'];
                  }
                  $sql = "SELECT * FROM view_detail_transaksi_pembelian WHERE id_pembelian = '".$id_pembelian."'";
                  //echo $sql;
                  $result = $conn->query($sql);
                  $no = 0;
                  while ($hasil = $result->fetch_assoc()) {
                    $no = $no + 1;
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $hasil['nama_barang'] ?></td>
                    <td><?php echo $hasil['jumlah'] ?></td>
                    <td>
                      <a href="process.php?action=hapus_detail_transaksi_pembelian&id_detail_pembelian=<?php echo $hasil['id_detail_pembelian'] ?>" title="Hapus Data Barang Pada Detail Pembelian" class="btn btn-danger"><i class="fa fa-close"></i></a>
                    </td>
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
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>