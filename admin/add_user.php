<div class="container d-flex justify-content-center pt-5">
    <div class="card shadow p-4" style="width: 100%; max-width: 100%; border-radius: 1rem;">
      <h3 class="text-center mb-4">เพิ่มผู้ใช้งาน</h3>
      
      <form method="post" action="add_user_verify.php">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
          <label for="username">Username</label>
        </div>
        
        <div class="form-floating mb-4">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>
        <div class="form-floating mb-4">
          <input type="text" class="form-control" id="_name" name="_name" placeholder="ชื่อ-นามสกุลผู้ใช้งาน" required>
          <label for="password">ชื่อ-นามสกุลผู้ใช้งาน</label>
        </div>
        <div class="form-floating mb-4">
            <select class="form-select" id="department" name="department" aria-label="Default select example">
                <option selected>เลือกแผนกที่สังกัด</option>
                <option value="IT">IT</option>
                <option value="บัญชี">บัญชี</option>
                <option value="บุคคล">บุคคล</option>
            </select>
          <label for="department">แผนก</label>
        </div>
        <div class="form-floating mb-4">
            <select class="form-select" id="role" name="role" aria-label="Default select example">
                <option selected>เลือกสิทธิ์การใช้งาน</option>
                <option value="admin">admin</option>
                <option value="user">user</option>
            </select>
          <label for="role">สิทธิ์การใช้งาน</label>
        </div>
        
        <button type="submit" class="btn btn-primary w-100">เพิ่มผู้ใช้งาน</button>
      </form>
    </div>
  </div>