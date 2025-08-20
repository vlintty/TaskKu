<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register TaskKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #FEFFC4; } /* Kuning muda */
        .card { background-color:#5F8B4C; } /* Biru */
        .btn { background-color: #FF9A9A; } /* Kuning */
        .btn:hover { background-color: #FFBC4C; } /* Oranye */
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="card p-10 rounded-2xl shadow-lg w-96 text-white">
        <!-- Logo Landscape -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/logo-landscape.png') }}" alt="TaskKu Logo" class="w-64 h-auto">
        </div>

        <h2 class="text-2xl font-bold text-center mb-6">Register TaskKu</h2>

        <!-- Tampilkan error -->
        @if($errors->any())
            <ul class="text-red-200 mb-4">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <!-- Form Register -->
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="name" placeholder="Nama" class="w-full p-3 mb-4 rounded-lg border border-white text-black" required>
            <input type="email" name="email" placeholder="Email" class="w-full p-3 mb-4 rounded-lg border border-white text-black" required>
            <input type="password" name="password" placeholder="Password" class="w-full p-3 mb-4 rounded-lg border border-white text-black" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" class="w-full p-3 mb-4 rounded-lg border border-white text-black" required>

            <!-- Pilih role -->
            <select name="role" class="w-full p-3 mb-4 rounded-lg border border-white text-black" required>
                <option value="">-- Pilih Role --</option>
                <option value="guru">Guru</option>
                <option value="siswa">Siswa</option>
            </select>

            <button type="submit" class="btn w-full p-3 rounded-lg text-black font-bold hover:text-white transition">Register</button>
        </form>

        <p class="text-center mt-4 text-white">
            Sudah punya akun? 
            <a href="{{ route('login.view') }}" class="font-semibold underline">Login</a>
        </p>
    </div>
</body>
</html>
