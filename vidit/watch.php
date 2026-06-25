<?php
include 'config.php';

if (!isset($_GET['v'])) {
    die("Video tidak ditemukan.");
}

$fileCode = htmlspecialchars($_GET['v']);

// Ambal info detail video dari API DoodStream untuk ditaruh di Judul Web
$videoInfo = callDoodAPI('file/info', ['file_code' => $fileCode]);
$title = "Nonton Video";

if (isset($videoInfo['result'][0])) {
    $title = $videoInfo['result'][0]['title'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-gray-100 min-h-screen flex flex-col justify-between">

    <header class="p-5 bg-gray-900 border-b border-gray-800">
        <div class="max-w-5xl mx-auto">
            <a href="index.php" class="text-2xl font-bold text-indigo-500">StreamVault</a>
        </div>
    </header>

    <main class="flex-grow max-w-4xl mx-auto w-full px-4 py-8">
        
        <div class="w-full bg-gray-900 p-3 mb-4 text-center text-sm text-gray-500 border border-gray-800 rounded">
            <p>[IKLAN BANNER ATAS PLAYER]</p>
        </div>

        <div class="bg-black rounded-xl overflow-hidden shadow-2xl border border-gray-800 aspect-video relative">
            <iframe src="https://dood.li/e/<?php echo $fileCode; ?>" 
                    class="absolute top-0 left-0 w-full h-full" 
                    scrolling="no" 
                    frameborder="0" 
                    allowfullscreen="true"></iframe>
        </div>

        <div class="mt-4 bg-gray-900 p-6 rounded-xl border border-gray-800">
            <h1 class="text-xl font-bold text-white mb-4"><?php echo $title; ?></h1>
            
            <div class="pt-4 border-t border-gray-800">
                <label class="block text-xs font-semibold text-gray-400 uppercase mb-2">Link Share Web Anda</label>
                <input type="text" readonly value="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" 
                       class="w-full bg-gray-950 border border-gray-800 rounded p-2 text-sm text-indigo-400 focus:outline-none">
            </div>
        </div>

    </main>

    <footer class="p-5 text-center text-xs text-gray-600 bg-gray-900 border-t border-gray-800">
        &copy; 2026 StreamVault
    </footer>

</body>
</html>