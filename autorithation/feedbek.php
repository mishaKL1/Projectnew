<?php
session_start();
require_once('../db/db.php');

class Feedback {
    public static function submit() {
        if (empty($_POST['feedback']) || empty($_SESSION['username'])) {
            self::redirect('empty_input');
        }

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$_SESSION['username']]);
        $user = $stmt->fetch();

        if ($user) {
            $stmt = $pdo->prepare("INSERT INTO reviews (id_user, text) VALUES (?, ?)");
            $stmt->execute([$user['id'], $_POST['feedback']]);
            self::redirect('success');
        } else {
            self::redirect('user_not_found');
        }
    }

    private static function redirect($status) {
        header("Location: ../reviews_page.php?status=$status");
        exit();
    }
}

try {
    Feedback::submit();
} catch (Exception $e) {
    header("Location: ../reviews_page.php?status=db_error");
    exit();
}