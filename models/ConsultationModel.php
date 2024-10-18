<?php
include_once('../config/database.php');

class ConsultationModel {
    public static function createConsultation($user_id, $chat_log, $doctor_name, $status = 'pending') {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO consultations (user_id, chat_log, doctor_name, status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $user_id, $chat_log, $doctor_name, $status);
        return $stmt->execute();
    }

    public static function findByUserId($user_id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM consultations WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>
