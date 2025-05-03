<h1>เพิ่มข่าวกิจกรรม</h1>
<form method="POST" action="add_activity_verify.php" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="activity_title" class="form-label">หัวข้อข่าว</label>
        <input type="text" class="form-control" name="activity_title" id="activity_title">
    </div>
    <div class="mb-3">
        <label for="activity_img" class="form-label">ภาพข่าว</label>
        <input class="form-control" type="file" name="activity_img" id="activity_img">
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>