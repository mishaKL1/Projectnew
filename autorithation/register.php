<?php
session_start();
require_once('user.php');
$usernam = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$repeatpass = $_POST['repeat_password'];

require_once('../db.php');
if(!(empty($usernam) || empty($email)|| empty($pass)) && $repeatpass == $pass){
        $sql = "INSERT INTO users(username, password, email) VALUES('$usernam','$pass','$email')";
        $conn -> query($sql);
        $user_id = $conn->insert_id;
        $User = new User($usernam , $user_id);
        header("Location: ../reviews_page.php?status=success");
        exit;
    }

?>