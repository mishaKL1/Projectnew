<?php
require_once('../db.php');
$usernam = $_POST['username'];
$pass = $_POST['password'];
if (empty($usernam) || empty($pass)){
    echo"vsetky pola musi byt naplnené";
}else{
    $sql = "SELECT * FROM users WHERE username = '$usernam' and password = '$pass'";
    $result = $conn->query($sql);

    if($result->num_rows>0){
        echo "uspeh";
    }

}

?>