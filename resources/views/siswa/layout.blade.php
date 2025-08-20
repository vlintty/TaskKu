<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Dashboard Siswa')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex min-h-screen bg-[#FEFFC4]">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#5F8B4C] text-white p-6 flex flex-col justify-between">
        <div>
            <h1 class="text-2xl font-bold mb-8">Siswa</h1>
            <nav class="flex flex-col space-y-3">
                <a href="{{ route('siswa.dashboard') }}" class="hover:bg-[#FFDDAB] hover:text-[#5F8B4C] px-3 py-2 rounded">Dashboard</a>
                <a href="{{ route('siswa.pengumpulan.index') }}" class="hover:bg-[#FFDDAB] hover:text-[#5F8B4C] px-3 py-2 rounded">Pengumpulan Tugas</a>
            </nav>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-400 px-3 py-2 rounded hover:bg-red-500 w-full">Logout</button>
        </form>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-8">
        @yield('content')
    </main>

</body>
</html>
