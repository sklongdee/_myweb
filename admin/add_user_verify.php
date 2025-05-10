<?php
session_start();
include_once "../conn.php";
$username = trim($_POST["username"]);
$password = $_POST["password"];
$_name = $_POST["_name"];
$department = $_POST["department"];
$role = $_POST["role"];

    // hash รหัสผ่าน
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = $conn->prepare("INSERT INTO user (username, password, name,department, role) 
    VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $hashed_password, $_name, $department, $role);
    
    if ($stmt->execute()) {
        $_SESSION["alert"]="success";
        header('Location: ./?page=user');
    } else {
        echo "เกิดข้อผิดพลาด: " . $stmt->error;
    }
    
    $stmt->close();

    $conn->close();
?>