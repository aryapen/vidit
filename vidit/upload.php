<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['video'])) {
    $file = $_FILES['video'];

    // Lgkh 1: Dapatkan URL Server Upload dari DoodStream
    $serverData = callDoodAPI('upload/server');
    
    if (!isset($serverData['result'])) {
        die("Gagal mendapatkan server upload dari DoodStream.");
    }
    
    $uploadUrl = $serverData['result'];

    // Lgkh 2: Kirim file ke server DoodStream menggunakan cURL
    $cfile = new CURLFile($file['tmp_name'], $file['type'], $file['name']);
    
    $postData = [
        'key' => DOOD_API_KEY,
        'file' => $cfile
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $uploadUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $uploadResponse = curl_exec($ch);
    curl_close($ch);
    
    $result = json_decode($uploadResponse, true);

    // Jika sukses, DoodStream mengembalikan kode file (file_code)
    if (isset($result['result'][0]['filecode'])) {
        $fileCode = $result['result'][0]['filecode'];
        
        // Alihkan pengguna ke halaman nonton lokal menggunakan file_code tersebut
        header("Location: watch.php?v=" . $fileCode);
        exit();
    } else {
        echo "Gagal mengunggah ke DoodStream. Respons: " . print_r($result, true);
    }
}
?>