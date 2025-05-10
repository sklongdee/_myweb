<h1>update user</h1>
<?php
include_once "../conn.php";
$id = $_GET["user_id"]??"";
$sql = "SELECT * FROM user WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $username=$row["username"];
    $name=$row["name"];
    $department=$row["department"];
    $role=$row["role"];
  }
} else {
  echo "0 results";
}
$conn->close();
?>
<form method="post" id="update_user" action="update_user_verify.php">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" value="<?=$username?>" id="username" name="username" placeholder="Username" required>
          <label for="username">Username</label>
        </div>
        
        <div class="form-floating mb-4">
          <input type="text" class="form-control" value="<?=$name?>" id="_name" name="_name" placeholder="ชื่อ-นามสกุลผู้ใช้งาน" required>
          <label for="password">ชื่อ-นามสกุลผู้ใช้งาน</label>
        </div>
        <div class="form-floating mb-4">
            <select class="form-select" id="department" name="department" aria-label="Default select example">
                <option value="IT" <?php if($department=="IT")echo "selected";?>>IT</option>
                <option value="บัญชี" <?php if($department=="บัญชี")echo "selected";?>>บัญชี</option>
                <option value="บุคคล" <?php if($department=="บุคคล")echo "selected";?>>บุคคล</option>
            </select>
          <label for="department">แผนก</label>
        </div>
        <div class="form-floating mb-4">
            <select class="form-select" id="role" name="role" aria-label="Default select example">
                <option value="admin" <?php if($role=="admin")echo "selected";?>>admin</option>
                <option value="user" <?php if($role=="user")echo "selected";?>>user</option>
            </select>
          <label for="role">สิทธิ์การใช้งาน</label>
        </div>
        <input hidden type="text" name="id" value="<?=$id?>">
    <button type="submit" for="update_user" class="btn btn-primary w-100">แก้ไขข้อมูลผู้ใช้งาน</button>
</form>
<p>
<hr>

<form action="update_password.php" id="update_password" method="POST">
    <div class="form-floating mb-4">
        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="รหัสผ่าน" required>
        <label for="new_password">รหัสผ่านใหม่</label>
    </div>
    <input hidden type="text" name="id" value="<?=$id?>">
    <button type="submit" for="update_password" class="btn btn-primary w-100">แก้ไขรหัสผ่าน</button>
</form>