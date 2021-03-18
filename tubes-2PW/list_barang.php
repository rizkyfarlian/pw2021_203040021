<?php

  include("header.php");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      &nbsp;
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">List</a></li>
      <li class="active">Barang</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">List Barang</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Gambar</th>
                  <th>Harga Beli</th>
                  <th>Harga Jual</th>
                  <th>Stok</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $sql = "SELECT * FROM barang";
                  $result = $conn->query($sql);
                  $no = 0;
                  while ($hasil = $result->fetch_assoc()) {
                    $no = $no + 1;
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $hasil['kode_barang'] ?></td>
                    <td><?php echo $hasil['nama_barang'] ?></td>
                    <td><img height="100" width="100" src="<?php echo $hasil['link_gambar']; ?>"></td>
                    <td><?php echo $hasil['harga_beli'] ?></td>
                    <td><?php echo $hasil['harga_jual'] ?></td>
                    <td><?php echo $hasil['stok'] ?></td>
                    <td>
                      <a href="edit_barang.php?id_barang=<?php echo $hasil['id_barang'] ?>" title="Edit Data Barang" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                      <a href="process.php?action=hapus_barang&id_barang=<?php echo $hasil['id_barang'] ?>" title="Hapus Data Barang" class="btn btn-danger"><i class="fa fa-close"></i></a>
                    </td>
                  </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include("footer.php"); ?>