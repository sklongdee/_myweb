<?php
session_start();
include_once "../conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM user WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  $_SESSION["alert"]="deleteUserSuccess";
  header('Location: ./?page=user');
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>