<?php
session_start();
require_once('../db/db.php');
require_once('user.php');

if (!empty($_POST['feedback']) && !empty($_SESSION['username'])) {
    $text = $_POST['feedback'];
    $author_name = $_SESSION['username'];

    $pdo = Database::getConnection();

    try {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$author_name]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $user_id = $user['id'];
            $stmt = $pdo->prepare("INSERT INTO reviews (id_user, text) VALUES (?, ?)");
            $stmt->execute([$user_id, $text]);
            header("Location: ../reviews_page.php?status=success");
            exit();
        } else {
            header("Location: ../reviews_page.php?status=user_not_found");
            exit();
        }
    } catch (PDOException $e) {
        header("Location: ../reviews_page.php?status=db_error");
        exit();
    }
} else {
    header("Location: ../reviews_page.php?status=empty_input");
    exit();
}