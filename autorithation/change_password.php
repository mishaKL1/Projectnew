<?php
session_start();
    require_once('../db.php');
    $old_pass = $_POST['old_password'];
    $new_pass =$_POST['new_password'];
    $user_name = $_SESSION['username'];
    $sql = "SELECT password FROM users WHERE username = '$user_name' LIMIT 1";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_pass=  $row['password'];
    }
    if($current_pass == $old_pass){
        $sql = "UPDATE users SET password = '$new_pass' WHERE username = '$user_name'";
        $conn->query($sql);
        header("Location: ../reviews_page.php?status=success");
    }else{
        header("Location: ../reviews_page.php?status=success");
        exit();        
    }


?>