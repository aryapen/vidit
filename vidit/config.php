<?php
// Konfigurasi API DoodStream
define('DOOD_API_KEY', '12345pxxxxxxxxxxxxxxxx'); // Ganti dengan API Key DoodStream Anda
define('DOOD_BASE_URL', 'https://doodapi.com/api/');

// Konfigurasi Mock API (Opsional: misal untuk simpan data iklan global)
define('MOCK_API_URL', 'https://6789abcdef.mockapi.io/api/v1/'); 

// Fungsi pembantu untuk melakukan cURL Request ke DoodStream
function callDoodAPI($endpoint, $params = []) {
    $params['key'] = DOOD_API_KEY;
    $url = DOOD_BASE_URL . $endpoint . '?' . http_build_query($params);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $response = curl_exec($ch);
    curl_close($ch);
    
    return json_decode($response, true);
}
?>