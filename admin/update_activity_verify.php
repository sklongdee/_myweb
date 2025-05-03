<h1>update_activity_verify</h1>
<?php
include_once "../conn.php";
$activity_title = $_POST["activity_title"] ?? "";
$activity_id = $_POST["activity_id"] ?? "";
$old_activity_img = $_POST["old_activity_img"] ?? "";

if (isset($_FILES['new_activity_img']) && $_FILES['new_activity_img']['error'] === UPLOAD_ERR_OK) {
    //echo "มีไฟล์ถูกส่งมาเรียบร้อย";
    $target_dir = "../img/";
    $imageFileType = strtolower(pathinfo($_FILES["new_activity_img"]["name"], PATHINFO_EXTENSION));
    
    // สร้างชื่อไฟล์ใหม่แบบไม่ซ้ำ
    $new_filename = "img_" . uniqid() . "." . $imageFileType;
    $target_file = $target_dir . $new_filename;
    
    $uploadOk = 1;
    
    // ตรวจสอบว่าเป็นภาพจริง
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["new_activity_img"]["tmp_name"]);
      if ($check !== false) {
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // ตรวจสอบขนาดไฟล์
    if ($_FILES["new_activity_img"]["size"] > 50000000) {
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
      if (move_uploaded_file($_FILES["new_activity_img"]["tmp_name"], $target_file)) {
        $activity_img = $new_filename;
    
        $sql = "UPDATE activity SET 
        activity_title='$activity_title',
        activity_img='$activity_img'
        WHERE activity_id=$activity_id";

    
        if ($conn->query($sql) === TRUE) {
          $filename = "../img/$old_activity_img";
          unlink($filename);
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




} else {
    //echo "ไม่มีไฟล์ถูกส่งมาหรือเกิดข้อผิดพลาด";
    $sql = "UPDATE activity SET activity_title='$activity_title' WHERE activity_id=$activity_id";

    if ($conn->query($sql) === TRUE) {
        header('Location: ./');
        exit;
    } else {
    echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>