<?php
class User{
    private $user_name;
    private $user_id;

    public function __construct($username, $user_id){
        $this->user_name = $username;
        $this->user_id = $user_id;
    }
    public function getUserName(){
        $username = $this->user_name;
        return $username;
    }
    public function getUserId(){
        $user_id = $this->user_id;
        return $user_id;
    }
}

?>