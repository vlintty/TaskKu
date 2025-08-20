@extends('siswa.layout')

@section('title','Dashboard Siswa')

@section('content')
<h2 class="text-2xl font-bold mb-6">Halo, {{ auth()->user()->name }}</h2>

<!-- Notifikasi Tugas -->
<div class="mb-8">
    <h3 class="text-xl font-semibold mb-2">Notifikasi Tugas</h3>
    @if($notifikasi->isEmpty())
        <p class="text-green-700">Tidak ada tugas baru.</p>
    @else
        <ul class="space-y-2">
            @foreach($notifikasi as $tugas)
            <li class="p-3 bg-yellow-100 rounded shadow flex justify-between items-center">
                <div>
                    <span class="font-semibold">{{ $tugas->judul }}</span>  
                    - Deadline: {{ $tugas->deadline }}  
                    
                    <div class="text-sm text-gray-600">
                        Mata Pelajaran: {{ $tugas->mata_pelajaran ?? 'Belum ditentukan' }}
                    </div>
                </div>
                
                @if($tugas['status'] === 'belum')
                    <a href="{{ route('siswa.pengumpulan.create', $tugas['id']) }}" 
                       class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                       Kumpulkan
                    </a>
                @else
                    <span class="bg-green-500 text-white px-3 py-1 rounded">Kerjakan</span>
                @endif
            </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
