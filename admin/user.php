<h1>หน้าผู้ใช้งานทั้งหมด</h1>
<?php
    $alert = $_SESSION["alert"]??"";
    if($alert=="success"):
?>
<div class="alert alert-success" role="alert">
  เพิ่มข้อมูลผู้ใช้สำเร็จ!
</div>
<?php
    endif;
    unset($_SESSION["alert"]);
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ชื่อ-นามสกุล</th>
      <th scope="col">ชื่อผู้ใช้งาน</th>
      <th scope="col">แผนก</th>
      <th scope="col">สิทธิ์การใช้งาน</th>
      <th scope="col">จัดการ</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include_once "../conn.php";
    $sql = "SELECT * FROM user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>
    <tr>
      <th scope="row">1</th>
      <td><?=$row["name"]?></td>
      <td><?=$row["username"]?></td>
      <td><?=$row["department"]?></td>
      <td><?=$row["role"]?></td>
      <td>แก้ไข ลบ</td>
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