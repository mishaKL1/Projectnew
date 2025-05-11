<?php
require_once('../db.php');
class User{
    private $user_name;
    private $user_pass;
    private $conn;

    public function __construct($username,  $user_pass){
        $this->user_name = $username;
        $this->user_pass = $user_pass;
    }
    public function getUserName(){
        $username = $this->user_name;
        return $username;
    }
    
    public function setUserName($username){
         $this->user_name = $username;
    }

    public function setPassword($user_pass){
        $this->user_pass = $user_pass;
   }

   public function getPassword(){
    $user_pass = $this->user_pass;
    return $user_pass;
}
    public function UpdatePassword($pass){
        $sql = "UPDATE users SET password = '$pass' WHERE username = '$this->user_name'";
        $this->conn->query($sql);
        header("Location: ../reviews_page.php?status=success");
    }
}

?>