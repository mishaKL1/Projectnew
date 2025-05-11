<?php
session_start();
    require_once('../db.php');
    require_once('user.php');
    $text = $_POST['feedback'];
    $author_name = $_SESSION['username'];
    
    if(!empty($text)){
        $sql = "SELECT id from users where username = '$author_name'";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_id =  $row['id'];
        }
        $sql = "INSERT INTO reviews(id_user, text) VALUES('$user_id','$text')";
        $result = $conn->query($sql);
        header("Location: ../reviews_page.php?status=success");
    }
    
?>