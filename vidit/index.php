<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamVault - Dood Klon</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen flex flex-col justify-between">

    <header class="p-5 border-b border-gray-800 flex justify-between items-center max-w-5xl mx-auto w-full">
        <a href="index.php" class="text-2xl font-bold text-indigo-500">StreamVault</a>
        <span class="text-sm text-gray-400">Powered by DoodStream</span>
    </header>

    <main class="flex-grow flex flex-col items-center justify-center px-4 py-10">
        
        <div class="w-full max-w-3xl bg-gray-800 p-3 mb-8 text-center text-xs text-gray-500 rounded border border-gray-700">
            <p>[IKLAN BANNER ANDA]</p>
        </div>

        <div class="w-full max-w-xl bg-gray-800 rounded-2xl p-8 border border-gray-700 shadow-2xl text-center">
            <h1 class="text-3xl font-extrabold mb-2">Upload ke DoodStream</h1>
            <p class="text-sm text-gray-400 mb-6">Video akan otomatis masuk ke storage remote DoodStream.</p>

            <form action="upload.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                <div class="border-2 border-dashed border-gray-600 hover:border-indigo-500 rounded-xl p-8 cursor-pointer transition relative">
                    <input type="file" name="video" accept="video/*" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    <p class="text-sm text-gray-300">Pilih atau Tarik Video Anda Ke Sini</p>
                </div>
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-4 rounded-xl transition">
                    Mulai Upload
                </button>
            </form>
        </div>

    </main>

    <footer class="p-5 text-center text-xs text-gray-500 border-t border-gray-800">
        &copy; 2026 StreamVault
    </footer>

</body>
</html>