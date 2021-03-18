<?php include("header.php"); ?>
<?php 
  if(empty($_SESSION['no_nota']) || $_SESSION['no_nota'] == ""){ 
    $_SESSION['no_nota'] = ""; 
  }else{  
    echo '<script language="javascript">';
    echo 'window.location.href = "detail_transaksi_pembelian.php";';
    echo '</script>';
  } 
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Transaksi Pembelian
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Transaksi Pembelian</a></li>
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
            <h3 class="box-title">Buat Nota</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="post" enctype="multipart/form-data" action="detail_transaksi_pembelian.php">
            <div class="box-body">
              <div class="form-group">
                <label>Supplier</label>
                <select type="text" name="id_supplier" class="form-control">
                  <?php 
                    $sql = "SELECT * FROM supplier";
                    $result = $conn->query($sql);
                    while ($hasil = $result->fetch_assoc()) {
                  ?>
                    <option value="<?php echo $hasil['id_supplier'] ?>"><?php echo $hasil['nama_supplier'] ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="form-group" hidden="">
                <label>User</label>
                <?php 
                    $sql = "SELECT * FROM user WHERE username = '".$_SESSION['username']."'";
                    $result = $conn->query($sql);
                    while ($hasil = $result->fetch_assoc()) {
                  ?>
                  <input type="text" name="id_user" value="<?php echo $hasil['id_user'] ?>" class="form-control" readonly>
                <?php } ?>
              </div>
              <div class="form-group">
                <label>No Nota</label>
                <?php 
                    $sql = "SELECT * FROM transaksi_pembelian ORDER BY id_pembelian DESC LIMIT 1";
                    $result = $conn->query($sql);
                    if (mysqli_num_rows($result) < 1) {
                  ?>
                    <input type="text" name="no_nota" value="TP0001" class="form-control" readonly="">
                  <?php
                    }else{
                      while ($hasil = $result->fetch_assoc()) {
                        $v_no_nota = substr($hasil['no_nota'], 2);
                        $v_no_nota = $v_no_nota + 1;
                        if (strlen($v_no_nota) == 1) {
                          $v_no_nota = "TP000".$v_no_nota;
                        }elseif (strlen($v_no_nota) == 2) {
                          $v_no_nota = "TP00".$v_no_nota;
                        }elseif (strlen($v_no_nota) == 3) {
                          $v_no_nota = "TP0".$v_no_nota;
                        }elseif (strlen($v_no_nota) == 4) {
                          $v_no_nota = "TP".$v_no_nota;
                        }
                  ?>
                      <input type="text" name="no_nota" value="<?php echo $v_no_nota ?>" class="form-control" readonly="">
                <?php 
                      }
                    }
                 ?>
              </div>
              <div class="form-group">
                <label>Tanggal Nota</label>
                <input type="text" name="tanggal_nota" value="<?php echo date('d F Y'); ?>" class="form-control" readonly>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Buat Nota</button>
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