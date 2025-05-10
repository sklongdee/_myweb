<?php
session_start();
    include_once "conn.php";
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    
    $stmt = $conn->prepare("SELECT id, password FROM user WHERE username = ?");
    $stmt->bind_param("s", $username, );
    $stmt->execute();
    
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();
        
        // ตรวจสอบรหัสผ่าน
        if (password_verify($password, $hashed_password)) {
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $username;
            header('Location: admin');
        } else {
            $_SESSION["alert"]="passward_fail";
            header('Location: ./');
        }
    } else {
        $_SESSION["alert"]="username_fail";
        header('Location: ./');
    }
    
    $stmt->close();

?>