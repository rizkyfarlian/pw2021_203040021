<?php include('connection.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laporan Pembelian</title>
<style type="text/css">
    .prtext {
    color: #000000;
    font-family: tahoma;
    font-size: 11px;
    }
</style>
</head>
<!--<body>                                      -->
<body onload="window.print()">
<table align="center" width="700" border="0">
  <tr>
    <td class="prtext">
        <center>    
      <style type="text/css">
      .prtext {
      color: #000000;
      font-family: tahoma;
      font-size: 11px;
      }
      .prhead {
      color: #000000;
      font-family: tahoma;
      font-size: 14px;
      }
     .prtext_blacksmall {
    font-size: 14px;
    color: #00000;
    font-family: tahoma;
      }
      .prtitle {
    font-size: 25px;
    color: #000000;
    font-family: tahoma;
    font-weight: bold;
      }
      .prtitle1 {
    font-size: 20px;
    color: #000000;
    font-family: times new roman;
    font-weight: bold;
      }
      .logo {
        width:100px;
      }
      hr.style-eight { padding: 0; border: outset; border-top: medium double #333; color: #333; text-align: center; } 
      hr.style-eight:after { /*content: "§";*/ display: inline-block; position: relative; top: -0.7em; font-size: 1.5em; padding: 0 0.25em; background: white; }
  </style>
<table cellspacing="0" cellpadding="0" border="0">
  <tbody>
  <tr>
    <td width="700" align="center"  valign="top" class="prtext_blacksmall">
    <br />
    <b><div class="prtitle">LAPORAN PEMBELIAN</div></b>
    <b><div class="prtitle2">KOPERASI SMPN 23 SEMARANG</div></b>
    <span class="address">Jl. RM Hadi Soebeno S.5 Semarang<br>Telp. (024) 7711053</span>

    </td>
   </tr>
  </tbody>
</table>
<hr class="style-eight" />    </center>
   </td>
  </tr>
</table>
<div class="text">
<div align="center">
   <div class="">
    <table align="center" width="700" class="uiTableList" cellpadding="5" cellspacing="0" border="0">
     <tbody style="font-family: Times New Roman">
        <?php 
          $sql = "SELECT * FROM view_transaksi_pembelian WHERE id_pembelian = '".$_GET['id_pembelian']."'";
          $result = $conn->query($sql);
          while ($hasil = $result->fetch_assoc()) {
         ?>
      <tr>
        <td width="75">No. Nota</td>
        <td width="10" align="center">:</td>
        <td width="300"><?php echo $hasil['no_nota']; ?></td>
      </tr>
      <tr>  
        <td width="75">Supplier</td>
        <td width="10" align="center">:</td>
        <td width="300"><?php echo $hasil['nama_supplier']; ?></td>
      </tr>
        <?php 
          }
         ?>
     </tbody>
    </table>  
    <br />
    <br />
    <table align="center" width="700" class="uiTableList" cellpadding="5" cellspacing="0" border="1">
    <tbody style="font-family: Times New Roman;text-align: justify;">
      <tr>
        <td>No.</td>
        <td>Nama Barang</td>
        <td>Jumlah Barang</td>
        <td>Harga Barang</td>
        <td>Total</td>
      </tr>
      <?php $i = 1; ?>
      <?php 
        $total = 0;
        $sql = "SELECT * FROM view_detail_transaksi_pembelian WHERE id_pembelian = '".$_GET['id_pembelian']."'";
        $result = $conn->query($sql);
        while ($hasil = $result->fetch_assoc()) {
      ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $hasil['nama_barang']; ?></td>
          <td><?php echo $hasil['jumlah']; ?></td>
          <td><?php echo $hasil['harga_beli']; ?></td>
          <?php $total = $total + ($hasil['jumlah'] * $hasil['harga_beli']); ?>
          <td><?php echo $hasil['jumlah'] * $hasil['harga_beli']; ?></td>
        </tr>
        <?php $i = $i + 1; ?>
      <?php } ?>
        <tr>
          <td colspan="4">Total Bayar</td>
          <td><?php echo $total; ?></td>
        </tr>
     </tbody>
    </table>
    <br />
    <br />
    <table align="center" width="700" class="uiTableList" cellpadding="1" cellspacing="0" border="0">
    <tbody style="font-family: Times New Roman;">
        <?php 
          $sql = "SELECT * FROM view_transaksi_pembelian WHERE id_pembelian = '".$_GET['id_pembelian']."'";
          $result = $conn->query($sql);
          while ($hasil = $result->fetch_assoc()) {
         ?>
      <tr>
        <td width="500"></td>
        <td width="200">Semarang, <?php echo date_format(date_create($hasil['tanggal_nota']), "d F Y"); ?></td>
      </tr>
      <tr>
        <td width="500" height="75"></td>
        <td width="200" height="75" style="vertical-align: top;">Supplier</td>
      </tr>
      <tr>
        <td width="500"></td>
        <td width="200"><?php echo $hasil['nama_supplier'] ?></td>
      </tr>
        <?php } ?>
     </tbody>
    </table>
   </div>
</div>
</div>
</body>
</html>