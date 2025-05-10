<?php
session_start();
include_once "../conn.php";
$id = $_POST["id"];
$password = $_POST["new_password"];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE user SET password=? WHERE id=?");
    $stmt->bind_param("ss", $hashed_password,$id);
    
    if ($stmt->execute()) {
        $_SESSION["alert"]="updatePasswordSuccess";
        header('Location: ./?page=user');
    } else {
        echo "เกิดข้อผิดพลาด: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
?>