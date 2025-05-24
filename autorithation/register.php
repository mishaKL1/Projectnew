<?php
session_start();
require_once('User.php');
class UserRegistration {
    private $username;
    private $email;
    private $password;
    private $repeatPassword;

    public function __construct($username, $email, $password, $repeatPassword) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->repeatPassword = $repeatPassword;
    }

    public function validate() {
        if (empty($this->username) || empty($this->email) || empty($this->password)) {
            header("Location: ../reviews.php?error=empty_fields");
            exit;
        }
        if ($this->password !== $this->repeatPassword) {
            header("Location: ../reviews.php?error=password_mismatch");
            exit;
        }
    }

    public function register() {
        $user = new User($this->username, $this->password,$this->email);

        if ($user->register()) {
            $_SESSION['username'] = $this->username;
            $_SESSION['email'] = $this->email;
            header("Location: ../reviews_page.php?status=success");
            exit;
        } else {
            header("Location: ../reviews.php?error=user_exists");
            exit;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $repeatPassword = $_POST['repeat_password'] ?? '';

    $registration = new UserRegistration($username, $email, $password, $repeatPassword);

    $registration->validate(); 
    $registration->register(); 
}