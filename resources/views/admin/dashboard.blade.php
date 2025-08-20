@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>


   {{-- Statistik jumlah akun --}}
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div class="bg-green-200 p-4 rounded-xl shadow">
            <h2 class="font-semibold text-lg text-[#5F8B4C]">Jumlah Guru</h2>
            <p class="text-3xl">{{ $jumlahGuru }}</p>
        </div>
        <div class="bg-yellow-200 p-4 rounded-xl shadow">
            <h2 class="font-semibold text-lg text-[#945034]">Jumlah Siswa</h2>
            <p class="text-3xl">{{ $jumlahSiswa }}</p>
        </div>
    </div>

    {{-- Grid Chart & Login Terbaru --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Chart login --}}
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-xl font-semibold mb-4 text-[#5F8B4C]">Aktivitas Login 7 Hari Terakhir</h2>
            <canvas id="loginChart" height="100"></canvas>
        </div>

        {{-- Tabel login terbaru --}}
        <div class="bg-yellow-100 p-6 rounded-xl shadow">
            <h2 class="text-xl font-semibold mb-4 text-[#945034]">Login Terbaru</h2>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-yellow-300 text-left">
                            <th class="p-2">Nama</th>
                            <th class="p-2">Role</th>
                            <th class="p-2">Waktu Login</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lastLogins as $user)
                            <tr class="border-b">
                                <td class="p-2">{{ $user->name }}</td>
                                <td class="p-2 capitalize">{{ $user->role }}</td>
                                <td class="p-2">
                                    {{ $user->last_login ? \Carbon\Carbon::parse($user->last_login)->diffForHumans() : '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

{{-- Script Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('loginChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($loginData['labels']),
            datasets: [{
                label: 'Jumlah Login',
                data: @json($loginData['data']),
                borderColor: '#5F8B4C',
                backgroundColor: 'rgba(95, 139, 76, 0.3)',
                borderWidth: 2,
                fill: true,
                tension: 0.3,
                pointBackgroundColor: '#FF9A9A'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
</script>
@endsection