<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Guru')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex min-h-screen bg-[#FFDDAB]">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#5F8B4C] text-white flex flex-col p-4">
        <h1 class="text-xl font-bold mb-6">Dashboard Guru</h1>
        <nav class="flex-1">
            <ul class="space-y-3">
                <li><a href="{{ route('guru.dashboard') }}" class="block py-2 px-3 rounded hover:bg-[#FF9A9A]">🏠 Dashboard</a></li>
                <li><a href="{{ route('tugas.index') }}" class="block py-2 px-3 rounded hover:bg-[#FF9A9A]">📂 Kelola Tugas</a></li>
                <li><a href="{{ route('guru.nilai.index') }}" class="block py-2 px-3 rounded hover:bg-[#FF9A9A]">📝 Nilai Tugas</a></li>
                <li><a href="{{ route('guru.rekap.index') }}" class="block py-2 px-3 rounded hover:bg-[#FF9A9A]">📊 Rekap Nilai</a></li>
            </ul>
        </nav>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="bg-[#FF9A9A] py-2 px-4 rounded hover:bg-red-400">🚪 Logout</button>
        </form>
    </aside>

    <!-- Konten -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>
</body>
</html>
