<?php
include_once "../conn.php";
$id = $_GET["id"] ?? "";
$sql = "DELETE FROM activity WHERE activity_id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: ./');
    exit;
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>