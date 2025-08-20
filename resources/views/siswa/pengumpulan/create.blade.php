@extends('siswa.layout')

@section('content')
<div class="max-w-2xl mx-auto bg-[#FFDDAB] p-6 rounded-xl shadow-md">
    <h2 class="text-xl font-bold mb-4">Kumpulkan Tugas</h2>

    <div class="mb-4">
        <p class="font-semibold">Judul Tugas:</p>
        <p>{{ $tugas->judul }}</p>
    </div>

    <div class="mb-4">
        <p class="font-semibold">Deskripsi:</p>
        <p>{{ $tugas->deskripsi ?? '-' }}</p>
    </div>

    <div class="mb-4">
        <p class="font-semibold">Deadline:</p>
        <p>{{ $tugas->deadline ?? '-' }}</p>
    </div>

    <!-- FORM UPLOAD -->
    <form action="{{ route('siswa.pengumpulan.store', $tugas->id) }}" 
          method="POST" enctype="multipart/form-data">
        @csrf

        <!-- File Upload -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">Upload File (PDF/DOC/DOCX/ZIP)</label>
            <input type="file" name="file" 
                   class="w-full border rounded p-2 bg-white" 
                   required>
            @error('file')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                Kumpulkan
            </button>
            <a href="{{ route('siswa.pengumpulan.index') }}" 
               class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
