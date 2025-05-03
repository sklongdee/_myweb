<h1>หน้าข่าวสาร</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">รูปภาพ</th>
      <th scope="col">หัวข้อข่าว</th>
      <th scope="col">วันที่ประกาศ</th>
      <th scope="col">จัดการ</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include_once "../conn.php";
    $sql = "SELECT * FROM activity";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $count=1;
    while($row = $result->fetch_assoc()) {
    ?>
    <tr>
      <th scope="row"><?=$count++?></th>
      <td><img src="../img/<?=$row["activity_img"]?>" width="80" height="auto" alt=""></td>
      <td><?=$row["activity_title"]?></td>
      <td><?=$row["activity_date"]?></td>
      <td>
        <a href="?page=update_activity&id=<?=$row["activity_id"]?>">แก้ไข</a>  
        <a href="delete_activity.php?id=<?=$row["activity_id"]?>" onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนี้?');">ลบ</a>
      </td>
    </tr>
    <?php
    }
    } else {
    echo "0 results";
    }
    $conn->close();
    ?>
    
  </tbody>
</table>