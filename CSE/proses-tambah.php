<?php

include "config.php";

if($_GET['act'] == 'tambah_data'){
  $tanggal = $_POST['tanggal'];
  $realisasi_cair = $_POST['realisasi_cair'];
  $total_topup = $_POST['total_topup'];
  $nama = $_POST['nama'];

  $varname = $_POST['nama'];

  //query
  $querytambah =  mysqli_query($connect, "INSERT INTO tb_harian_cse (tanggal, realisasi_cair, total_topup, nama) VALUES('$tanggal' , '$realisasi_cair' , '$total_topup', '$nama')");

  if ($querytambah) {
      # Code Redirect menggunakan variabel name
      header("location: /CSE/index.php?nama=" . $varname);
  }
  else{
      echo "ERROR, tidak berhasil". mysqli_error($connect);
  }
}

?>