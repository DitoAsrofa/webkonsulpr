<?php
include_once('../config/database.php');

class PurchaseModel {
    public static function createPurchase($user_id, $medicine_name, $quantity, $price, $status = 'pending') {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO purchases (user_id, medicine_name, quantity, price, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isids", $user_id, $medicine_name, $quantity, $price, $status);
        return $stmt->execute();
    }

    public static function findByUserId($user_id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM purchases WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>
