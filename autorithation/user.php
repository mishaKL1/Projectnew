<?php
require_once('../db/db.php');

class User {
    private string $username;
    private string $password;
    private ?string $email;
    private PDO $conn;

    public function __construct(string $username = '', string $password = '', ?string $email='') {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->conn = Database::getConnection();
    }

    public function updatePassword(string $newPassword): bool {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        $stmt = $this->conn->prepare("UPDATE users SET password = :password WHERE username = :username");
        return $stmt->execute([
            'password' => $hashedPassword,
            'username' => $this->username
        ]);
    }


    public function login(): bool {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $this->username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($this->password, $user['password'])) {
            return true;
        }
        return false;
    }

    public function register(): bool {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $this->username]);
        if ($stmt->fetch()) {
            return false;
        }

        $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt = $this->conn->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
        return $stmt->execute([
            'username' => $this->username,
            'password' => $hashedPassword,
            'email' => $this->email
        ]);
    }
    public function delete(): bool {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE username = :username");
        return $stmt->execute(['username' => $this->username]);
    }

    public function getUserData(): ?array {
    $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $this->username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user ?: null;
}
}