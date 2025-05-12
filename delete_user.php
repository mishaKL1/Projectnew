<?php
require_once 'db/db.php';

if (isset($_GET['id'])) {
    $userId = (int)$_GET['id'];

    $conn = Database::getConnection();

    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error deleting user.";
    }
} else {
    echo "User ID not specified.";
}
?>
