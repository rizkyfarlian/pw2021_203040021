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
      <li class="active">Pembelian</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">List Pembelian</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>No. Nota</th>
                  <th>Supplier</th>
                  <th>User</th>
                  <th>Tanggal Pembelian</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $sql = "SELECT * FROM view_transaksi_pembelian";
                  $result = $conn->query($sql);
                  $no = 0;
                  while ($hasil = $result->fetch_assoc()) {
                    $no = $no + 1;
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><a class="btn btn-primary" href="list_detail_pembelian.php?id_pembelian=<?php echo $hasil['id_pembelian'] ?>"><?php echo $hasil['no_nota'] ?></a></td>
                    <td><?php echo $hasil['nama_supplier'] ?></td>
                    <td><?php echo $hasil['nama_user'] ?></td>
                    <td><?php echo date_format(date_create($hasil['tanggal_nota']), 'd F Y') ?></td>
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