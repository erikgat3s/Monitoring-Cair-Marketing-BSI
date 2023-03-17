<?php
include "config.php";
if (isset($_POST['nama_outlet'])) {
  $namaOutlet = $_POST['nama_outlet'];
  $query = mysqli_query($connect, "SELECT target_outlet FROM outlet WHERE nama_outlet = '$namaOutlet'");
  $data = mysqli_fetch_assoc($query);
  echo $data['target_outlet'];
}
?>
