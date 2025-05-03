<h1>แก้ไขข้อมูล</h1>
<?php
include_once "../conn.php";
$activity_id = $_GET["id"] ?? "";
    $sql = "SELECT * FROM activity WHERE activity_id=$activity_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $count=1;
    while($row = $result->fetch_assoc()) {
?>
<form method="POST" action="update_activity_verify.php" enctype="multipart/form-data">

<div class="mb-3">
    <label for="activity_title" class="form-label">หัวข้อข่าว</label>
    <input type="text" value="<?=$row["activity_title"]?>" class="form-control" name="activity_title" id="activity_title">
</div>
<div class="mb-3">
    <label for="activity_img" class="form-label">ภาพข่าว</label><br>
    <img src="../img/<?=$row["activity_img"]?>" width="400" height="auto" id="activity_img">
</div>
<div class="mb-3">
    <label for="new_activity_img" class="form-label">ภาพข่าวใหม่</label>
    <input class="form-control" type="file" name="new_activity_img" id="new_activity_img">
</div>
<input hidden type="text" name="activity_id" value="<?=$row["activity_id"]?>">
<input hidden type="text" name="old_activity_img" value="<?=$row["activity_img"]?>">
<button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
    }
    } else {
    echo "0 results";
    }
    $conn->close();
?>