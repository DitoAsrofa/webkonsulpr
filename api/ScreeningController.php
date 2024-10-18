<?php
// Koneksi database (pastikan Anda mengganti sesuai dengan konfigurasi Anda)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webkonsul";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'register') {
    $fullName = $_POST['full_name'];
    $address = $_POST['address'];
    $screeningDate = $_POST['screening_date'];
    $healthInfo = $_POST['health_info'];

    // Logika untuk menentukan lab terdekat (contoh sederhana)
    $labLocation = getNearestLab($address);

    // Simpan data ke database (contoh query)
    $stmt = $conn->prepare("INSERT INTO screenings (user_id, screening_date, health_info, result_status) VALUES (?, ?, ?, ?)");
    $userId = 1; // Misalkan user ID adalah 1 untuk sementara (sesuaikan dengan autentikasi Anda)
    $status = 'pending';

    $stmt->bind_param("isss", $userId, $screeningDate, $healthInfo, $status);

    if ($stmt->execute()) {
        // Redirect ke halaman informasi lab
        header("Location: ../views/lab_info.php?lab=" . urlencode($labLocation));
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fungsi sederhana untuk menentukan lab terdekat
function getNearestLab($address) {
    // Dalam implementasi nyata, Anda mungkin menggunakan API untuk memeriksa lokasi pengguna
    // atau database untuk menentukan jarak ke lab yang tersedia
    // Di sini kita hanya menggunakan contoh statis

    // Misalkan, jika alamat mengandung kata tertentu, arahkan ke lab yang sesuai
    if (strpos(strtolower($address), 'kota a') !== false) {
        return 'Lab A';
    } else {
        return 'Lab B';
    }
}

// Tutup koneksi
$conn->close();
?>
