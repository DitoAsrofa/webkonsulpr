<?php
include_once('../config/database.php');

class UserModel {

    public static function create($username, $email, $password) {
        $conn = Database::getConnection();

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Query SQL untuk menyimpan user
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

        // Jika statement gagal, tampilkan pesan error
        if (!$stmt) {
            die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        }

        // Bind parameter ke query
        $stmt->bind_param("sss", $username, $email, $hashedPassword);

        // Eksekusi query
        if ($stmt->execute()) {
            return true;
        } else {
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }
    }

    public static function findByEmail($email) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");

        if (!$stmt) {
            die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }
}
?>
