<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-12">
        <div class="max-w-lg mx-auto bg-white p-8 shadow-md rounded-lg">
            <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>
            <form action="../controllers/AuthController.php?action=register" method="POST">
                <label class="block mb-2">Username:</label>
                <input type="text" name="username" class="border border-gray-300 p-2 mb-4 w-full" required>
                <label class="block mb-2">Email:</label>
                <input type="email" name="email" class="border border-gray-300 p-2 mb-4 w-full" required>
                <label class="block mb-2">Password:</label>
                <input type="password" name="password" class="border border-gray-300 p-2 mb-4 w-full" required>
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded w-full">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
