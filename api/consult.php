<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Konsultasi Dokter</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/consult.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="../assets/js/script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- Header dengan Tombol Kembali -->
    <div class="consultation-header">
        <h1>Konsultasi Dokter Online</h1>
        <a href="dashboard.php" class="hover:bg-green-600">Kembali ke Dashboard</a>
    </div>

    <!-- Container untuk Konsultasi -->
    <div class="consultation-container">
        <h1>Selamat Datang di Konsultasi Dokter Online</h1>
        <p>Jika ingin konsultasi, mohon tekan tombol chat di pojok kanan bawah untuk memulai percakapan dengan chatbot kami.</p>
    </div>

    <!-- Chatbot Button (Toggler) -->
    <button class="chatbot-toggler">
        <span class="material-symbols-outlined">mode_comment</span>
        <span class="material-symbols-outlined">close</span>
    </button>

    <!-- Chatbot -->
    <div class="chatbot">
        <header>
            <h2>Chatbot</h2>
            <span class="material-symbols-outlined">close</span>
        </header>
        <ul class="chatbox">
            <li class="chat incoming">
                <span class="material-symbols-outlined">smart_toy</span>
                <p>Halo!! <br> Ada yang bisa dibantu hari ini?</p>
             </li>
        </ul>
        <div class="chat-input">
            <textarea placeholder="Enter a message..." required></textarea>
            <span id="send-btn" class="material-symbols-outlined">send</span>
        </div>
    </div>
</body>
</html>
