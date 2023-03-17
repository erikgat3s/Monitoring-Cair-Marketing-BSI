<?php

include "config.php";

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_marketing'];
    $nama = $_POST['nama_marketing'];
    $outlet = $_POST['nama_outlet'];
    $target_jabatan = $_POST['target_jabatan'];

    // check if a new photo has been uploaded
    $photo_name = $_POST['current_photo'];
    if ($_FILES['photo']['name']) {
        // delete the old photo
        $old_photo_path = "/CBS/marketing/photo_marketing/" . $photo_name;
        if (file_exists($old_photo_path)) {
            if (!unlink($old_photo_path)) {
                echo "ERROR: Unable to delete old photo file.";
            }
        }

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

    // update the data in the database
    $queryupdate =  mysqli_query($connect, "UPDATE marketing_cbs SET nama_marketing='$nama', nama_outlet='$outlet', target_jabatan='$target_jabatan', photo='$photo_name' WHERE id_marketing='$id'" );

    if ($queryupdate) {
        header("location: /CBS/marketing");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($connect);
    }
}
?>