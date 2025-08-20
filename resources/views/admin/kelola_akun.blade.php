@extends('layouts.admin') {{-- Layout sidebar --}}

@section('title', 'Kelola Akun')

@section('content')
<div class="container mx-auto p-6">

    {{-- Judul & tombol kembali dashboard --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Kelola Akun</h1>
    </div>

    {{-- Alert sukses/error --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="mb-4 p-4 bg-red-200 text-red-800 rounded">{{ session('error') }}</div>
    @endif

    {{-- Tabel akun --}}
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-[#5F8B4C] text-white">
                <tr>
                    <th class="px-6 py-3 text-left">No</th>
                    <th class="px-6 py-3 text-left">Nama</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Role</th>
                    <th class="px-6 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($users as $index => $user)
                <tr>
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4 capitalize">{{ $user->role }}</td>
                    <td class="px-6 py-4 space-x-2">
                        <a href="{{ route('admin.edit_akun', $user->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                        <form action="{{ route('admin.delete_akun', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
