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
      <li><a href="#">Laporan</a></li>
      <li class="active">Profit</li>
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
            <h3 class="box-title">Pilih Bulan Laporan Profit</h3>
          </div>
          <form role="form" method="post" enctype="multipart/form-data" target="_blank" action="laporan_profit.php">
            <div class="box-body">
              <div class="form-group">
                <label>Bulan</label>
                <select name="bulan_tahun" class="form-control select2">
                  <?php 
                    $sql = "select DATE_FORMAT(tanggal_penjualan,'%Y-%m') as tanggal from transaksi_penjualan GROUP BY tanggal";
                    $result = $conn->query($sql);
                    while ($hasil = $result->fetch_assoc()) {
                  ?>
                  <option value="<?php echo $hasil['tanggal'] ?>"><?php echo date_format(date_create($hasil['tanggal']), "F Y") ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Lihat Laporan</button>
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