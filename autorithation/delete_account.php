<?php
session_start();
require_once('User.php');
class UserAccountDelete {
    private $username;
    private $confirmPassword;
    private $email;

    public function __construct($username, $confirmPassword) {
        $this->username = $username;
        $this->confirmPassword = $confirmPassword;
    }

    public function validate() {
        if (empty($this->confirmPassword)) {
            header("Location: ../account_delete_form.php?error=empty_password");
            exit;
        }
    }

    public function deleteAccount() {
        $user = new User($this->username, $this->confirmPassword,$this->email);

        if ($user->login()) {
            if ($user->delete()) {
                session_destroy();
                header("Location: ../reviews.php?status=account_deleted");
                exit;
            } else {
                header("Location: ../account_delete_form.php?error=delete_failed");
                exit;
            }
        } else {
            header("Location: ../account_delete_form.php?error=wrong_password");
            exit;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['username'])) {
        header("Location: ../login_form.php");
        exit;
    }

    $username = $_SESSION['username'];
    $confirmPassword = $_POST['confirm_password'] ?? '';
    $email = $_SESSION['email'] ?? '';

    $accountDelete = new UserAccountDelete($username, $confirmPassword);

    $accountDelete->validate();
    $accountDelete->deleteAccount();
}
