<?php
include_once('../config/database.php');

class ScreeningModel {
    public static function createScreening($user_id, $screening_date, $health_info, $lab_location, $result_status = 'pending') {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO screenings (user_id, screening_date, health_info, lab_location, result_status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $user_id, $screening_date, $health_info, $lab_location, $result_status);
        return $stmt->execute();
    }

    public static function findByUserId($user_id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM screenings WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>
