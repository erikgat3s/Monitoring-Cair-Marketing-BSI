<?php

include "config.php";

if ($_GET['act'] == 'tambah_data') {
    $outlet = $_POST['nama_outlet'];
    $target_outlet = $_POST['target_outlet'];

    $photo_name = '';
    if ($_FILES['photo']['name']) {
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        $photo_name = $outlet . '.' . $photo_ext;
        $photo_path = "photo_kepala_cabang/" . $photo_name;
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
    $querytambah =  mysqli_query($connect, "INSERT INTO outlet_cbs (nama_outlet, target_outlet, photo) VALUES('$outlet', '$target_outlet', '$photo_name')");

        if ($querytambah) {

            header("location: /CBS/outlet/");
  
        }else {
            echo "ERROR, tidak berhasil" . mysqli_error($connect);
        }
    }

?>
