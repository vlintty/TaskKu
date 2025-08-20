@extends('siswa.layout')

@section('content')
<div class="p-8">
    <h1 class="text-xl font-bold mb-4">Kumpulkan: {{ $tugas->judul }}</h1>
    <form action="{{ route('siswa.pengumpulan.store', $tugas->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="border p-2 rounded mb-4" required>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Upload</button>
    </form>
</div>
@endsection
