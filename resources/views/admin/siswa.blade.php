<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-green-100 to-blue-100 min-h-screen flex flex-col items-center p-6">
    
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-lg p-6">
        <!-- Header -->
        <h1 class="text-2xl font-bold text-gray-700 mb-2">Selamat datang, {{ Auth::user()->name }} 🎉</h1>
        <p class="text-gray-500 mb-6">Jangan lupa mengerjakan tugas ya!</p>

        <!-- Menu Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Menu 1 -->
            <a href="{{ route('tugas.index') }}" 
               class="bg-blue-200 hover:bg-blue-300 rounded-xl p-4 shadow text-center">
                <h2 class="font-semibold text-lg text-gray-700">📘 Lihat Tugas</h2>
                <p class="text-sm text-gray-500">Daftar tugas yang diberikan guru</p>
            </a>

            <!-- Menu 2 -->
            <a href="{{ route('siswa.pengumpulan.create', 1) }}" 
               class="bg-green-200 hover:bg-green-300 rounded-xl p-4 shadow text-center">
                <h2 class="font-semibold text-lg text-gray-700">📤 Kumpulkan Tugas</h2>
                <p class="text-sm text-gray-500">Upload tugas yang sudah selesai</p>
            </a>

            <!-- Menu 3 -->
            <a href="#"
               class="bg-yellow-200 hover:bg-yellow-300 rounded-xl p-4 shadow text-center">
                <h2 class="font-semibold text-lg text-gray-700">📊 Nilai</h2>
                <p class="text-sm text-gray-500">Lihat nilai dari tugas kamu</p>
            </a>
        </div>

        <!-- Notifikasi -->
        @if(session('success'))
            <div class="mt-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                ✅ {{ session('success') }}
            </div>
        @endif
    </div>

</body>
</html>
