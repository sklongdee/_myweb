<?php
session_start();
include_once "../conn.php";
$id = $_POST["id"]??"";
$username = $_POST["username"]??"";
$name = $_POST["_name"]??"";
$department = $_POST["department"]??"";
$role = $_POST["role"]??"";

$sql = "UPDATE user SET 
    username='$username',
    name='$name',
    department='$department',
    role='$role'
    WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    $_SESSION["alert"]="updateUserSuccess";
    header('Location: ./?page=user');
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>