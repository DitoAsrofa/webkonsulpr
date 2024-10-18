<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Skrining Kesehatan</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-12">
        <div class="max-w-lg mx-auto bg-white p-8 shadow-md rounded-lg">
            <h1 class="text-2xl font-bold mb-6">Pendaftaran Skrining Kesehatan</h1>
            <form action="../controllers/ScreeningController.php?action=register" method="POST">
                <label class="block mb-2">Nama Lengkap:</label>
                <input type="text" name="full_name" class="border border-gray-300 p-2 mb-4 w-full" required>
                
                <label class="block mb-2">Alamat:</label>
                <input type="text" name="address" class="border border-gray-300 p-2 mb-4 w-full" required>
                
                <label class="block mb-2">Tanggal Skrining:</label>
                <input type="date" name="screening_date" class="border border-gray-300 p-2 mb-4 w-full" required>
                
                <label class="block mb-2">Informasi Kesehatan (Opsional):</label>
                <textarea name="health_info" class="border border-gray-300 p-2 mb-4 w-full"></textarea>
                
                <button type="submit" class="bg-green-500 text-white py-2 px-4 w-full rounded">Daftar</button>
            </form>
        </div>
    </div>
</body>
</html>
