<?php
// Koneksi database
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'buy') {
    $medicineName = $_POST['medicine_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $userId = 1; // Sesuaikan dengan ID pengguna yang sebenarnya
    $totalPrice = $price * $quantity;
    $status = 'pending';

    // Simpan data pembelian ke database
    $stmt = $conn->prepare("INSERT INTO purchases (user_id, medicine_name, quantity, price, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isids", $userId, $medicineName, $quantity, $totalPrice, $status);

    if ($stmt->execute()) {
        // Redirect ke halaman struk dengan parameter ID pembelian
        $purchaseId = $stmt->insert_id;
        header("Location: ../views/receipt.php?purchase_id=" . $purchaseId);
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>
