<h1>หน้าผู้ใช้งานทั้งหมด</h1>


<?php

  function alert($color,$text){
    echo '
    <div class="alert alert-'.$color.'" role="alert">
      '.$text.'
    </div>
    ';
    unset($_SESSION["alert"]);
  }
    $alert = $_SESSION["alert"]??"";
    if($alert=="success"){
      alert("success","เพิ่มข้อมูลผู้ใช้เรียบร้อยแล้ว!");
    }elseif($alert=="updateUserSuccess"){
      alert("success","แก้ไขข้อมูลผู้ใช้เรียบร้อยแล้ว!");
    }elseif($alert=="updatePasswordSuccess"){
      alert("success","แก้ไขรหัสผ่านผู้ใช้เรียบร้อยแล้ว!");
    }elseif($alert=="deleteUserSuccess"){
      alert("danger","ลบผู้ใช้เรียบร้อยแล้ว!");
    }
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
      $count=1;
    while($row = $result->fetch_assoc()) {
    ?>
    <tr>
      <th scope="row"><?=$count++?></th>
      <td><?=$row["name"]?></td>
      <td><?=$row["username"]?></td>
      <td><?=$row["department"]?></td>
      <td><?=$row["role"]?></td>
      <td>
        <a href="./?page=update_user&user_id=<?=$row["id"]?>"><i class="bi bi-pencil-square"></i></a>
        <a onclick="return confirm('คุณแน่ใจที่จะลบข้อมูลนี้!!')" href="./delete_user.php?id=<?=$row["id"]?>"><i class="bi bi-trash"></i></a> 
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