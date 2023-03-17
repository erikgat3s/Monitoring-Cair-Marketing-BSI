<?php

include "config.php";

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_outlet'];
    $outlet = $_POST['nama_outlet'];
    $target_outlet = $_POST['target_outlet'];

    // check if a new photo has been uploaded
    $photo_name = $_POST['current_photo'];
    if ($_FILES['photo']['name']) {
        // delete the old photo
        $old_photo_path = "photo_kepala_cabang/" . $photo_name;
        if (file_exists($old_photo_path)) {
            unlink($old_photo_path);
        }

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

    // update the data in the database
    $queryupdate = mysqli_query($connect, "UPDATE outlet SET nama_outlet='$outlet', target_outlet='$target_outlet', photo='$photo_name' WHERE id_outlet='$id'");

    if ($queryupdate) {
        header("location: /grafik/login/outlet");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($connect);
    }
}
?>
