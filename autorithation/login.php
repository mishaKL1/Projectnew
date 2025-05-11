<?php
require_once('../db.php');
require_once('user.php');
$usernam = $_POST['username'];
$pass = $_POST['password'];
if (empty($usernam) || empty($pass)){
    echo"vsetky pola musi byt naplnené";
}else{
    $sql = "SELECT * FROM users WHERE username = '$usernam' and password = '$pass'";
    $result = $conn->query($sql);

    if($result->num_rows>0){
        header("Location: ../reviews_page.php?status=success");
        exit;
    }
}
$User = new User($usernam , $pass);
?>