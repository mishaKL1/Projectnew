<?php
session_start();
require_once('User.php');
class UserPasswordChange {
    private $username;
    private $oldPassword;
    private $newPassword;

    public function __construct($username, $oldPassword, $newPassword) {
        $this->username = $username;
        $this->oldPassword = $oldPassword;
        $this->newPassword = $newPassword;
    }

    public function validate() {
        if (empty($this->oldPassword) || empty($this->newPassword)) {
            header("Location: ../change_password_form.php?error=empty_fields");
            exit;
        }
    }

    public function changePassword() {
        $user = new User($this->username, $this->oldPassword);

        if ($user->login()) {
            if ($user->updatePassword($this->newPassword)) {
                header("Location: ../reviews_page.php?status=password_changed");
                exit;
            } else {
                header("Location: ../change_password_form.php?error=update_failed");
                exit;
            }
        } else {
            header("Location: ../change_password_form.php?error=wrong_old_password");
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
    $oldPassword = $_POST['old_password'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';

    $passwordChange = new UserPasswordChange($username, $oldPassword, $newPassword);

    $passwordChange->validate();
    $passwordChange->changePassword();
}
