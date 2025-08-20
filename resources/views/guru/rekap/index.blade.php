@extends('guru.layout')
@section('title', 'Rekap Nilai')

@section('content')
<h2 class="text-2xl font-bold mb-4">Rekap Nilai</h2>

@if(session('success'))
<div class="p-3 bg-green-200 text-green-800 rounded mb-3">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('guru.rekap.export') }}" 
   class="bg-[#5F8B4C] text-white px-4 py-2 rounded shadow hover:scale-105 transition">
   ⬇️ Export Excel
</a>

<table class="w-full mt-4 border">
    <thead>
        <tr class="bg-[#945034] text-white">
            <th class="p-2">Nama Siswa</th>
            <th class="p-2">Judul Tugas</th>
            <th class="p-2">Nilai</th>
        </tr>
    </thead>
    <tbody>
        @foreach($nilai as $n)
        <tr class="border">
            <td class="p-2">{{ $n->siswa->name }}</td>
            <td class="p-2">{{ $n->tugas->judul }}</td>
            <td class="p-2">{{ $n->nilai }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
