<?php include('connection.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laporan Profit</title>
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
    <b><div class="prtitle">LAPORAN PROFIT</div></b>
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
    <br />
    <br />
    <br />
    <table align="center" width="700" class="uiTableList" cellpadding="5" cellspacing="0" border="0">
     <tbody style="font-family: Times New Roman">
      <tr>
        <td width="75">Bulan</td>
        <td width="10" align="center">:</td>
        <td width="300">
          <?php echo date_format(date_create($_POST['bulan_tahun']), "F Y"); ?>
        </td>
      </tr>
     </tbody>
    </table>
    <br />
    <table align="center" width="700" class="uiTableList" cellpadding="5" cellspacing="0" border="1">
    <tbody style="font-family: Times New Roman;text-align: justify;">
      <tr>
        <td>No.</td>
        <td>Nama Barang</td>
        <td>Jumlah Item</td>
        <td>Harga Beli</td>
        <td>Harga Jual</td>
        <td>Keuntungan</td>
        <td>Total</td>
      </tr>
      <?php $i = 1; ?>
      <?php 
        $total = 0;
        $sql = "SELECT * FROM view_detail_transaksi_penjualan";
        $result = $conn->query($sql);
        while ($hasil = $result->fetch_assoc()) {
      ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $hasil['nama_barang']; ?></td>
          <td><?php echo $hasil['jumlah']; ?></td>
          <td><?php echo $hasil['harga_beli']; ?></td>
          <td><?php echo $hasil['harga_jual']; ?></td>
          <?php $total = $total + ($hasil['jumlah'] * ($hasil['harga_jual'] - $hasil['harga_beli'])); ?>
          <td><?php echo ($hasil['harga_jual'] - $hasil['harga_beli']); ?></td>
          <td><?php echo $hasil['jumlah'] * ($hasil['harga_jual'] - $hasil['harga_beli']); ?></td>
        </tr>
        <?php $i = $i + 1; ?>
      <?php } ?>
        <tr>
          <td colspan="6">Total Keuntungan</td>
          <td><?php echo $total; ?></td>
        </tr>
     </tbody>
    </table>
    <br />
    <br />
    <table align="center" width="700" class="uiTableList" cellpadding="1" cellspacing="0" border="0">
    <tbody style="font-family: Times New Roman;">
      <tr>
        <td width="500"></td>
        <td width="200">Semarang, <?php echo date("d F Y"); ?></td>
      </tr>
      <tr>
        <td width="500"></td>
        <td width="200" style="vertical-align: top;">Staff Koperasi</td>
      </tr>
      <tr>
        <td width="500" height="75"></td>
        <td width="200" height="75" style="vertical-align: top;">SMPN 23 Semarang</td>
      </tr>
      <tr>
        <td width="500"></td>
        <?php 
          $sql = "SELECT * FROM user WHERE username = '".$_SESSION['username']."'";
          $result = $conn->query($sql);
          while ($hasil = $result->fetch_assoc()) {
         ?>
        <td width="200"><?php echo $hasil['nama_user'] ?></td>
      <?php } ?>
      </tr>
     </tbody>
    </table>
   </div>
</div>
</div>
</body>
</html>