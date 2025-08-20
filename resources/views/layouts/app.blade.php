<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Tugas</title>
    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F5F5F5] text-gray-800">

    {{-- Navbar --}}
    <nav class="bg-[#444444] text-white p-4 shadow">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <h1 class="text-lg font-bold">Manajemen Tugas</h1>
            <a href="{{ route('tugas.index') }}" 
               class="bg-[#888888] text-white px-3 py-1 rounded hover:bg-[#666666]">
               Kembali
            </a>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="py-8 px-4">
        <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
            @yield('content')
        </div>
    </main>

</body>
</html>
