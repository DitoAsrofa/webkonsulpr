<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Google Fonts Material Symbols -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <style>
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .material-symbols-outlined {
            font-size: 48px;
            color: #333;
        }

        .icon-blue {
            color: #3b82f6; /* blue-500 */
        }

        .icon-green {
            color: #10b981; /* green-500 */
        }

        .icon-yellow {
            color: #f59e0b; /* yellow-500 */
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-12">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8 px-4">
            <h1 class="text-3xl font-bold">Dashboard</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-700">Hi, <?php echo htmlspecialchars($userName); ?></span>
                <a href="AuthController.php?action=logout" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Logout</a>
            </div>
        </div>

        <!-- Welcome Message -->
        <div class="max-w-lg mx-auto text-center mb-8">
            <p class="text-lg">Selamat datang di dashboard. Silakan pilih fitur berikut:</p>
        </div>

        <!-- Feature Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-4">
            <a href="consult.php" class="feature-card bg-white p-6 rounded-lg shadow-md hover:shadow-lg text-center">
                <span class="material-symbols-outlined icon-blue">medical_services</span>
                <h2 class="text-xl font-semibold text-blue-500">Konsultasi Dokter</h2>
                <p class="text-gray-600 mt-2">Konsultasi dengan dokter secara online.</p>
            </a>

            <a href="screening.php" class="feature-card bg-white p-6 rounded-lg shadow-md hover:shadow-lg text-center">
                <span class="material-symbols-outlined icon-green">health_and_safety</span>
                <h2 class="text-xl font-semibold text-green-500">Pendaftaran Skrining</h2>
                <p class="text-gray-600 mt-2">Daftar untuk skrining kesehatan.</p>
            </a>

            <a href="purchase.php" class="feature-card bg-white p-6 rounded-lg shadow-md hover:shadow-lg text-center">
                <span class="material-symbols-outlined icon-yellow">local_pharmacy</span>
                <h2 class="text-xl font-semibold text-yellow-500">Pembelian Obat</h2>
                <p class="text-gray-600 mt-2">Beli obat secara online.</p>
            </a>
        </div>
    </div>
</body>
</html>
