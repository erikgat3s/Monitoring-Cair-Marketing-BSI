<?php

include "config.php";

$query = mysqli_query($connect, "SELECT * FROM marketing ORDER BY id_marketing");
$data = mysqli_fetch_array($query);

if ($_GET['act'] == 'tambah_data') {
    $nama = $_POST['nama_marketing'];
    $outlet = $_POST['nama_outlet'];
    $target_jabatan = $_POST['target_jabatan'];
    $target_outlet = $_POST['target_outlet'];

    $photo_name = '';
    if ($_FILES['photo']['name']) {
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        $photo_name = $nama . '.' . $photo_ext;
        $photo_path = "photo_marketing/" . $photo_name;
        move_uploaded_file($photo_tmp, $photo_path);
        
        // Resize photo to fixed size
        $image = imagecreatefromstring(file_get_contents($photo_path));
        $width = 200; // Fixed width
        $height = 200; // Fixed height
        $resized_image = imagecreatetruecolor($width, $height);
        imagecopyresized($resized_image, $image, 0, 0, 0, 0, $width, $height, imagesx($image), imagesy($image));
        imagejpeg($resized_image, $photo_path);
    }

    //query
    $querytambah =  mysqli_query($connect, "INSERT INTO marketing_cbs (nama_marketing, nama_outlet, target_jabatan, photo) VALUES('$nama' , '$outlet' , '$target_jabatan', '$photo_name')");

    if ($querytambah) {
        # Code Redirect menggunakan variabel name
        header("location: /CBS/marketing");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($connect);
    }
}

?>
