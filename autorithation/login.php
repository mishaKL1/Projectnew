<?php
session_start();
require_once('User.php');

class UserLogin {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function validate() {
        if (empty($this->username) || empty($this->password)) {
            header("Location: ../login_form.php?error=empty_fields");
            exit;
        }
    }

    public function login() {
        $user = new User($this->username, $this->password);

        if ($user->login()) {
            $_SESSION['username'] = $this->username;
            header("Location: ../reviews_page.php?status=login_success");
            exit;
        } else {
            header("Location: ../login_form.php?error=invalid_credentials");
            exit;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $login = new UserLogin($username, $password);

    $login->validate(); 
    $login->login(); 
}
