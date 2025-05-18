<?php
$activity_id = $_GET["activity_id"]??"";
include_once "conn.php";
$sql = "SELECT * FROM activity WHERE activity_id=$activity_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $activity_img = $row["activity_img"];
    $activity_title = $row["activity_title"];
    $activity_date = $row["activity_date"];
  }
} else {
  echo "0 results";
}
$conn->close();
?>
<div class="container">
<h1>รายละเอียดข่าวสาร</h1>
<div class="card">
  <div class="card-body">
    <h5 class="card-title"><?=$activity_title?></h5>
    <p class="card-text"><small class="text-body-secondary">ประกาศเมื่อ : <?=$activity_date?></small></p>
  </div>
  <img src="img/<?=$activity_img?>" class="card-img-bottom" alt="...">
</div>
</div>