<?php
include "../conn.php";

$activity_title = $_POST["activity_title"];

$target_dir = "../img/";
$imageFileType = strtolower(pathinfo($_FILES["activity_img"]["name"], PATHINFO_EXTENSION));

// สร้างชื่อไฟล์ใหม่แบบไม่ซ้ำ
$new_filename = "img_" . uniqid() . "." . $imageFileType;
$target_file = $target_dir . $new_filename;

$uploadOk = 1;

// ตรวจสอบว่าเป็นภาพจริง
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["activity_img"]["tmp_name"]);
  if ($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// ตรวจสอบขนาดไฟล์
if ($_FILES["activity_img"]["size"] > 50000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// ตรวจสอบนามสกุล
$allowedTypes = ["jpg", "jpeg", "png", "gif"];
if (!in_array($imageFileType, $allowedTypes)) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// หากไม่มีข้อผิดพลาด ให้อัปโหลด
if ($uploadOk == 1) {
  if (move_uploaded_file($_FILES["activity_img"]["tmp_name"], $target_file)) {
    $activity_img = $new_filename;

    $sql = "INSERT INTO activity (activity_title, activity_img)
            VALUES ('$activity_title', '$activity_img')";

    if ($conn->query($sql) === TRUE) {
      header('Location: ./');
      exit;
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
} else {
  echo "Sorry, your file was not uploaded.";
}
?>
