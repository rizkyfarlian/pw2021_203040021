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
      <li class="active">Kategori</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">List Kategori</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Kode Kategori</th>
                  <th>Nama Kategori</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $sql = "SELECT * FROM kategori";
                  $result = $conn->query($sql);
                  $no = 0;
                  while ($hasil = $result->fetch_assoc()) {
                    $no = $no + 1;
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $hasil['kode_kategori'] ?></td>
                    <td><?php echo $hasil['nama_kategori'] ?></td>
                    <td>
                      <a href="edit_kategori.php?id_kategori=<?php echo $hasil['id_kategori'] ?>" title="Edit Data Kategori" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                      <a href="process.php?action=hapus_kategori&id_kategori=<?php echo $hasil['id_kategori'] ?>" title="Hapus Data Kategori" class="btn btn-danger"><i class="fa fa-close"></i></a>
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