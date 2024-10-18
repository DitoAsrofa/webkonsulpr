<?php
session_start();

// Tentukan BASE_PATH sebagai root aplikasi
define('BASE_PATH', __DIR__);

// Logika penghapusan sesi untuk debugging atau reset manual
if (isset($_GET['reset'])) {
    session_unset(); // Hapus semua variabel sesi
    session_destroy(); // Hapus sesi saat ini
    header("Location: login.php");
    exit();
}

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika belum login, arahkan ke halaman landing page
    if (basename($_SERVER['PHP_SELF']) !== 'landing.php') {
        header("Location: landing.php");
        exit();
    }
} else {
    // Jika sudah login, arahkan ke halaman dashboard
    if (basename($_SERVER['PHP_SELF']) !== 'dashboard.php') {
        header("Location: dashboard.php");
        exit();
    }
}
