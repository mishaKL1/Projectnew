<?php
require_once('../db/db.php');

class User {
    private string $username;
    private string $password;
    private PDO $conn;

    public function __construct(string $username = '', string $password = '') {
        $this->username = $username;
        $this->password = $password;
        $this->conn = Database::getConnection();
    }


    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
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

        $stmt = $this->conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        return $stmt->execute([
            'username' => $this->username,
            'password' => $hashedPassword
        ]);
    }
    public function delete(): bool {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE username = :username");
        return $stmt->execute(['username' => $this->username]);
    }
}

