<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userMessage = strtolower(trim($_POST['message']));
    $response = "";

    // Daftar pertanyaan dan jawaban
    $responses = [
        "sakit kepala" => "Untuk keluhan sakit kepala yang sering terjadi, beberapa pemeriksaan yang bisa dilakukan adalah: Pemeriksaan tekanan darah, Pemeriksaan mata, CT scan atau MRI jika sakit kepala sangat berat dan sering.",
        "sesak napas" => "Untuk keluhan sesak napas yang sering terjadi, pemeriksaan yang bisa dilakukan antara lain: Tes fungsi paru-paru, Rontgen dada, Tes EKG untuk mengevaluasi fungsi jantung.",
        "lemas dan pusing" => "Untuk keluhan lemas dan pusing yang sering terjadi, pemeriksaan yang dapat dilakukan adalah: Tes darah untuk anemia, Pemeriksaan kadar gula darah, Pemeriksaan fungsi tiroid.",
        "perut perih" => "Untuk keluhan perut yang sering terasa perih, pemeriksaan yang bisa dilakukan adalah: Endoskopi, Tes untuk infeksi Helicobacter pylori, USG perut.",
        "nyeri di dada" => "Nyeri di dada bisa menjadi tanda dari beberapa kondisi. Pemeriksaan yang bisa dilakukan adalah: EKG, Tes treadmill, Rontgen dada.",
        "kulit gatal dan merah" => "Untuk keluhan kulit gatal dan merah, pemeriksaan yang dapat dilakukan antara lain: Tes alergi, Biopsi kulit, Pemeriksaan darah.",
        "cemas dan susah tidur" => "Untuk keluhan cemas dan susah tidur, beberapa langkah pemeriksaan yang bisa dilakukan adalah: Konsultasi dengan psikolog, Tes darah, Sleep study.",
        "anak demam tinggi" => "Jika anak mengalami demam tinggi, pemeriksaan yang bisa dilakukan antara lain: Pemeriksaan fisik oleh dokter anak, Tes darah dan urine, Rontgen dada."
    ];

    // Cari jawaban yang cocok berdasarkan input
    foreach ($responses as $key => $answer) {
        if (strpos($userMessage, $key) !== false) {
            $response = $answer;
            break;
        }
    }

    // Jika tidak ditemukan jawaban yang cocok
    if ($response == "") {
        $response = "Maaf, saya belum bisa memberikan informasi terkait keluhan Anda. Silakan berkonsultasi lebih lanjut dengan dokter.";
    }

    echo $response;
}
