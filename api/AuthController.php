<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Tentukan path dasar proyek
define('BASE_PATH', __DIR__ . '/../');

// Sertakan model dan koneksi database
include_once(BASE_PATH . 'models/UserModel.php');
include_once(BASE_PATH . 'config/database.php');

class AuthController {

    public function login() {
        session_start();

        // Pastikan request method POST digunakan
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            if ($email && $password) {
                // Cari user berdasarkan email
                $user = UserModel::findByEmail($email);

                if ($user && password_verify($password, $user['password'])) {
                    // Jika password benar, set session user_id dan user_name
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['username']; // Simpan nama pengguna dalam sesi

                    // Arahkan ke halaman dashboard
                    header("Location: ../views/dashboard.php");
                    exit();
                } else {
                    echo "Login gagal. Email atau password salah!";
                }
            } else {
                echo "Isi email dan password!";
            }
        }
    }

    public function register() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? null;
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            if ($username && $email && $password) {
                // Hash password sebelum disimpan
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                if (UserModel::create($username, $email, $hashedPassword)) {
                    header("Location: ../views/login.php");
                    exit();
                } else {
                    die("Registrasi gagal. Coba lagi!");
                }
            } else {
                die("Semua field harus diisi!");
            }
        }
    }

    public function logout() {
        session_start();
        session_unset(); // Hapus semua variabel sesi
        session_destroy(); // Akhiri sesi
        header("Location: ../views/login.php"); // Arahkan ke halaman login
        exit();
    }
}

// Tangani request berdasarkan action
if (isset($_GET['action'])) {
    $auth = new AuthController();

    if ($_GET['action'] === 'login') {
        $auth->login();
    } else if ($_GET['action'] === 'register') {
        $auth->register();
    } else if ($_GET['action'] === 'logout') {
        $auth->logout();
    }
}
