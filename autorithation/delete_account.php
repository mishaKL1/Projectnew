<?php
    require_once('../db.php');
    $user_name = $_POST['username'];
    $pass = $_POST['confirm_password'];
    $sql = "SELECT password FROM users WHERE username = '$user_name' LIMIT 1";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_pass=  $row['password'];
    }
    if($current_pass == $pass){
        $sql = "DELETE FROM users WHERE username = '$user_name'";
        $conn->query($sql);
        header("Location: ../reviews.php");
    }

?>