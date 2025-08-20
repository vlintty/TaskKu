@extends('guru.layout')
@section('title', 'Nilai Tugas')

@section('content')
<h2 class="text-2xl font-bold mb-4">Nilai Tugas Siswa</h2>

@foreach($tugas as $t)
<div class="mb-6 bg-white p-4 rounded shadow">
    <h3 class="text-lg font-semibold">{{ $t->judul }}</h3>
    <table class="w-full mt-3 border">
        <thead>
            <tr class="bg-[#5F8B4C] text-white">
                <th class="p-2">Siswa</th>
                <th class="p-2">File</th>
                <th class="p-2">Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($t->pengumpulan as $p)
            <tr class="border">
                <td class="p-2">{{ $p->siswa->name }}</td>
                <td class="p-2">
                    <a href="{{ asset('storage/'.$p->file) }}" target="_blank" class="text-blue-600 underline">📄 Lihat</a>
                </td>
                <td class="p-2">
                    <form method="POST" action="{{ route('guru.nilai.store') }}">
                        @csrf
                        <input type="hidden" name="tugas_id" value="{{ $t->id }}">
                        <input type="hidden" name="siswa_id" value="{{ $p->siswa_id }}">
                        <select name="nilai" class="border p-1 rounded">
    <option value="100">A</option>
    <option value="85">B</option>
    <option value="75">C</option>
    <option value="65">D</option>
</select>

                        <button class="ml-2 bg-[#5F8B4C] text-white px-3 py-1 rounded">Simpan</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endforeach
@endsection
