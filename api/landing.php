<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-12">
        <div class="max-w-3xl mx-auto bg-white p-8 shadow-md rounded-lg text-center">
            <h1 class="text-4xl font-bold mb-6">Selamat Datang di Web Konsultasi Kesehatan</h1>
            <p class="text-lg mb-6">Sistem ini membantu Anda untuk berkonsultasi dengan dokter, mendaftar skrining kesehatan, dan membeli obat secara online.</p>

            <!-- Menu untuk fitur -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Menu Konsultasi Dokter -->
                <div class="bg-blue-500 text-white p-6 rounded-lg shadow-lg hover:bg-blue-600">
                    <h2 class="text-2xl font-bold mb-4">Konsultasi Dokter</h2>
                    <p class="mb-4">Berkonsultasi dengan dokter secara online melalui sistem ini.</p>
                    <a href="login.php" class="bg-white text-blue-500 py-2 px-4 rounded hover:bg-gray-200">Mulai Konsultasi</a>
                </div>

                <!-- Menu Pendaftaran Skrining Kesehatan -->
                <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg hover:bg-green-600">
                    <h2 class="text-2xl font-bold mb-4">Pendaftaran Skrining</h2>
                    <p class="mb-4">Daftar untuk melakukan skrining kesehatan di lokasi terdekat.</p>
                    <a href="login.php" class="bg-white text-green-500 py-2 px-4 rounded hover:bg-gray-200">Daftar Skrining</a>
                </div>

                <!-- Menu Pembelian Obat -->
                <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-lg hover:bg-yellow-600">
                    <h2 class="text-2xl font-bold mb-4">Pembelian Obat</h2>
                    <p class="mb-4">Beli obat secara online dan dapatkan pengiriman langsung.</p>
                    <a href="login.php" class="bg-white text-yellow-500 py-2 px-4 rounded hover:bg-gray-200">Beli Obat</a>
                </div>
            </div>

            <!-- Tombol Login -->
            <div class="mt-8">
                <a href="login.php" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Login</a>
            </div>
        </div>
    </div>
</body>
</html>
