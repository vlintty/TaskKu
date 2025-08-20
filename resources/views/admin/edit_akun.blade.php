@extends('layouts.admin') {{-- Layout sidebar --}}

@section('title', 'Edit Akun')

@section('content')
<div class="container mx-auto p-6">

    {{-- Judul & tombol kembali --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Edit Akun</h1>
        <a href="{{ route('admin.kelola-akun') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
            Kembali
        </a>
    </div>

    {{-- Alert sukses/error --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="mb-4 p-4 bg-red-200 text-red-800 rounded">{{ session('error') }}</div>
    @endif

    {{-- Form edit --}}
    <div class="bg-white shadow rounded-lg p-6 max-w-md">
        <form action="{{ route('admin.update_akun', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Role</label>
                <select name="role" class="w-full border border-gray-300 rounded px-3 py-2">
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="guru" {{ $user->role === 'guru' ? 'selected' : '' }}>Guru</option>
                    <option value="siswa" {{ $user->role === 'siswa' ? 'selected' : '' }}>Siswa</option>
                </select>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.kelola-akun') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Batal</a>
                <button type="submit" class="bg-[#5F8B4C] hover:bg-[#4F7A3D] text-white px-4 py-2 rounded-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
