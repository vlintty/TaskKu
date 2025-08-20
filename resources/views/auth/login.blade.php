<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login TaskKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #FEFFC4; } /* Kuning muda */
        .card { background-color:#5F8B4C; } /* Biru */
        .btn { background-color:#FF9A9A; } /* Kuning */
        .btn:hover { background-color: #FFBC4C; } /* Oranye */
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="card p-10 rounded-2xl shadow-lg w-96 text-white">
        <!-- Logo Landscape -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/logo-landscape.png') }}" alt="TaskKu Logo" class="w-64 h-auto">
        </div>

        <h2 class="text-2xl font-bold text-center mb-6">Login TaskKu</h2>

        @if(session('success'))
            <p class="text-green-200 mb-4 text-center">{{ session('success') }}</p>
        @endif

        @if($errors->any())
            <p class="text-red-200 mb-4 text-center">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" class="w-full p-3 mb-4 rounded-lg border border-white text-black" required>
            <input type="password" name="password" placeholder="Password" class="w-full p-3 mb-4 rounded-lg border border-white text-black" required>
            <button type="submit" class="btn w-full p-3 rounded-lg text-black font-bold hover:text-white transition">Login</button>
        </form>

        <!-- Link menuju halaman register -->
        <p class="text-center mt-4 text-white">
            Belum punya akun? 
            <a href="{{ route('register.view') }}" class="font-semibold underline">Daftar di sini</a>
        </p>
    </div>
</body>
</html>
