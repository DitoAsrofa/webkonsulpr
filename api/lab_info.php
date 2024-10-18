<?php
$labName = isset($_GET['lab']) ? $_GET['lab'] : 'Lab tidak ditemukan';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Lab Terdekat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-12">
        <div class="max-w-lg mx-auto bg-white p-8 shadow-md rounded-lg">
            <h1 class="text-2xl font-bold mb-6">Lab Terdekat: <?php echo htmlspecialchars($labName); ?></h1>
            <p>Terima kasih telah mendaftar untuk skrining kesehatan.</p>
            <p>Silakan datang ke <?php echo htmlspecialchars($labName); ?> pada tanggal yang telah Anda pilih.</p>
            <p>Jika Anda membutuhkan informasi lebih lanjut, silakan hubungi lab tersebut.</p>
            <div class="mt-6">
                <a href="/dashboard.php" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    Kembali ke Halaman Dashboard
                </a>
            </div>
        </div>
    </div>
</body>
</html>
