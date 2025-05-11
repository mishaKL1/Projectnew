<?php
session_start();
require_once('../db.php');
require_once('user.php');
$usernam = $_POST['username'];
$passw = $_POST['password'];
$_SESSION['username'] = $usernam;

$sql = "SELECT password FROM users WHERE username = '$usernam'";
$result = $conn->query($sql);


if (empty($usernam) || empty($passw)){
    echo"vsetky pola musi byt naplnené";
}else{
    $sql = "SELECT * FROM users WHERE username = '$usernam' and password = '$passw'";
    $result = $conn->query($sql);

    if($result->num_rows>0){
        header("Location: ../reviews_page.php?status=success");
        exit;
    }else{
        echo $usernam , $passw ;
    }
    $User = new User($usernam , $passw);
}
?>