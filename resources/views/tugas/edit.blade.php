@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Tugas</h2>

   <form action="{{ route('tugas.update', $tugas->id) }}" method="POST">
        @csrf
        @method('PUT')
        {{--Mata Pelajaran--}}
        <div class="mb-3">
    <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
    <input type="text" name="mata_pelajaran" id="mata_pelajaran" class="form-control" required>
</div>

        {{-- Judul Tugas --}}
        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul Tugas</label>
            <input type="text" name="judul" id="judul" 
                   value="{{ old('judul', $tugas->judul) }}" 
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
        </div>

        {{-- Deskripsi --}}
        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="5" 
                      class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
        </div>

        {{-- Deadline --}}
        <div class="mb-4">
            <label for="deadline" class="block text-sm font-medium text-gray-700 mb-2">Deadline</label>
            <input type="date" name="deadline" id="deadline" 
                   value="{{ old('deadline', $tugas->deadline) }}" 
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end gap-3">
            <a href="{{ route('tugas.index') }}" 
               class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Batal</a>
            <button type="submit" 
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
