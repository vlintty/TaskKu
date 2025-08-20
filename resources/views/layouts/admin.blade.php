<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex min-h-screen bg-[#FFDDAB] text-gray-800">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#5F8B4C] text-white flex flex-col">
        <div class="p-6 font-bold text-xl border-b border-white/20">
            TaskKU Admin
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded-lg hover:bg-[#945034] transition">
                Dashboard
            </a>
            <a href="{{ route('admin.kelola-akun') }}" class="block px-4 py-2 rounded-lg hover:bg-[#945034] transition">
                Kelola Akun
            </a>
        </nav>
        <form method="POST" action="{{ route('logout') }}" class="p-4 border-t border-white/20">
            @csrf
            <button type="submit" class="w-full bg-[#FF9A9A] py-2 rounded-lg hover:bg-red-600 transition">
                Logout
            </button>
        </form>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-8">
        @yield('content')
    </main>
</body>
</html>
